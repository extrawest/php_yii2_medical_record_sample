<?php
namespace backend\controllers;

use Yii;
use yii\base\Module;
use yii\base\InvalidConfigException;
use backend\models\Patient;
use backend\models\Nationality;
use backend\models\search\PatientSearch;
use backend\components\Controller;
use common\models\Nutrition;
use common\models\NutritionalDiagnosis;
use common\services\PatientServiceInterface;

/**
 * PatientsController implements the CRUD actions for Patients model.
 * @method Patient findModel($id)
 */
class PatientsController extends Controller
{
    /** @var PatientServiceInterface */
    protected $patientService;

    public function __construct(
        $id,
        Module $module,
        PatientServiceInterface $patientService,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->patientService = $patientService;
    }

    /**
     * @var string
     */
    protected $modelClass = Patient::class;

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'genderList' => $this->getGenderList(),
            'nationalityList' => $this->getNationalityList(),
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $user = $this->findModel($id);
        return $this->render('view', [
            'model' => $user,
            'genderList' => $this->getGenderList(),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this
                ->addFlashMessage('Record created: ' . $model->name, self::FLASH_SUCCESS)
                ->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
            'genderList' => $this->getGenderList(),
            'nationalityList' => $this->getNationalityList(),
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws InvalidConfigException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->patientService->saveModel($model, \Yii::$app->request->post($model->formName()))) {
            return $this
                ->addFlashMessage('Record updated: ' . $model->name, self::FLASH_SUCCESS)
                ->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'genderList' => $this->getGenderList(),
            'nationalityList' => $this->getNationalityList(),
            'nutritionList' => $this->getNutritionList(),
            'nutritionalDiagnosisList' => $this->getNutritionalDiagnosisList(),
            'continentValueList' => $this->getContinentValueList(),
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws \Throwable
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            $this->addFlashMessage('Record deleted: ' . $model->name, self::FLASH_WARNING);
        }
        return $this->redirect(['index']);
    }

    /**
     * @return array
     */
    protected function getGenderList()
    {
        return Patient::find()
            ->getGenderValueList();
    }

    /**
     * @return array
     */
    protected function getNationalityList()
    {
        return Nationality::find()
            ->getListValues();
    }

    /**
     * @return array
     */
    protected function getNutritionList()
    {
        return Nutrition::find()
            ->getListValues();
    }

    /**
     * @return array
     */
    protected function getNutritionalDiagnosisList()
    {
        return NutritionalDiagnosis::find()
            ->getListValues();
    }

    /**
     * @return array
     */
    protected function getContinentValueList()
    {
        return Patient::find()
            ->getContinentValueList();
    }
}
