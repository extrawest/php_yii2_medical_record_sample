<?php
namespace backend\models\query;

use yii\db\ActiveQuery;
use backend\models\Nationality;

class NationalityQuery extends ActiveQuery
{
    public function getListValues()
    {
        $nationalities = [];
        $this->orderBy([
            'name' => SORT_ASC,
        ]);
        /** @var Nationality $nationality */
        foreach ($this->all() as $nationality) {
            $nationalities[$nationality->id] = $nationality->name;
        }
        return $nationalities;
    }
}
