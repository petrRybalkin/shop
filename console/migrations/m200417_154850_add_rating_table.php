<?php

use yii\db\Migration;

/**
 * Class m200417_154850_add_rating_table
 */
class m200417_154850_add_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('rating', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->defaultValue(null),
            'user_id' => $this->integer()->defaultValue(null),
            'rating' => $this->integer()->defaultValue(0),
            'created_at' => $this->dateTime(),
        ], $tableOptions);

        $this->addForeignKey('fk_rating_product_id', 'rating', 'product_id', 'product', 'id');
        $this->addForeignKey('fk_rating_user_id', 'rating', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_rating_product_id', 'rating');
        $this->dropForeignKey('fk_rating_user_id', 'rating');
        $this->dropTable('rating');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200417_154850_add_rating_table cannot be reverted.\n";

        return false;
    }
    */
}
