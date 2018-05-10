<?php

use yii\web\View;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonCreate;
use backend\components\grid\EnumColumn;
use backend\models\search\PatientSearch;
use backend\components\grid\ActionColumn;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var PatientSearch $searchModel
 * @var array $genderList
 * @var array $nationalityList
 */

$this->title = 'Medical Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">
    <p><?=ButtonCreate::widget([
        'label' => 'Create Medical Record',
        'link' => ['create'],
    ])?></p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'first_name',
            'last_name',
            [
                'class' => EnumColumn::class,
                'attribute' => 'gender',
                'enum' => $genderList,
                'filter' => $genderList,
                'enableSorting' => false,
            ],
            [
                'class' => EnumColumn::class,
                'attribute' => 'nationality_id',
                'enum' => $nationalityList,
                'filter' => $nationalityList,
                'enableSorting' => false,
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>
