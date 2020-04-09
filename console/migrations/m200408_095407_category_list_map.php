<?php

use yii\db\Migration;

/**
 * Class m200408_095407_category_list_map
 */
class m200408_095407_category_list_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category_list_map', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'list_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk_category_list_map_category_id', 'category_list_map', 'category_id', 'category', 'id');
        $this->addForeignKey('fk_category_list_map_list_id', 'category_list_map', 'list_id', 'product_list', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_list_map_category_id', 'category_list_map');
        $this->dropForeignKey('fk_category_list_map_list_id', 'category_list_map');
        $this->dropTable('category_list_map');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200408_095407_category_list_map cannot be reverted.\n";

        return false;
    }
    */
}
