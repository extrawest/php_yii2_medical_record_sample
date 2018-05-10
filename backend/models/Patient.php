<?php
namespace backend\models;

/**
 * @property string $name
 */
class Patient extends \common\models\Patient
{
    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nationality_id' => 'Nationality',
        ];
    }
}
