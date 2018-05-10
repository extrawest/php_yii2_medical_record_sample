<?php

use yii\web\View;
use backend\models\Manager;

/**
 * @var View $this
 * @var Manager $model
 */
$this->title = 'Update Manager: ' . ' ' . $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->login, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="document-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
