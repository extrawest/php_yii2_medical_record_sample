<?php
namespace console\migrations;

use yii\db\Migration;

class M180225100305Initial extends Migration
{
    const TABLE_OPTION = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%managers}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
        ]);
        $this->createTable('{{%nationalities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
        ]);
        $this->createTable('{{%nutrition}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
        ]);
        $this->createTable('{{%nutritional_diagnosis}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
        ]);
        $this->createTable('{{%patients}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'gender' => $this->boolean()->notNull(),
            'nationality_id' => $this->integer()->notNull(),
            'urine_continent_daytime' => $this->smallInteger()->notNull(),
            'faeces_continent_daytime' => $this->smallInteger()->notNull(),
            'urine_continent_nightime' => $this->smallInteger()->notNull(),
            'faeces_continent_nightime' => $this->smallInteger()->notNull(),
        ]);
        $this->createIndex('patient_nationality', '{{%patients}}', ['nationality_id']);
        $this->createIndex('patient_gender', '{{%patients}}', ['gender']);
        $this->createTable('{{%patient_nutrition}}', [
            'id' => $this->primaryKey(),
            'patient_id' => $this->integer()->notNull(),
            'nutrition_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('patient_nutrition', '{{%patient_nutrition}}', [
            'patient_id', 'nutrition_id'
        ], true);
        $this->createTable('{{%patient_nutritional_diagnosis}}', [
            'id' => $this->primaryKey(),
            'patient_id' => $this->integer()->notNull(),
            'nutritional_diagnosis_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('patient_nutritional_diagnosis', '{{%patient_nutritional_diagnosis}}', [
            'patient_id', 'nutritional_diagnosis_id'
        ], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%managers}}');
        $this->dropTable('{{%nationalities}}');
        $this->dropTable('{{%nutrition}}');
        $this->dropTable('{{%nutritional_diagnosis}}');
        $this->dropTable('{{%patients}}');
        $this->dropTable('{{%patient_nutrition}}');
        $this->dropTable('{{%patient_nutritional_diagnosis}}');
    }

    /**
     * Change default table options
     * @inheritdoc
     */
    public function createTable($table, $columns, $options = null)
    {
        parent::createTable($table, $columns, self::TABLE_OPTION);
    }
}
