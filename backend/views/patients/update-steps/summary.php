<?php

use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/**
 * @var ActiveForm $form
 * @var array $genderList
 * @var array $nationalityList
 */

?>
<div class="form-group">
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]); ?>
    <?= $form->field($model, 'gender')->dropDownList([
        '' => '-- Not Selected --'
    ] + $genderList) ?>
    <?= $form->field($model, 'nationality_id')->dropDownList([
        '' => '-- Not Selected --'
    ] + $nationalityList) ?>
</div>
