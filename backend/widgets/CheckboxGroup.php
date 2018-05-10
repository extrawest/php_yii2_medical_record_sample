<?php
namespace backend\widgets;

use yii\bootstrap\Html;
use yii\widgets\InputWidget;
use yii\bootstrap\ButtonGroup;

class CheckboxGroup extends InputWidget
{
    protected static $uniqueCounter = 0;

    /**
     * @var array
     */
    public $items;

    /**
     * @return string
     * @throws \Exception
     */
    public function run()
    {
        $selectedValues = $this->getSelectedValues();
        return ButtonGroup::widget([
            'options' => [
                'data-toggle' => 'buttons'
            ],
            'buttons' => array_map(function ($itemId, $itemTitle) use ($selectedValues) {
                $inputName = Html::getInputName($this->model, $this->attribute).'[]';
                return Html::tag(
                    'fieldset',
                    Html::checkbox($inputName, in_array($itemId, $selectedValues), [
                        'name' => Html::getInputName($this->model, $this->attribute),
                        'label' => $itemTitle,
                        'value' => $itemId,
                    ])
                );
            }, array_keys($this->items), $this->items),
        ]);
    }

    protected function getSelectedValues()
    {
        if (!is_array($this->model->{$this->attribute})) {
            return [];
        }
        return array_map(function ($item) {
            /** @var \yii\db\ActiveRecord $item */
            return $item->getPrimaryKey();
        }, $this->model->{$this->attribute});
    }
}
