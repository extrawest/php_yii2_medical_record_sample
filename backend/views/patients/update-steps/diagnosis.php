<?php

use yii\widgets\ActiveForm;
use backend\widgets\CheckboxGroup;

/**
 * @var ActiveForm $form
 * @var array $nutritionalDiagnosisList
 */

?>
<div class="form-group">
    <?= $form->field($model, 'nutritionalDiagnosis')->widget(CheckboxGroup::class, [
        'items' => $nutritionalDiagnosisList,
    ]); ?>
</div>
