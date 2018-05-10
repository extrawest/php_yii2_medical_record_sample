<?php
namespace backend\components\grid;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Log;
use yii\grid\DataColumn;

class LogActionColumn extends DataColumn
{
    const LABEL_DEFAULT = 'label label-primary';
    const LABEL_LOGIN = 'label label-default';
    const LABEL_DELETE = 'label label-warning';
    const LABEL_CREATE = 'label label-success';

    protected $actionIconsMap = [
        Log::ACTION_LOGIN => self::LABEL_LOGIN,
        Log::ACTION_LOGOUT => self::LABEL_LOGIN,
        Log::ACTION_CREATE => self::LABEL_CREATE,
        Log::ACTION_DELETE => self::LABEL_DELETE,
    ];

    /**
     * @inheritdoc
     */
    public function getDataCellValue($model, $key = null, $index = null)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        return Html::tag(
            'span',
            ArrayHelper::getValue(Log::listActions(), $value),
            [
                'class' => ArrayHelper::getValue($this->actionIconsMap, $value, self::LABEL_DEFAULT),
            ]
        );
    }
}
