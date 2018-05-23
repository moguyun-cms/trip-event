<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store_trip`.
 */
class m180522_153333_create_event_store_trip_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%event_store_trip}}', [
            'id' => $this->primaryKey(),
            'store_id' => $this->integer()->notNull()->comment('所属仓库'),
            'sn' => $this->string()->notNull()->comment('线路编号'),
            'label' => $this->string()->notNull()->comment('标签'),
            'order' => $this->smallInteger()->comment('序号'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%event_store_trip}}');
    }
}
