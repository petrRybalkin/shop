<?php

use yii\db\Migration;

/**
 * Class m200224_102111_product
 */
class m200224_102111_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->text(),
            'price' => $this->integer(),
            'old_price' => $this->integer(),
            'seoTitle' => $this->string(),
            'seoDescription' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_product_category_id', 'product', 'category_id', 'category', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_category_id', 'product');
        $this->dropTable('product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200224_102111_product cannot be reverted.\n";

        return false;
    }
    */
}
