<?php

namespace app\components;

use yii\base\Model;
use yii\base\Widget;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class RangeInputWidget extends Widget
{
    public $model;
    public $from;
    public $to;
    public $htmlOptions = [];

    /**
     * @return bool
     */
    protected function hasModel()
    {
        return $this->model instanceof Model && isset($this->from, $this->to);
    }

    public function run()
    {
        if (!$this->hasModel()) {
            throw new Exception('Model must be set.');
        }

        return Html::activeTextInput($this->model, $this->from, ArrayHelper::merge($this->htmlOptions, ['placeholder' => 'from'])) . ' &rarr; ' .
            Html::activeTextInput($this->model, $this->to, ArrayHelper::merge($this->htmlOptions, ['placeholder' => 'to']));
    }
}
