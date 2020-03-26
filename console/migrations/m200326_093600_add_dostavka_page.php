<?php

use yii\db\Migration;

/**
 * Class m200326_093600_add_dostavka_page
 */
class m200326_093600_add_dostavka_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('page', [
            'slug' => 'dostavka-i-oplata',
            'title' => 'Доставка и оплата',
            'description' => '<p>Описание доставки и оплата</p>',
            'seoTitle' => 'Доставка и оплата',
            'seoDescription' => 'Доставка и оплата',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('page', [
            'slug' => 'dostavka-i-oplata',
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200326_093600_add_dostavka_page cannot be reverted.\n";

        return false;
    }
    */
}
