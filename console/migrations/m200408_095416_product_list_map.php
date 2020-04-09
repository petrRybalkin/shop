<?php

use yii\db\Migration;

/**
 * Class m200408_095416_product_list_map
 */
class m200408_095416_product_list_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_list_map', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'list_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk_product_list_map_product_id', 'product_list_map', 'product_id', 'product', 'id');
        $this->addForeignKey('fk_product_list_map_list_id', 'product_list_map', 'list_id', 'product_list', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_list_map_product_id', 'product_list_map');
        $this->dropForeignKey('fk_product_list_map_list_id', 'product_list_map');
        $this->dropTable('product_list_map');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200408_095416_product_list_map cannot be reverted.\n";

        return false;
    }
    */
}
