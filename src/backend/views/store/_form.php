<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moguyun\cms\trip\event\common\models\EventStore;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-store-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(EventStore::find()->all(), 'id', 'name'), [
        'prompt' => '--无--'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
