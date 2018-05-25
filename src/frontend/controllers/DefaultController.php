<?php

namespace moguyun\cms\trip\event\frontend\controllers;

use yii\web\Controller;
use moguyun\cms\trip\event\common\models\Event;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public function actionIndex($slug)
    {
        $model = $this->findModel($slug);
        return $this->render($model->template, [
            'model' => $model
        ]);
    }

    private function findModel($slug)
    {
        if (($model = Event::find()->where(['slug' => $slug])->one()) == null) {
            throw new NotFoundHttpException('页面不存在');
        }
        return $model;
    }
}
