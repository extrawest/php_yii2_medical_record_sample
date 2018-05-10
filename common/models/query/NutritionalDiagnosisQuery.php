<?php
namespace common\models\query;

use yii\db\ActiveQuery;
use common\models\NutritionalDiagnosis;

class NutritionalDiagnosisQuery extends ActiveQuery
{
    public function getListValues()
    {
        $nutritionalDiagnosis = [];
        $this->orderBy([
            'name' => SORT_ASC,
        ]);
        /** @var NutritionalDiagnosis $diagnosis */
        foreach ($this->all() as $diagnosis) {
            $nutritionalDiagnosis[$diagnosis->id] = $diagnosis->name;
        }
        return $nutritionalDiagnosis;
    }

    /**
     * @param $id
     * @return null|NutritionalDiagnosis
     */
    public function getById($id)
    {
        return $this->where([
            'id' => $id,
        ])->one();
    }
}
