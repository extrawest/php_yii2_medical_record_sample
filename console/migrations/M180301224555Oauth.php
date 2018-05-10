<?php
namespace console\migrations;

use yii\db\Migration;

class M180301224555Oauth extends Migration
{
    const ACCESS_TOKEN_TABLE = '{{%oauth2_access_token}}';
    const REFRESH_TOKEN_TABLE = '{{%oauth2_refresh_token}}';

    public function safeUp()
    {

        $this->createTable(self::ACCESS_TOKEN_TABLE, [
            'access_token' => $this->string(40)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->notNull()->defaultValue(0),
            'expires' => $this->integer()->notNull(),
            'scope' => $this->text(),
            'PRIMARY KEY (access_token)',
        ]);
        $this->createTable(self::REFRESH_TOKEN_TABLE, [
            'refresh_token' => $this->string(40)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->notNull()->defaultValue(0),
            'expires' => $this->integer()->notNull(),
            'scope' => $this->text(),
            'PRIMARY KEY (refresh_token)',
        ]);
        $this->createIndex(
            'ix_refresh_token_expires',
            self::REFRESH_TOKEN_TABLE,
            'expires'
        );
        $this->createIndex(
            'ix_access_token_expires',
            self::ACCESS_TOKEN_TABLE,
            'expires'
        );
    }

    public function safeDown()
    {
        $this->dropTable(self::ACCESS_TOKEN_TABLE);
        $this->dropTable(self::REFRESH_TOKEN_TABLE);
    }
}
