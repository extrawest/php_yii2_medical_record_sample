<?php
namespace api\modules\api\v1\resources;

class Manager extends \api\modules\api\v1\models\Manager
{
    public function fields()
    {
        return [
            'id',
            'login',
            'first_name',
            'last_name',
        ];
    }
}
