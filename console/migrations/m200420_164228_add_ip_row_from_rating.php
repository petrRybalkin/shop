<?php

use yii\db\Migration;

/**
 * Class m200420_164228_add_ip_row_from_rating
 */
class m200420_164228_add_ip_row_from_rating extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rating', 'ip', $this->integer()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('rating', 'ip');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200420_164228_add_ip_row_from_rating cannot be reverted.\n";

        return false;
    }
    */
}
