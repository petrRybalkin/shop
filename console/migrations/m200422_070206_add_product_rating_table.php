<?php

use yii\db\Migration;

/**
 * Class m200422_070206_add_product_rating_table
 */
class m200422_070206_add_product_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('product_rating', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'product_id' => $this->integer()->defaultValue(null),
            'ip' => $this->integer()->defaultValue(null),
            'rating' => $this->decimal(10,2)->defaultValue('0.00'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_rating');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200422_070206_add_product_rating_table cannot be reverted.\n";

        return false;
    }
    */
}
