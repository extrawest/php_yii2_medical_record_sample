<?php
namespace backend\controllers;

use Yii;
use backend\models\Manager;
use backend\models\search\ManagerSearch;
use backend\components\Controller;

/**
 * ManagersController implements the CRUD actions for Manager model.
 * @method Manager findModel($id)
 */
class ManagersController extends Controller
{
    /**
     * @var string
     */
    protected $modelClass = Manager::class;

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ManagerSearch();
        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );
        return $this->render('index', [
            'dataProvider' => $dataProvider,
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
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Manager();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this
                ->addFlashMessage('User created: ' . $model->login, self::FLASH_SUCCESS)
                ->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this
                ->addFlashMessage('User updated: ' . $model->login, self::FLASH_SUCCESS)
                ->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            $this->addFlashMessage('User deleted: ' . $model->login, self::FLASH_WARNING);
        }
        return $this->redirect(['index']);
    }
}
