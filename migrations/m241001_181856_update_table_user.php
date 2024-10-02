<?php

use yii\db\Migration;

/**
 * Class m241001_181856_update_table_user
 */
class m241001_181856_update_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
           $this->alterColumn('User','deleted_at',$this->dateTime()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241001_181856_update_table_user cannot be reverted.\n";
        $this->alterColumn('User','deleted_at',$this->dateTime()->notNull());
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241001_181856_update_table_user cannot be reverted.\n";

        return false;
    }
    */
}
