<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moguyun\cms\trip\event\common\models\EventStore;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStore */
/* @var $form yii\widgets\ActiveForm */
$css = <<<CSS
.file-preview-thumbnails .file-preview-image{max-width:200px;}
CSS;
$this->registerCss($css);
?>

<div class="event-store-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= \nemmo\attachments\components\AttachmentsInput::widget([
        'id' => 'file-input', // Optional
        'model' => $model,
        'options' => [ // Options of the Kartik's FileInput widget
            'multiple' => true, // If you want to allow multiple upload, default to false
        ],
        'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget
            'maxFileCount' => 10 // Client max files
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
