<?php

use yii\db\Migration;

/**
 * Class m240930_172159_update_table_project
 */
class m240930_172159_update_table_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Project','created_at',$this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')));
        $this->addColumn('Project','updated_at',$this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')));
        $this->addColumn('Project','deleted_at',$this->dateTime()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m240930_172159_update_table_project cannot be reverted.\n";
        $this->dropColumn('Project','created_at');
        $this->dropColumn('Project','updated_at');
        $this->dropColumn('Project','deleted_at');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240930_172159_update_table_project cannot be reverted.\n";

        return false;
    }
    */
}
