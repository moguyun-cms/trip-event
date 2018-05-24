<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStore */

$this->title = '添加子仓库';
$this->params['breadcrumbs'][] = ['label' => '仓库', 'url' => ['index', 'store_id' => $model->parent_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-store-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
