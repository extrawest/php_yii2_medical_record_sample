<?php
namespace api\modules\api\v1\resources;

use yii\web\Link;
use yii\web\Linkable;
use yii\helpers\Url;

class Patient extends \common\models\Patient implements Linkable
{
    public function fields()
    {
        return [
            'id',
            'first_name',
            'last_name',
            'date_of_birth',
            'gender' => function (Patient $patient) {
                return Patient::find()->getGenderValueList()[$patient->gender] ?? null;
            },
            'nationality' => function (Patient $patient) {
                return $patient->nationality->name;
            },
        ];
    }

    public function extraFields()
    {
        return [
            'nutrition',
            'nutritionalDiagnosis',
            'continence' => function (Patient $patient) {
                $values = Patient::find()->getContinentValueList();
                return [
                    'urine_continent_daytime' => $values[$patient->urine_continent_daytime] ?? null,
                    'faeces_continent_daytime' => $values[$patient->faeces_continent_daytime] ?? null,
                    'urine_continent_nightime' => $values[$patient->urine_continent_nightime] ?? null,
                    'faeces_continent_nightime' => $values[$patient->faeces_continent_nightime] ?? null,
                ];
            },
        ];
    }


    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to('@apiUrl/v1/medical-cards/' . $this->id . '/')
        ];
    }
}
