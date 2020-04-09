<?php

use yii\db\Migration;

/**
 * Class m200408_100108_product_list_add_max
 */
class m200408_100108_product_list_add_max extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_list', 'max_attributes', $this->smallInteger()->unsigned()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_list', 'max_attributes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200408_100108_product_list_add_max cannot be reverted.\n";

        return false;
    }
    */
}
