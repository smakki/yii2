<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `country`.
 */
class m161113_131016_create_country_table extends Migration
{

    /**
     * @inheritdoc
     */


    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('country', [
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
    }

    private function addCountry($code,$name,$pop)
    {
        return "INSERT INTO country (`code`, `name`, `population`) VALUES ('$code', '$name', '$pop')";
    }
    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('country');
    }
}
