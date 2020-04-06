<?php

use yii\db\Migration;

/**
 * Class m200406_173542_item_1c_id
 */
class m200406_173542_item_1c_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order_item', 'product_1c_id', $this->integer()->defaultValue(null)->after('product_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order_item', 'product_1c_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_173542_item_1c_id cannot be reverted.\n";

        return false;
    }
    */
}
