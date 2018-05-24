<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\models\EventPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Event Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'keywords',
            'description',
            'template',
            'store_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
