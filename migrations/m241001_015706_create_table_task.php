<?php

use yii\db\Migration;

/**
 * Class m241001_015706_create_table_task
 */
class m241001_015706_create_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Task', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'project_id' => $this->integer(11)->notNull(),
            // 'project_id'=>$this->integer(11)->notNull()->foreignKey()->reference('Project','id'),
            'created_at' => $this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
            'updated_at' => $this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
            'deleted_at' => $this->dateTime()->notNull(),
           
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241001_015706_create_table_task cannot be reverted.\n";

        $this->dropTable('Task');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241001_015706_create_table_task cannot be reverted.\n";

        return false;
    }
    */
}
