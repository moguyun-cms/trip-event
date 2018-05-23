<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStore */

$this->title = 'Create Event Store';
$this->params['breadcrumbs'][] = ['label' => 'Event Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-store-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
