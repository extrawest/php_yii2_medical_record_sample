<?php

use yii\web\View;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonCreate;
use backend\models\Manager;
use backend\models\search\ManagerSearch;
use backend\components\grid\ActionColumn;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var ManagerSearch $searchModel
 * @var Manager $manager
 */

$this->title = 'Managers';
$this->params['breadcrumbs'][] = $this->title;
$manager = Yii::$app->user->identity;
?>
<div class="document-index">
    <p><?=ButtonCreate::widget([
        'label' => 'Create Manager',
        'link' => ['create'],
    ])?></p>
    <?php if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'login',
            'first_name',
            'last_name',
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',
                'visibleButtons' => [
                    'delete' => function (Manager $model) use ($manager) {
                        return $manager->id !== $model->id;
                    },
                ],
            ],
        ],
    ]); ?>
</div>
