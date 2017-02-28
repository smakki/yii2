<?php

use yii\db\Migration;

class m170225_081908_clear_all extends Migration
{
    public function up()
    {
        $this->dropTable('{{%country}}');
        $this->dropTable('{{%profile}}');
        $this->dropTable('{{%social_account}}');
        $this->dropTable('{{%token}}');
        $this->dropTable('{{%user}}');
    }

    public function down()
    {
        echo "m170225_081908_clear_all cannot be reverted.\n";

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
