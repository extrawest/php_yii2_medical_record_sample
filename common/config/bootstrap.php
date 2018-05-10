<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/api');

Yii::setAlias('@apiUrl', getenv('API_URL'));
Yii::setAlias('@apiTestUrl', getenv('API_TEST_URL'));


\Yii::$container->set(
    \common\services\PatientServiceInterface::class,
    \common\services\PatientService::class
);

Yii::$container->set(
    \common\models\query\NutritionQuery::class,
    \common\models\query\NutritionQuery::class,
    [
        \common\models\Nutrition::class
    ]
);

Yii::$container->set(
    \common\models\query\NutritionalDiagnosisQuery::class,
    \common\models\query\NutritionalDiagnosisQuery::class,
    [
        \common\models\NutritionalDiagnosis::class
    ]
);
