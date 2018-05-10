<?php
namespace api\modules\api\v1\components;

use yii\rest\ActiveController;

class BasicController extends ActiveController
{
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create'], $actions['update'], $actions['delete'], $actions['view']);
        return $actions;
    }
}
