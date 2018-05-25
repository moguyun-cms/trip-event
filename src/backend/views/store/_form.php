<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use moguyun\cms\trip\event\common\models\EventStore;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStore */
/* @var $form yii\widgets\ActiveForm */
$css = <<<CSS
.file-preview-thumbnails .file-preview-image{max-width:200px;}
CSS;
$this->registerCss($css);
?>
<div class="portlet">
    <div class="portlet-body form">
        <?php $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]); ?>

        <div class="form-body">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]); ?>
        <?php if (!$model->isNewRecord) : ?>
            <h4>相关线路</h4>
            <a id="fn-append" class="btn btn-sm btn-primary">添加</a>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>编号</th>
                    <th>标签</th>
                    <th>序号</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="table-trips">
                    <?php foreach ($model->trips as $key => $trip) : ?>
                    <tr>
                        <td><?= $key; ?></td>
                        <td>
                            <input class="form-control input-sm" name="Trips[<?= $key ?>][sn]" required value="<?= $trip->sn; ?>">
                            <input type="hidden" name="Trips[<?= $key ?>][id]" value="<?= $trip->id; ?>">
                            <small><?= $trip->trip->name; ?></small>
                        </td>
                        <td><input class="form-control input-sm" name="Trips[<?= $key ?>][label]" required value="<?= $trip->label; ?>"></td>
                        <td><input class="form-control input-sm" name="Trips[<?= $key ?>][order]" required type="number" value="<?= $trip->order; ?>"></td>
                        <td>
                        <?= Html::a('删除', 'javascript:', [
                            'class' => 'btn btn-xs btn-danger',
                            'onclick' => new \yii\web\JsExpression("
                                var target = $(this);
                                if(confirm('确定要删除该项吗？')){
                                    $.ajax({
                                        type: 'POST',
                                        url: '" . Url::to(['store-trip/delete', 'id' => $trip->id]) . "',
                                        success: function(data){
                                            $(target).parent().parent().remove();
                                        },
                                        error: function(){
                                            alert('操作失败');
                                        }
                                    });
                                }
                            "),
                        ]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
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
        <?= $form->field($model, 'order')->textInput(['type' => 'number']); ?>
        </div>

        <div class="form-actions">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-9">
                        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$js = <<<JS
$('#fn-append').click(function(){
    var index = $('#table-trips>tr').length;
    var html = '<tr><td></td><td><input class="form-control input-sm" name="Trips['+index+'][sn]" required></td><td><input class="form-control input-sm" name="Trips['+index+'][label]" required></td><td><input class="form-control input-sm" name="Trips['+index+'][order]" required type="number"></td><td><a onclick="$(this).parent().parent().remove()" class="btn btn-xs btn-link">删除</a></td></tr>';
    $('#table-trips').append(html);
});
JS;
$this->registerJs($js, View::POS_END);
?>