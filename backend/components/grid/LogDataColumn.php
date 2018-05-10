<?php
namespace backend\components\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\VarDumper;

class LogDataColumn extends DataColumn
{
    /**
     * @inheritdoc
     */
    public function getDataCellValue($model, $key = null, $index = null)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        return $value
            ? Html::tag('pre', VarDumper::dumpAsString(Json::decode($value)))
            : '&mdash;';
    }
}
