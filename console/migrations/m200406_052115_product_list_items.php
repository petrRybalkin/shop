<?php

use yii\db\Migration;

/**
 * Class m200406_052115_product_list_items
 */
class m200406_052115_product_list_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('product_list_item', [
            'id' => $this->primaryKey(),
            'list_id' => $this->integer(),
            'sort' => $this->smallInteger()->unsigned()->defaultValue(0),
            'title' => $this->string(),
            'price' => $this->integer()->unsigned(),
        ], $tableOptions);

        $this->addForeignKey('fk_product_list_item_list_id', 'product_list_item', 'list_id', 'product_list', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_list_item_list_id', 'product_list_item');

        $this->dropTable('product_list_item');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_052115_product_list_items cannot be reverted.\n";

        return false;
    }
    */
}
