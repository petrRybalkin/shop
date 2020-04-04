<?php

use yii\db\Migration;

/**
 * Class m200404_184649_slider_url
 */
class m200404_184649_slider_url extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('slider', 'url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('slider', 'url');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200404_184649_slider_url cannot be reverted.\n";

        return false;
    }
    */
}
