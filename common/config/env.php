<?php

if (getenv('YII_ENV')) {
    return;
}

$dotEnv = new \Dotenv\Dotenv(dirname(dirname(__DIR__)));
$dotEnv->load();

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') === 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ?: 'prod');
