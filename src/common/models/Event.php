<?php

namespace moguyun\cms\trip\event\common\models;

use Yii;

/**
 * This is the model class for table "{{%event_page}}".
 *
 * @property int $id
 * @property string $slug 唯一标识
 * @property string $title 标题
 * @property string $keywords 关键词
 * @property string $description 描述
 * @property int $template 模板
 * @property int $store_id 仓库
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%event}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'template', 'event_store_id'], 'required'],
            [['template', 'store_id', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => '唯一标识',
            'title' => '标题',
            'keywords' => '关键词',
            'description' => '描述',
            'template' => '模板',
            'store_id' => '仓库',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
