<?php

use yii\db\Migration;

/**
 * Class m200224_102107_category
 */
class m200224_102107_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->text(),
            'seoTitle' => $this->string(),
            'seoDescription' => $this->text(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200224_102107_category cannot be reverted.\n";

        return false;
    }
    */
}
