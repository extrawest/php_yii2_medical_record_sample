<?php

use yii\web\View;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use backend\widgets\Button;
use backend\widgets\ButtonEdit;
use backend\widgets\ButtonDelete;
use backend\models\Manager;

/**
 * @var View $this
 * @var Manager $model
 * @var Manager $manager
 * @var ActiveDataProvider $membershipDataProvider
 * @var ActiveDataProvider $logsDataProvider
 * @var array $itemTypes
 */

$this->title = $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$manager = Yii::$app->user->identity;

?>
<div class="document-view">
    <p>
        <?=ButtonEdit::widget([
            'link' => ['update', 'id' => $model->id],
        ])?>
        <?php if ($manager->id !== $model->id) : ?>
            <?=ButtonDelete::widget([
                'link' => ['delete', 'id' => $model->id],
            ])?>
        <?php endif; ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
            'first_name',
            'last_name',
        ],
    ]) ?>
</div>
