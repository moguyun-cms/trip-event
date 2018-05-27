<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\models\EventPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '活动页', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-page-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'keywords',
            'description',
            'template',
            'event_store_id',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
