<?php
namespace backend\widgets;

use yii\bootstrap\Button as BaseButton;
use yii\bootstrap\Html;
use yii\helpers\Url;

/**
 * Renders a bootstrap button with links support.
 *
 * For example,
 *
 * ```php
 * echo Button::widget([
 *     'label' => 'Action',
 *     'link' => 'some-link',
 *     'buttonClass' => 'btn-info',
 * ]);
 * ```
 * @see http://getbootstrap.com/javascript/#buttons
 */
class Button extends BaseButton
{
    /**
     * @var string | null
     */
    public $link;

    /**
     * @var string | null
     */
    public $buttonType = 'default';

    /**
     * @var string | null
     */
    public $iconClass;

    /**
     * @inheritdoc
     */
    public $encodeLabel = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->link) {
            $this->tagName = 'a';
            $this->options['href'] = Url::to($this->link);
        }
        if ($this->buttonType) {
            Html::addCssClass($this->options, 'btn-'.$this->buttonType);
        }
        if ($this->iconClass) {
            $this->label = Html::tag('span', '', [
                'class' => $this->iconClass,
            ]) . ' ' . $this->label;
        }
    }
}
