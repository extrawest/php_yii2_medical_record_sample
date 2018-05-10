<?php
namespace api\modules\api\v1\filters;

use conquer\oauth2\models\AccessToken;
use conquer\oauth2\Exception;
use yii\web\ForbiddenHttpException;

class TokenAuth extends \conquer\oauth2\TokenAuth
{
    /**
     * @return AccessToken
     * @throws ForbiddenHttpException
     */
    protected function getAccessToken()
    {
        try {
            return parent::getAccessToken();
        } catch (Exception $exception) {
            throw new ForbiddenHttpException($exception->getMessage());
        }
    }
}
