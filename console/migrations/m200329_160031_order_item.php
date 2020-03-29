<?php

use yii\db\Migration;

/**
 * Class m200329_160031_order_item
 */
class m200329_160031_order_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('order_item', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'title' => $this->string(),
            'weight' => $this->string(),
            'price' => $this->integer(),
            'amount' => $this->smallInteger()->unsigned(),
            'description' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey('fk_order_item_order_id', 'order_item', 'order_id', 'order', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_item_order_id', 'order_item');
        $this->dropTable('order_item');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200329_160031_order_item cannot be reverted.\n";

        return false;
    }
    */
}
