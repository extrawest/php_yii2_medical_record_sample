<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Nutrition diagnosis model
 *
 * @property integer $id
 * @property string $name
 */
class NutritionalDiagnosis extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nutritional_diagnosis}}';
    }

    /**
     * @return query\NutritionalDiagnosisQuery
     */
    public static function find()
    {
        return new query\NutritionalDiagnosisQuery(get_called_class());
    }
}
