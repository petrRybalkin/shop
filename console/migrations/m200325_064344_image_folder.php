<?php

use yii\db\Migration;
use yii\helpers\FileHelper;

/**
 * Class m200325_064344_image_folder
 */
class m200325_064344_image_folder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $backImageFolder = Yii::getAlias('@backend/web/images');
        $frontImageFolder = Yii::getAlias('@frontend/web/images');
        FileHelper::createDirectory($backImageFolder);
        symlink($backImageFolder, $frontImageFolder);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $backImageFolder = Yii::getAlias('@backend/web/images');
        $frontImageFolder = Yii::getAlias('@frontend/web/images');
        unlink($frontImageFolder);
        unlink($backImageFolder);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_064344_image_folder cannot be reverted.\n";

        return false;
    }
    */
}
