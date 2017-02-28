<?php

use yii\db\Migration;
use yii\db\Schema;

class m170225_130824_add_category extends Migration
{
    public function up()
    {
        $this->createTable('{{%category}}',
            [
                'id'=>Schema::TYPE_PK,
                'name'=>Schema::TYPE_STRING . ' NOT NULL',
                'aid'=>Schema::TYPE_INTEGER . ' NOT NULL'
            ]
            );
    }

    public function down()
    {
        echo "m170225_130824_add_category cannot be reverted.\n";

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
