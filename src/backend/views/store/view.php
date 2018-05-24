<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model moguyun\cms\trip\event\common\models\EventStore */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '仓库', 'url' => [
    'index', 'store_id' => $model->parent_id == 0 ? $model->id : $model->parent_id
]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-store-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'parent_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

<?= \nemmo\attachments\components\AttachmentsTable::widget(['model' => $model]) ?>

</div>
