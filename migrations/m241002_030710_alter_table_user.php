<?php

use yii\db\Migration;

/**
 * Class m241002_030710_alter_table_user
 */
class m241002_030710_alter_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    { 
        $this->addColumn('User','auth_key',$this->string(32)->notNull());
        $this->addColumn('User','access_token',$this->string(255)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241002_030710_alter_table_user cannot be reverted.\n";
         $this->dropColumn('User','auth_key');
         $this->dropColumn('User','access_token');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241002_030710_alter_table_user cannot be reverted.\n";

        return false;
    }
    */
}
