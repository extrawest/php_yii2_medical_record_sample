<?php

use yii\web\View;
use yii\widgets\ActiveForm;
use backend\models\Patient;
use backend\widgets\ButtonSave;
use kartik\date\DatePicker;

/**
 * @var View $this
 * @var Patient $model
 * @var array $genderList
 * @var array $nationalityList
 */

$this->title = 'Create Medical Record';
$this->params['breadcrumbs'][] = ['label' => 'Medical Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="mailer-domain-create">
    <div class="mailer-domain-form">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'date_of_birth')->widget(DatePicker::class, [
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ]); ?>
        <?= $form->field($model, 'gender')->dropDownList(['' => '-- Not Selected --'] + $genderList) ?>
        <?= $form->field($model, 'nationality_id')->dropDownList(['' => '-- Not Selected --'] + $nationalityList) ?>
        <div class="form-group">
            <?=ButtonSave::widget()?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
