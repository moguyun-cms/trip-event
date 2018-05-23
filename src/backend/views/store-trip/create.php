<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStoreTrip */

$this->title = 'Create Event Store Trip';
$this->params['breadcrumbs'][] = ['label' => 'Event Store Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-store-trip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
