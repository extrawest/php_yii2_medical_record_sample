<?php
namespace api\modules\api\v1\models;

use conquer\oauth2\OAuth2IdentityInterface;

class Manager extends \common\models\Manager implements OAuth2IdentityInterface
{
    public static function findIdentityByUsername($username)
    {
        return self::findByUsername($username);
    }
}
