<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\models\EventPage */

$this->title = 'Update Event Page: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Event Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
