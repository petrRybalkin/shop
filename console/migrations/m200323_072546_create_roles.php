<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m200323_072546_create_roles
 */
class m200323_072546_create_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $am = Yii::$app->authManager;

        $manager = $am->createRole('manager');
        $am->add($manager);

        $admin = $am->createRole('admin');
        $am->add($admin);
        $am->addChild($admin, $manager);

        $user = User::findByUsername('admin');
        $am->assign($admin, $user->id);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $am = Yii::$app->authManager;

        $manager = $am->getRole('manager');
        $am->remove($manager);

        $admin = $am->getRole('admin');
        $am->remove($admin);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200323_072546_create_roles cannot be reverted.\n";

        return false;
    }
    */
}
