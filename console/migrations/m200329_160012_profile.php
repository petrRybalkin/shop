<?php

use yii\db\Migration;

/**
 * Class m200329_160012_profile
 */
class m200329_160012_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'city' => $this->string(),
            'address' => $this->string(),
        ],$tableOptions);
        $this->addForeignKey('fr_profile_user_id', 'profile', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fr_profile_user_id', 'profile');
        $this->dropTable('profile');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200329_160012_profile cannot be reverted.\n";

        return false;
    }
    */
}
