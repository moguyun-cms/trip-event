<?php

namespace moguyun\cms\trip\event\common\models;

use Yii;

/**
 * This is the model class for table "{{%event_store}}".
 *
 * @property int $id
 * @property string $title 标题
 * @property int $parent_id 隶属仓库
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property int $order 序号
 * @property EventStoreTrip[] $trips
 */
class EventStore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%event_store}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title', 'required'],
            ['title', 'string'],
            [['parent_id', 'created_at', 'updated_at', 'order'], 'integer'],
            ['parent_id', 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'order' => '序号',
            'parent_id' => '隶属仓库',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
            ],
            'fileBehavior' => [
                'class' => \nemmo\attachments\behaviors\FileBehavior::className()
            ]
        ];
    }

    public function getTrips()
    {
        return $this->hasMany(EventStoreTrip::className(), ['event_store_id' => 'id'])->orderBy('order');
    }
}
