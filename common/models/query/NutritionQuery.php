<?php
namespace common\models\query;

use yii\db\ActiveQuery;
use common\models\Nutrition;

class NutritionQuery extends ActiveQuery
{
    public function getListValues()
    {
        $nationalities = [];
        $this->orderBy([
            'name' => SORT_ASC,
        ]);
        /** @var Nutrition $nutrition */
        foreach ($this->all() as $nutrition) {
            $nationalities[$nutrition->id] = $nutrition->name;
        }
        return $nationalities;
    }

    /**
     * @param $id
     * @return null|Nutrition
     */
    public function getById($id)
    {
        return $this->where([
            'id' => $id,
        ])->one();
    }
}
