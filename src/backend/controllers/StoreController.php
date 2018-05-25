<?php

namespace moguyun\cms\trip\event\backend\controllers;

use Yii;
use moguyun\cms\trip\event\common\models\EventStore;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use moguyun\cms\trip\event\common\models\EventStoreTrip;

/**
 * EventStoreController implements the CRUD actions for EventStore model.
 */
class StoreController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EventStore models.
     * @return mixed
     */
    public function actionIndex($store_id)
    {
        $model = $this->findModel($store_id);
        $dataProvider = new ActiveDataProvider([
            'query' => EventStore::find()->where(['parent_id' => $store_id]),
        ]);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EventStore model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EventStore model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($store_id)
    {
        $model = new EventStore();
        $model->parent_id = $store_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EventStore model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (isset($_POST['Trips'])) {
                foreach ($_POST['Trips'] as $key => $tripAttrs) {
                    if (!empty($tripAttrs['id'])) {
                        $trip = EventStoreTrip::findOne($tripAttrs['id']);
                    } else {
                        $trip->event_store_id = $id;
                        $trip = new EventStoreTrip();
                    }
                    $trip->attributes = $tripAttrs;
                    $trip->save();
                }
            }
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EventStore model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index', 'store_id' => $model->parent_id]);
    }

    /**
     * Finds the EventStore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventStore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventStore::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
