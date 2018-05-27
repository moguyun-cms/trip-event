<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use moguyun\cms\trip\event\common\models\Event;
use moguyun\cms\trip\event\common\models\EventStore;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\models\EventPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portlet box green">
    <div class="portlet-title">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab-general" data-toggle="tab" aria-expanded="false">
                    基本信息 </a>
            </li>
            <li>
                <a href="#tab-seo" data-toggle="tab" aria-expanded="false">
                    SEO </a>
            </li>
        </ul>
    </div>
    <div class="portlet-body form">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal'
        ]); ?>
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane active form-horizontal" id="tab-general">
                        <div class="form-body">
                        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'template')->dropDownList(Event::getTemplateList()) ?>
                        </div>
                    </div>
                    <div class="tab-pane form-horizontal" id="tab-seo">
                        <div class="form-body">
                        <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                    <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>