<?php

use yii\widgets\ActiveForm;
use backend\models\Patient;

/**
 * @var ActiveForm $form
 * @var array $continentValueList
 */

$continentValueList = array_merge(
    [Patient::CONTINENT_VALUE_NOT_SELECTED => '-- Not Selected --'],
    $continentValueList
);
?>
<div class="form-group">
    <?= $form->field($model, 'urine_continent_daytime')->dropDownList($continentValueList) ?>
    <?= $form->field($model, 'faeces_continent_daytime')->dropDownList($continentValueList) ?>
    <?= $form->field($model, 'urine_continent_nightime')->dropDownList($continentValueList) ?>
    <?= $form->field($model, 'faeces_continent_nightime')->dropDownList($continentValueList) ?>
</div>
