<?php

namespace moguyun\cms\trip\event\common\models;

use Yii;
use common\models\Route;

/**
 * This is the model class for table "{{%event_store_trip}}".
 *
 * @property int $id
 * @property int $event_store_id 所属仓库
 * @property string $sn 线路编号
 * @property string $label 标签
 * @property int $order 序号
 * @property Route $trip
 */
class EventStoreTrip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%event_store_trip}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_store_id', 'sn', 'label'], 'required'],
            [['event_store_id', 'order','id'], 'integer'],
            [['sn', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_store_id' => '所属仓库',
            'sn' => '线路编号',
            'label' => '标签',
            'order' => '序号',
        ];
    }

    public function getTrip()
    {
        return $this->hasOne(Route::className(), ['sn' => 'sn']);
    }
}
