<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStore */

$this->title = '更新';
$this->params['breadcrumbs'][] = ['label' => '仓库', 'url' => ['index', 'store_id' => $model->parent_id == 0 ? $model->id : $model->parent_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="event-store-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
