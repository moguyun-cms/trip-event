<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动页';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-page-index">

    <div class="alert alert-info" role="alert">
    <a href="<?= Url::to(['default/docs']); ?>" class="alert-link">帮助文档</a>
    </div>

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'slug',
            'title',
            //'template',
            //'event_store_id',
            //'created_at:datetime',
            'updated_at:date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {store} {url} {update} {delete}',
                'buttons' => [
                    'store' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-database fa-fw"></i>', Url::to(['store/index', 'store_id' => $model->store->id]), [
                            'title' => '仓库'
                        ]);
                    },
                    'url' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fa fa-link fa-fw"></i>',
                            '/web/event/' . $model->slug,
                            [
                                'title' => '链接',
                                'target' => '_blank'
                            ]
                        );
                    }
                ]
            ],
        ],
    ]); ?>
</div>