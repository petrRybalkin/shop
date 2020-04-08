<?php

use yii\db\Migration;

/**
 * Class m200408_064256_list_1c_id
 */
class m200408_064256_list_1c_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_list_item', 'product_1c_id', $this->integer()->unsigned()->after('list_id'));
        $this->addColumn('product_list_item', 'image', $this->string()->after('title'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_list_item', 'product_1c_id');
        $this->dropColumn('product_list_item', 'image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200408_064256_list_1c_id cannot be reverted.\n";

        return false;
    }
    */
}
