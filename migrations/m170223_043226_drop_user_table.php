<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `user`.
 */
class m170223_043226_drop_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('{{%user}}');
    }

}
