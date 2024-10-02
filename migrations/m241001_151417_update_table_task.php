<?php

use yii\db\Migration;

/**
 * Class m241001_151417_update_table_task
 */
class m241001_151417_update_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {     
         
        $this->addForeignKey(
            'fk-user_id', // name of the foreign key
            '{{%Task}}', // name of the current table
            'user_id', // the field in the current table
            '{{%USER}}', // the referenced table
            'id', // the referenced field
            'CASCADE', // ON DELETE
            'CASCADE'  // ON UPDATE
        );

        $this->addForeignKey(
            'fk-project_id', // name of the foreign key
            '{{%Task}}', // name of the current table
            'user_id', // the field in the current table
            '{{%Project}}', // the referenced table
            'id', // the referenced field
            'CASCADE', // ON DELETE
            'CASCADE'  // ON UPDATE
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241001_151417_update_table_task cannot be reverted.\n";
        $this->dropForeignKey(
            'fk-user_id', // name of the foreign key
            '{{%Task}}' // name of the current table

        );

        $this->dropForeignKey(
            'fk-project_id', // name of the foreign key 
            '{{%Task}}' // name of the current table
        );
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241001_151417_update_table_task cannot be reverted.\n";

        return false;
    }
    */
}
