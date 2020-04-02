<?php

use yii\db\Migration;

/**
 * Class m200402_133447_slider
 */
class m200402_133447_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'place' => $this->smallInteger(),
            'image' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('slider');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200402_133447_slider cannot be reverted.\n";

        return false;
    }
    */
}
