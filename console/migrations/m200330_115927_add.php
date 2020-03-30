<?php

use yii\db\Migration;

/**
 * Class m200330_115927_add
 */
class m200330_115927_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'delivery', $this->integer()->unsigned()->defaultValue(0)->after('price'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order', 'delivery');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200330_115927_add cannot be reverted.\n";

        return false;
    }
    */
}
