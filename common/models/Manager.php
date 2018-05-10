<?php
namespace common\models;

use Yii;
use yii\base\Security;
use yii\db\ActiveRecord;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use yii\base\Exception as BaseException;

/**
 * Manager model
 * @property integer $id
 * @property string $login
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password write-only password
 * @property string $first_name
 * @property string $last_name
 */
class Manager extends ActiveRecord implements IdentityInterface
{
    /**
     * @var Security
     */
    protected $security;

    public function init()
    {
        parent::init();
        $this->security = Yii::$app->security;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%managers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['login', 'required'],
            ['login', 'string'],
            ['login', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['login' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     * @param string $password
     * @throws BaseException
     */
    public function setPassword($password)
    {
        $this->password_hash = $this->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     * @return string
     * @throws BaseException
     */
    public function generateAuthKey()
    {
        return $this->security->generateRandomString();
    }
}
