<?php

use yii\db\Migration;

/**
 * Class m200417_080201_add_action_col_to_product
 */
class m200417_080201_add_action_col_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'sale', $this->smallInteger()->after('old_price')->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'sale');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200417_080201_add_action_col_to_product cannot be reverted.\n";

        return false;
    }
    */
}
