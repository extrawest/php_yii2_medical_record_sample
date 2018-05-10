<?php

use yii\widgets\ActiveForm;
use backend\widgets\CheckboxGroup;

/**
 * @var ActiveForm $form
 * @var array $nutritionList
 */

?>
<div class="form-group">
    <?= $form->field($model, 'nutrition')->widget(CheckboxGroup::class, [
        'items' => $nutritionList,
    ]); ?>
</div>
