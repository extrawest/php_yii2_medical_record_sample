<?php
namespace api\modules\api\v1\controllers;

use yii\rest\Controller;
use yii\rest\IndexAction;
use conquer\oauth2\TokenAction;
use api\modules\api\v1\filters\TokenAuth;
use api\modules\api\v1\models\UserCredentials;
use api\modules\api\v1\resources\Manager;

class AuthController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors() + [
            'tokenAuth' => [
                'class' => TokenAuth::class,
                'identityClass' => Manager::class,
                'except' => [
                    'generate-token',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'generate-token' => [
                'class' => TokenAction::class,
                'grantTypes' => [
                    'password' => UserCredentials::class,
                ],
            ],
            'token-info' => [
                'class' => IndexAction::class,
                'modelClass' => Manager::class,
                'prepareDataProvider' => function () {
                    return \Yii::$app->user->identity;
                }
            ],
        ];
    }
}
