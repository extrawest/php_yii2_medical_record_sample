<?php

use yii\web\View;
use yii\widgets\ActiveForm;
use backend\models\Patient;
use backend\widgets\ButtonBack;
use backend\widgets\ButtonNext;
use backend\widgets\ButtonSave;

/**
 * @var View $this
 * @var Patient $model
 * @var array $genderList
 * @var array $nationalityList
 * @var array $nutritionList
 * @var array $nutritionalDiagnosisList
 * @var array $continentValueList
 */

$this->title = 'Update Medical Record';
$this->params['breadcrumbs'][] = ['label' => 'Medical Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$editSteps = [
    'summary' => 'Summary',
    'nutrition' => 'Nutrition',
    'diagnosis' => 'Nutritional Diagnosis',
    'continence' => 'Continence Details',
];
$activeStep = 'summary';
$this->registerJsFile("@web/js/patient-edit.js");
?>
<div class="mailer-domain-create">
    <div class="mailer-domain-form">
        <?php $form = ActiveForm::begin(); ?>
            <!-- Nav tabs -->
            <ul id="patient-update-tabs" class="nav nav-tabs" role="tablist">
                <?php foreach ($editSteps as $step => $stepTitle) : ?>
                    <li role="presentation"
                        <?php if ($step === $activeStep) : ?>
                            class="active"
                        <?php endif; ?>
                    >
                        <a href="#patient-<?=$step?>" aria-controls="patient-<?=$step?>" role="tab" data-toggle="tab">
                            <?=$stepTitle?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <?php foreach (array_keys($editSteps) as $step) : ?>
                <div role="tabpanel" class="tab-pane <?=$step===$activeStep?'active':''?>" id="patient-<?=$step?>">
                    <?= $this->render('update-steps/'.$step, [
                        'form' => $form,
                        'model' => $model,
                        'genderList' => $genderList,
                        'nationalityList' => $nationalityList,
                        'nutritionList' => $nutritionList,
                        'nutritionalDiagnosisList' => $nutritionalDiagnosisList,
                        'continentValueList' => $continentValueList,
                    ]) ?>
                </div>
                <?php endforeach; ?>
            </div>
        <div class="form-group">
            <?=ButtonBack::widget([
                'options' => [
                    'id' => 'go-back',
                    'style' => 'display:none;',
                ],
            ])?>
            <?=ButtonSave::widget()?>
            <?=ButtonNext::widget([
                'options' => [
                    'id' => 'go-forward',
                ],
            ])?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
