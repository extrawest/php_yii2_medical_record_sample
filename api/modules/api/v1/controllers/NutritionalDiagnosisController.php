<?php
namespace api\modules\api\v1\controllers;

use common\models\NutritionalDiagnosis;
use api\modules\api\v1\components\BasicController;

class NutritionalDiagnosisController extends BasicController
{
    public $modelClass = NutritionalDiagnosis::class;
}
