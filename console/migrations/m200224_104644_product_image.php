<?php

use yii\db\Migration;

/**
 * Class m200224_104644_product_image
 */
class m200224_104644_product_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('product_image', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'image' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey('fk_product_image_product_id', 'product_image', 'product_id', 'product', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_image_product_id', 'product_image');
        $this->dropTable('product_image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200224_104644_product_image cannot be reverted.\n";

        return false;
    }
    */
}
