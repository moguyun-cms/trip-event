<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\models\EventPage */

$this->title = 'Create Event Page';
$this->params['breadcrumbs'][] = ['label' => 'Event Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
