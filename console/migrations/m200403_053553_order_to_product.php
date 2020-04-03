<?php

use yii\db\Migration;

/**
 * Class m200403_053553_order_to_product
 */
class m200403_053553_order_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'sort', $this->smallInteger()->unsigned()->defaultValue(0)->after('category_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'sort');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200403_053553_order_to_product cannot be reverted.\n";

        return false;
    }
    */
}
