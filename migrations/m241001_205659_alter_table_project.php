<?php

use yii\db\Migration;

/**
 * Class m241001_205659_alter_table_project
 */
class m241001_205659_alter_table_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
              $this->alterColumn('Project','deleted_at',$this->dateTime()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241001_205659_alter_table_project cannot be reverted.\n";
            $this->alterColumn('Project','deleted_at',$this->dateTime()->notNull());
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241001_205659_alter_table_project cannot be reverted.\n";

        return false;
    }
    */
}
