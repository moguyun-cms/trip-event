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
 * @property int $event_store_id 仓库
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property EventStore $store
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
            [['slug', 'title', 'template'], 'required'],
            ['slug', 'unique'],
            [['event_store_id', 'created_at', 'updated_at'], 'integer'],
            [['template', 'slug', 'title', 'keywords', 'description'], 'string', 'max' => 255],
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
            'event_store_id' => '仓库',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
            ],
        ];
    }

    public static function getTemplateList()
    {
        return [
            'default' => '默认'
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $store = new EventStore();
            $store->title = $this->title;
            $store->save();
            $this->event_store_id = $store->id;
        }
        return parent::beforeSave($insert);
    }

    public function afterDelete()
    {
        $this->store->delete();
    }

    public function getStore()
    {
        return $this->hasOne(EventStore::className(), ['id' => 'event_store_id']);
    }
}
