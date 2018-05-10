<?php
namespace backend\components\grid;

use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;

class EnumColumn extends DataColumn
{
    /**
     * @var array List of value => name pairs
     */
    public $enum = [];

    /**
     * @var bool
     */
    public $loadFilterDefaultValues = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->loadFilterDefaultValues && $this->filter === null) {
            $this->filter = $this->enum;
        }
    }

    /**
     * @inheritdoc
     */
    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        return ArrayHelper::getValue($this->enum, $value, $value);
    }
}
