<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m180522_145636_create_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull()->comment('唯一标识'),
            'title' => $this->string()->notNull()->comment('标题'),
            'keywords' => $this->string()->comment('关键词'),
            'description' => $this->string()->comment('描述'),
            'template' => $this->string()->notNull()->comment('模板'),
            'event_store_id' => $this->integer()->notNull()->comment('仓库'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%event}}');
    }
}
