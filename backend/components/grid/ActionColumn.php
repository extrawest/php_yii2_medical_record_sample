<?php
namespace backend\components\grid;

use yii\grid\ActionColumn as BaseActionColumn;

class ActionColumn extends BaseActionColumn
{
    /**
     * @inheritdoc
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        switch ($name) {
            case 'view':
                $buttonClass = 'btn-info';
                $iconName = 'info-sign';
                break;
            case 'delete':
                $buttonClass = 'btn-danger';
                break;
            default:
                $buttonClass = 'btn-primary';
        }
        return parent::initDefaultButton($name, $iconName, [
            'class' => ['btn', $buttonClass],
        ] + $additionalOptions);
    }
}
