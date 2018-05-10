<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use yii\base\InvalidRouteException;
use yii\console\Exception as ConsoleException;

class AppController extends Controller
{
    public $writablePaths = [
        '@console/runtime',
        '@backend/runtime',
        '@api/runtime',
        '@api/web/assets',
        '@backend/web/assets',
    ];

    /**
     * @throws InvalidRouteException
     * @throws ConsoleException
     */
    public function actionSetup()
    {
        $this->runAction('set-writable', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('migrate/up', ['interactive' => $this->interactive]);
    }

    public function actionSetWritable()
    {
        $this->setWritable($this->writablePaths);
    }

    public function setWritable($paths)
    {
        foreach ($paths as $writable) {
            $writable = Yii::getAlias($writable);
            Console::output("Setting writable: {$writable}");
            @chmod($writable, 0777);
        }
    }
}
