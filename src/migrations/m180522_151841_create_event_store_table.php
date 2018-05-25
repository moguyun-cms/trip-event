<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store`.
 */
class m180522_151841_create_event_store_table extends Migration
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
        $this->createTable('{{%event_store}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNumm()->comment('标题'),
            'parent_id' => $this->integer()->defaultValue(0)->comment('隶属仓库'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('更新时间'),
            'order' => $this->smallInteger()->comment('序号'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%event_store}}');
    }
}
