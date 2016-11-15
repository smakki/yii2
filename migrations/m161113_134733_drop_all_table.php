<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `all`.
 */
class m161113_134733_drop_all_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('user');
        $this->dropTable('country');
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        echo "Эту миграцию нельзя отменить\n";
        return false;
    }
}
