<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class VueJsAsset extends AssetBundle
{
    public function init()
    {
        $this->js[] = YII_DEBUG
            ? 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js'
            : 'https://cdn.jsdelivr.net/npm/vue';
        $this->js[] = '';
        parent::init();
    }
}
