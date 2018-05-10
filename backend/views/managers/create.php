<?php

use yii\web\View;
use backend\models\Manager;

/**
 * @var View $this
 * @var Manager $model
 */

$this->title = 'Create Manager';
$this->params['breadcrumbs'][] = ['label' => 'Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="mailer-domain-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
