<?php

use yii\db\Migration;

/**
 * Class m200402_090806_1C_product
 */
class m200402_090806_1C_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'product_1c_id', $this->integer()->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'product_1c_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200402_090806_1C_product cannot be reverted.\n";

        return false;
    }
    */
}
