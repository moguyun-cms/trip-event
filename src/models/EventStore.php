<?php

namespace moguyun\cms\trip\event\models;

use Yii;

/**
 * This is the model class for table "{{%event_store}}".
 *
 * @property int $id
 * @property int $parent_id 隶属仓库
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
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
            [['parent_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => '隶属仓库',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
