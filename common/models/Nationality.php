<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Nationality model
 *
 * @property integer $id
 * @property string $name
 */
class Nationality extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nationalities}}';
    }
}
