<?php

use yii\db\Migration;

/**
 * Class m200403_053529_order_to_catalog
 */
class m200403_053529_order_to_catalog extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('category', 'sort', $this->smallInteger()->unsigned()->defaultValue(0)->after('parent_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('category', 'sort');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200403_053529_order_to_catalog cannot be reverted.\n";

        return false;
    }
    */
}
