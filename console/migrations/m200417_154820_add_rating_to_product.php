<?php

use yii\db\Migration;

/**
 * Class m200417_154820_add_rating_to_product
 */
class m200417_154820_add_rating_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'rating', $this->smallInteger()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'rating');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200417_154820_add_rating_to_product cannot be reverted.\n";

        return false;
    }
    */
}
