<?php
namespace api\modules\api\v1\controllers;

use common\models\Nationality;
use api\modules\api\v1\components\BasicController;

class NationalityController extends BasicController
{
    public $modelClass = Nationality::class;
}
