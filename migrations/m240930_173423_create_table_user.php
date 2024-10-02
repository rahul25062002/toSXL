<?php

use yii\db\Migration;

/**
 * Class m240930_173423_create_table_user
 */
class m240930_173423_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('User',[
            'id'=>$this->primaryKey(),
            'username'=>$this->string(255)->notNull(),
            'email'=>$this->string(255)->notNull(),
            'password'=>$this->string(255)->notNull(),
            'role'=>"ENUM('user','manager','admin') NOT NULL DEFAULT 'user'",
            'created_at'=>$this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
            'updated_at'=>$this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
            'deleted_at'=>$this->dateTime()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240930_173423_create_table_user cannot be reverted.\n";
        $this->dropTable('User');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240930_173423_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
