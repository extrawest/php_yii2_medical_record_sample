<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'pluralize' => false,
        'controller' => 'api/v1/auth',
        'patterns' => [
            'GET token' => 'token-info',
            'POST token' => 'generate-token',
        ],
    ],
    [
        'class' => UrlRule::class,
        'controller' => 'api/v1/nationality',
    ],
    [
        'class' => UrlRule::class,
        'pluralize' => false,
        'controller' => 'api/v1/nutrition',
    ],
    [
        'class' => UrlRule::class,
        'pluralize' => false,
        'controller' => 'api/v1/nutritional-diagnosis',
    ],
    [
        'class' => UrlRule::class,
        'controller' => 'api/v1/medical-card',
    ],
];
