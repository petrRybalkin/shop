<?php

use yii\db\Migration;

/**
 * Class m200410_131349_update_product_status
 */
class m200410_131349_update_product_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('product', ['status' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->update('product', ['status' => 0]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200410_131349_update_product_status cannot be reverted.\n";

        return false;
    }
    */
}
