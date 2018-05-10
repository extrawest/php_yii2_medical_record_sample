<?php
namespace common\models\query;

use yii\db\ActiveQuery;
use backend\models\Patient;

class PatientQuery extends ActiveQuery
{
    public function getGenderValueList()
    {
        return [
            Patient::GENDER_MALE => 'Male',
            Patient::GENDER_FEMALE => 'Female',
        ];
    }

    public function getContinentValueList()
    {
        return [
            Patient::CONTINENT_VALUE_YES => 'Yes',
            Patient::CONTINENT_VALUE_NO => 'No',
            Patient::CONTINENT_VALUE_SOMETIMES => 'Sometimes',
            Patient::CONTINENT_VALUE_REQUIRED_AIDS => 'Required Aids',
        ];
    }
}
