<?php
namespace backend\models;

class Nationality extends \common\models\Nationality
{
    /**
     * @return query\NationalityQuery
     */
    public static function find()
    {
        return new query\NationalityQuery(get_called_class());
    }
}
