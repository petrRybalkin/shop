<?php

use yii\db\Migration;

/**
 * Class m200405_162206_order_person_count
 */
class m200405_162206_order_person_count extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'person_count', $this->smallInteger()->unsigned()->defaultValue(1)->after('price'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order', 'person_count');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200405_162206_order_person_count cannot be reverted.\n";

        return false;
    }
    */
}
