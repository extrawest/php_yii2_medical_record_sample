<?php
namespace api\modules\api\v1\models;

use conquer\oauth2\Exception as OauthException;
use yii\web\ForbiddenHttpException;

class UserCredentials extends \conquer\oauth2\granttypes\UserCredentials
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grant_type', 'username', 'password'], 'required'],
            ['grant_type', 'required', 'requiredValue' => 'password'],
            ['client_id', 'default', 'value' => 'xxxxxx'],
            ['scope', 'validateScope'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     * @throws ForbiddenHttpException
     */
    public function validatePassword($attribute, $params)
    {
        try {
            parent::validatePassword($attribute, $params);
        } catch (OauthException $exception) {
            // replace response code from 500 to 403
            throw new ForbiddenHttpException($exception->getMessage());
        }
    }
}
