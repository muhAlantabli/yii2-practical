<?php

namespace app\models;

use Yii;
use app\behaviors\MarkdownBehavior;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property string $title
 * @property string $content_markdown
 * @property string $content_html
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content_markdown', 'content_html'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content_markdown' => 'Content Markdown',
            'content_html' => 'Content Html',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'markdown' => [
                'class' => MarkdownBehavior::className(),
                'sourceAttribute' => 'content_markdown',
                'targetAttribute' => 'content_html',
            ]
        ];
    }
}
