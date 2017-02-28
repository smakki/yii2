<?php

use yii\db\Migration;
use yii\db\Schema;

class m170225_082236_restore_all extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%country}}', [
            'code' => Schema::TYPE_CHAR .'(2) NOT NULL PRIMARY KEY',
            'name' => Schema::TYPE_CHAR .'(52) NOT NULL',
            'population' => Schema::TYPE_INTEGER .'(11) NOT NULL DEFAULT \'0\''
        ],$tableOptions);
        $this->execute($this->addCountry('AU','Australia',24016400));
        $this->execute($this->addCountry('BR','Brazil',205722000));
        $this->execute($this->addCountry('CA','Canada',35985751));
        $this->execute($this->addCountry('DE','Germany',81459000));
        $this->execute($this->addCountry('CN','China',1375210000));
        $this->execute($this->addCountry('FR','France',64513242));
        $this->execute($this->addCountry('GB','United Kingdom',65097000));
        $this->execute($this->addCountry('IN','India',1285400000));
        $this->execute($this->addCountry('RU','Russia',146519759));
        $this->execute($this->addCountry('US','United States',322976000));

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . ' NOT NULL',
            'token' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('username', '{{%user}}', 'username', true);

        $this->execute($this->addUserSql());
    }

    private function addCountry($code,$name,$pop)
    {
        return "INSERT INTO {{%country}} (`code`, `name`, `population`) VALUES ('$code', '$name', '$pop')";
    }

    private function addUserSql()
    {
        $password = Yii::$app->security->generatePasswordHash('admin');
        $auth_key = Yii::$app->security->generateRandomString();
        $token = Yii::$app->security->generateRandomString() . '_' . time();
        return "INSERT INTO {{%user}} (`username`, `email`, `password`, `auth_key`, `token`) VALUES ('admin', 'admin@myblog.loc', '$password', '$auth_key', '$token')";
    }

    public function down()
    {
        $this->dropTable('{{%country}}');
        $this->dropTable('{{%user}}');

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
