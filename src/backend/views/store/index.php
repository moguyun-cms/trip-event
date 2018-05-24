<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '数据仓库';
$this->params['breadcrumbs'][] = ['label' => '活动页', 'url' => Url::to(['default/index'])];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-store-index">

    <h4>主仓库</h4>
    <table class="table">
        <tr>
            <th>#</th>
            <td>标题</td>
            <td>编辑</td>
        </tr>
        <tr>
            <td>1</td>
            <td><?= $model->title; ?></td>
            <td>
                <a href="<?= Url::to(['store/update', 'id' => $model->id, 'store_id' => $model->id]); ?>">数据</a>
            </td>
        </tr>
    </table>
    <hr/>

    <h4>子仓库</h4>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        <p>
        <?= Html::a('添加子仓库', ['create', 'store_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
</div>
