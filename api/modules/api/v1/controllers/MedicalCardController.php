<?php
namespace api\modules\api\v1\controllers;

use yii\base\Module;
use yii\rest\ActiveController;
use yii\base\InvalidConfigException;
use yii\web\BadRequestHttpException;
use api\modules\api\v1\filters\TokenAuth;
use api\modules\api\v1\resources\Patient;
use common\services\PatientServiceInterface;

class MedicalCardController extends ActiveController
{
    public $modelClass = Patient::class;

    /** @var PatientServiceInterface */
    protected $patientService;

    public function __construct($id, Module $module, PatientServiceInterface $patientService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->patientService = $patientService;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors() + [
            'tokenAuth' => [
                'class' => TokenAuth::class,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);
        return $actions;
    }

    /**
     * @param $id
     * @return Patient
     * @throws BadRequestHttpException
     */
    public function actionUpdate($id)
    {
        try {
            $this->patientService->saveModel(
                $patient = Patient::findOne($id),
                \Yii::$app->request->getBodyParams()
            );
            return $patient;
        } catch (InvalidConfigException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    }
}
