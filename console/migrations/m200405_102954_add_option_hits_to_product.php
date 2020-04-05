<?php

use yii\db\Migration;

/**
 * Class m200405_102954_add_option_hits_to_product
 */
class m200405_102954_add_option_hits_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product','hits', $this->smallInteger()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product','hits');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200405_102954_add_option_hits_to_product cannot be reverted.\n";

        return false;
    }
    */
}
