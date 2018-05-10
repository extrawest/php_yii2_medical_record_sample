<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Nutrition model
 *
 * @property integer $id
 * @property string $name
 */
class Nutrition extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nutrition}}';
    }

    /**
     * @return query\NutritionQuery
     */
    public static function find()
    {
        return new query\NutritionQuery(get_called_class());
    }
}
