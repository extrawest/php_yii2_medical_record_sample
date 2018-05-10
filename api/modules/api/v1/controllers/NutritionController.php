<?php
namespace api\modules\api\v1\controllers;

use common\models\Nutrition;
use api\modules\api\v1\components\BasicController;

class NutritionController extends BasicController
{
    public $modelClass = Nutrition::class;
}
