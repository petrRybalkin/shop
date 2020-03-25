<?php

use yii\db\Migration;

/**
 * Class m200224_114926_product_image_main
 */
class m200224_114926_product_image_main extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_image', 'main', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_image', 'main');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200224_114926_product_image_main cannot be reverted.\n";

        return false;
    }
    */
}
