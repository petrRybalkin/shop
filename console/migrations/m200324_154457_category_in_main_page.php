<?php

use yii\db\Migration;

/**
 * Class m200324_154457_category_in_main_page
 */
class m200324_154457_category_in_main_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('category', 'show_in_main', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('category', 'show_in_main');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200324_154457_category_in_main_page cannot be reverted.\n";

        return false;
    }
    */
}
