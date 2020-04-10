<?php

use yii\db\Migration;

/**
 * Class m200410_114303_add_product_status
 */
class m200410_114303_add_product_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'status', $this->smallInteger()->after('id')->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200410_114303_add_product_status cannot be reverted.\n";

        return false;
    }
    */
}
