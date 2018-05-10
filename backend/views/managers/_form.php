<?php

use yii\web\View;
use yii\widgets\ActiveForm;
use backend\models\Manager;
use backend\widgets\ButtonSave;

/**
 * @var View $this
 * @var Manager $model
 * @var ActiveForm $form
 */
?>
<div class="mailer-domain-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['value' => '']) ?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?=ButtonSave::widget()?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
