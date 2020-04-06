<?php

use yii\db\Migration;

/**
 * Class m200406_052108_product_list
 */
class m200406_052108_product_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('product_list', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'required' => $this->boolean()->defaultValue(false),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_list');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_052108_product_list cannot be reverted.\n";

        return false;
    }
    */
}
