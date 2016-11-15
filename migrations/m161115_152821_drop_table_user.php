<?php

use yii\db\Migration;

class m161115_152821_drop_table_user extends Migration
{
    public function up()
    {
        $this->dropTable('{{%user}}');
    }

    public function down()
    {
        echo "m161115_152821_drop_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
