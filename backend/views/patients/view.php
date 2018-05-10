<?php

use yii\web\View;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonList;
use backend\widgets\ButtonEdit;
use backend\widgets\ButtonDelete;
use backend\models\Patient;
use common\models\Nutrition;
use common\models\NutritionalDiagnosis;

/**
 * @var View $this
 * @var Patient $model
 * @var ActiveDataProvider $membershipDataProvider
 * @var ActiveDataProvider $logsDataProvider
 * @var array $genderList
 * @var array $itemTypes
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medical Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="document-view">
    <p>
        <?=ButtonList::widget([
            'label' => 'To list',
            'link' => ['index'],
        ])?>
        <?=ButtonEdit::widget([
            'link' => ['update', 'id' => $model->id],
        ])?>
        <?=ButtonDelete::widget([
            'link' => ['delete', 'id' => $model->id],
        ])?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'last_name',
            [
                'attribute' => 'gender',
                'value' => $genderList[$model->gender] ?? '',
            ],
            [
                'attribute' => 'nationality_id',
                'value' => $model->nationality->name,
            ],
            [
                'attribute' => 'nutrition',
                'value' => join('<br/>', array_map(function (Nutrition $nutrition) {
                    return $nutrition->name;
                }, $model->nutrition)),
                'format' => 'raw',
            ],
            [
                'attribute' => 'nutritionalDiagnosis',
                'value' => join('<br/>', array_map(function (NutritionalDiagnosis $diagnosis) {
                    return $diagnosis->name;
                }, $model->nutritionalDiagnosis)),
                'format' => 'raw',
            ],
        ],
    ]) ?>
</div>
