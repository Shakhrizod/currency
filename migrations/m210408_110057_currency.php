<?php

use yii\db\Migration;

/**
 * Class m210408_110057_currency
 */
class m210408_110057_currency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'valute_id' => $this->string(),
            'num_code' => $this->bigInteger(),
            'char_code' => $this->string(),
            'name' => $this->string(),
            'value' => $this->string(),
            'date' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210408_110057_currency cannot be reverted.\n";

        return false;
    }
}
