<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store`.
 */
class m180522_151841_create_store_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%store}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(0)->comment('隶属仓库'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('更新时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%store}}');
    }
}
