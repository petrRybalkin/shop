<?php

use MP\ImageOptimize\ImageOptimizeController;
use MP\ImageOptimize\ImageOptimizerService;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@app/migrations',
                '@yii/rbac/migrations',
                '@vendor/pheme/yii2-settings/migrations',
            ]
        ],
        'image-optimize' => [
            'class'           => ImageOptimizeController::class,
            'log'             => YII_DEBUG,
            'imageExtensions' => [
                ImageOptimizerService::IMAGE_PNG, ImageOptimizerService::IMAGE_JPG, ImageOptimizerService::IMAGE_JPEG,
            ],
            'folders'         => [ // Add your folders for images optimize
                '@backend/web/images',
//                '@frontend/web/uploads/test2' => [ // with options
//                    'execlude' => [ // Exclude subfolders or files
//                        '@frontend/web/uploads/test/subfolder',
//                        '@frontend/web/uploads/test/file.png', // Filename WITH PATH
//                    ]
//                ],
            ],
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'modules' => [
        'rbac' => [
            'class' => 'yii2mod\rbac\ConsoleModule'
        ]
    ],
    'params' => $params,
];
