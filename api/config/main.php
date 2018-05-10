<?php

return [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'name' => 'Medicatl Test API',
    'vendorPath' => dirname(dirname(__DIR__)).'/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'sourceLanguage' => 'en-US',
    'language' => 'en-US',
    'homeUrl' => Yii::getAlias('@apiUrl'),
    'controllerNamespace' => 'api\controllers',
    'defaultRoute' => 'api/v1/auth',
    'components' => [
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'suffix' => '/',
            'rules' => require(__DIR__.'/routes.php'),
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('DB_DSN'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'tablePrefix' => getenv('DB_TABLE_PREFIX'),
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
        'user' => [
            'identityClass' => \api\modules\api\v1\models\Manager::class,
        ],
    ],
    'modules' => [
        'api' => [
            'class' => \api\modules\api\Module::class,
            'modules' => [
                'v1' => \api\modules\api\v1\Module::class,
            ]
        ],
    ],
];
