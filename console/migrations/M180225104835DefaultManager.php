<?php
namespace console\migrations;

use Yii;
use yii\db\Migration;
use yii\base\Security;

class M180225104835DefaultManager extends Migration
{
    const DEFAULT_USER_NAME = 'admin';

    const DEFAULT_USER_PASS = '123';

    /** @var Security */
    protected $security;

    public function init()
    {
        parent::init();
        $this->security = Yii::$app->security;
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%managers}}', [
            'login' => self::DEFAULT_USER_NAME,
            'password_hash' => $this->security->generatePasswordHash(self::DEFAULT_USER_PASS),
            'auth_key' => $this->security->generateRandomString(),
            'first_name' => '',
            'last_name' => '',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%managers}}', [
            'login' => self::DEFAULT_USER_NAME,
        ]);
    }
}
