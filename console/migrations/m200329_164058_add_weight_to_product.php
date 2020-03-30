<?php

use yii\db\Migration;

/**
 * Class m200329_164058_add_weight_to_product
 */
class m200329_164058_add_weight_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product','weight', $this->integer(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product','weight');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200329_164058_add_weight_to_product cannot be reverted.\n";

        return false;
    }
    */
}
