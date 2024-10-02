<?php

use yii\db\Migration;

/**
 * Class m240930_165142_create_table_project
 */
class m240930_165142_create_table_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {  
        $this->createTable('Project',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(255)->notNull(),
            'description'=>$this->text(),
            'url'=>$this->string(255),
            'start_time'=>$this->dateTime(),
            'end_time'=>$this->dateTime(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240930_165142_create_table_project cannot be reverted.\n";
        $this->dropTable('Project');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240930_165142_create_table_project cannot be reverted.\n";

        return false;
    }
    */
}
