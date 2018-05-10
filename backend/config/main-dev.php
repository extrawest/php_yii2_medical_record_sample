<?php

if (!YII_DEBUG) {
    return [];
}

if (!class_exists('yii\debug\Module')
 || !class_exists('yii\gii\Module')) {
    return [];
}

return [
    'bootstrap' => ['debug', 'gii'],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
    ],
];
