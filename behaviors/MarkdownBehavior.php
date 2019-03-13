<?php

namespace app\behaviors;

use yii\base\Behavior;
use yii\base\Event;
use yii\helpers\Markdown;

class MarkdownBehavior extends Behavior
{
    public $sourceAttribute;
    public $targetAttribute;

    /**
     * check if behavior attributes are set
     */
    public function init()
    {
        if (empty($this->sourceAttribute) && empty($this->targetAttribute)) {
            throw new \yii\base\InvalidConfigException('source and target attributes must be set.');
        }
        parent::init();
    }

    /**
     * call the responsable method after trigging event
     */
    public function events()
    {
        return [
            \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'onBeforeSave',
            \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'onBeforeSave',
        ];
    }

    /**
     * check if owner model source attribute has changed value
     * then, call private method processContent()
     * @param Event $event
     */
    public function onBeforeSave(Event $event)
    {
        if ($this->owner->isAttributeChanged($this->sourceAttribute)) {
            $this->processContent();
        }
    }

    /**
     * convert markdown content to html and store it
     * in target attribute
     */
    private function processContent()
    {
        $model = $this->owner;
        $source = $model->{$this->sourceAttribute};
        $model->{$this->targetAttribute} = Markdown::process($source);
    }
}
