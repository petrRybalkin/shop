<?php

use yii\db\Migration;

/**
 * Class m200421_165943_add_update_time_product_rating
 */
class m200421_165943_add_update_time_product_rating extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'update_utime', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'update_utime');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200421_165943_add_update_time_product_rating cannot be reverted.\n";

        return false;
    }
    */
}
