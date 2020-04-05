<?php

use yii\db\Migration;

/**
 * Class m200405_100442_add_option_status_to_product
 */
class m200405_100442_add_option_status_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product','superprice', $this->smallInteger()->notNull()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product','superprice');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200405_100442_add_option_status_to_product cannot be reverted.\n";

        return false;
    }
    */
}
