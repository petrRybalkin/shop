<?php

use yii\db\Migration;

/**
 * Class m200401_051651_order_status
 */
class m200401_051651_order_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'status', $this->smallInteger()->after('id')->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200401_051651_order_status cannot be reverted.\n";

        return false;
    }
    */
}
