<?php
namespace backend\widgets;

class ButtonDelete extends Button
{
    public $label = 'Delete';

    public $buttonType = 'danger';

    public $iconClass = 'glyphicon glyphicon-trash';

    public $options = [
        'data-method' => 'post',
        'data-confirm' => 'Are you sure you want to delete this item?',
    ];
}
