<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\models\EventPage */

$this->title = '创建活动页';
$this->params['breadcrumbs'][] = ['label' => '活动页', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
