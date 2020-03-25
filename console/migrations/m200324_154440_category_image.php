<?php

use yii\db\Migration;

/**
 * Class m200324_154440_category_image
 */
class m200324_154440_category_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('category', 'image', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('category', 'image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200324_154440_category_image cannot be reverted.\n";

        return false;
    }
    */
}
