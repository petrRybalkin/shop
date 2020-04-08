<?php

use yii\db\Migration;

/**
 * Class m200408_095108_remove_list_id_from_product
 */
class m200408_095108_remove_list_id_from_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('product', 'list_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('product', 'list_id', $this->integer()->defaultValue(null)->after('weight'));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200408_095108_remove_list_id_from_product cannot be reverted.\n";

        return false;
    }
    */
}
