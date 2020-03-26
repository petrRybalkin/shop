<?php

use yii\db\Migration;

/**
 * Class m200326_063830_pages
 */
class m200326_063830_pages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->unique(),
            'title' => $this->string(),
            'description' => $this->text(),
            'seoTitle' => $this->string(),
            'seoDescription' => $this->string(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200326_063830_pages cannot be reverted.\n";

        return false;
    }
    */
}
