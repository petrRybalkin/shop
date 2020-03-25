<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'authManager' => [
            'class' => yii\rbac\DbManager::class,
            'defaultRoles' => ['guest', 'user'],
        ],
    ],
    'modules' => [
        'rbac' => [
            'class' => yii2mod\rbac\Module::class,
        ],
    ]
];
