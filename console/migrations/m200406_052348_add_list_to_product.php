<?php

use yii\db\Migration;

/**
 * Class m200406_052348_add_list_to_product
 */
class m200406_052348_add_list_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'list_id', $this->integer()->defaultValue(null)->after('weight'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'list_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_052348_add_list_to_product cannot be reverted.\n";

        return false;
    }
    */
}
