<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * Patient model
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property bool $gender
 * @property int $nationality_id
 * @property Nationality $nationality
 * @property int $urine_continent_daytime
 * @property int $faeces_continent_daytime
 * @property int $urine_continent_nightime
 * @property int $faeces_continent_nightime
 * @property Nutrition[] $nutrition
 * @property NutritionalDiagnosis[] $nutritionalDiagnosis
 */
class Patient extends ActiveRecord
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const CONTINENT_VALUE_NOT_SELECTED = 0;
    const CONTINENT_VALUE_YES = 1;
    const CONTINENT_VALUE_NO = 2;
    const CONTINENT_VALUE_SOMETIMES = 3;
    const CONTINENT_VALUE_REQUIRED_AIDS = 4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%patients}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_of_birth', 'gender', 'nationality_id'], 'required'],
            [['first_name', 'last_name'], 'string'],
            [['date_of_birth'], 'date'],
            [['gender'], 'in', 'range' => [self::GENDER_MALE, self::GENDER_FEMALE]],
            [['nationality_id'], 'exist', 'targetRelation' => 'nationality'],
            [[
                'urine_continent_daytime',
                'faeces_continent_daytime',
                'urine_continent_nightime',
                'faeces_continent_nightime'
            ], 'default', 'value' => self::CONTINENT_VALUE_NOT_SELECTED],
        ];
    }

    /**
     * @return query\PatientQuery
     */
    public static function find()
    {
        return new query\PatientQuery(get_called_class());
    }

    /**
     * @return ActiveQuery
     */
    public function getNationality()
    {
        return $this->hasOne(Nationality::class, ['id' => 'nationality_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNutrition()
    {
        return $this->hasMany(Nutrition::class, ['id' => 'nutrition_id'])
            ->viaTable('patient_nutrition', ['patient_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNutritionalDiagnosis()
    {
        return $this->hasMany(NutritionalDiagnosis::class, ['id' => 'nutritional_diagnosis_id'])
            ->viaTable('patient_nutritional_diagnosis', ['patient_id' => 'id']);
    }
}
