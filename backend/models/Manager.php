<?php
namespace backend\models;

/**
 * @property string $password write-only password
 */
class Manager extends \common\models\Manager
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['first_name', 'last_name'], 'required'],
            [['first_name', 'last_name'], 'string'],
            [['password'], 'string', 'min' => 6, 'skipOnEmpty' => true],
            [['auth_key'], 'default', 'value' => function () {
                return $this->generateAuthKey();
            }],
        ]);
    }

    /**
     * Validation compatibility mock
     * @return null
     */
    public function getPassword()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function setPassword($password)
    {
        if (!$password) {
            return;
        }
        parent::setPassword($password);
    }
}
