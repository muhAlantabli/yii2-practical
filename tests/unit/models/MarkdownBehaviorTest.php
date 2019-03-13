<?php

namespace app\tests\unit\models;

use app\models\Ticket;
use app\tests\unit\fixtures\TicketFixture;
use Codeception\Test\Unit;

class MarkdownBehaviorTest extends Unit
{
    public function _fixtures()
    {
        return [
            'tickets' => [
                'class' => TicketFixture::className(),
            ],
        ];
    }

    /**
     * test markdown behavior for new models
     */
    public function testNewModelSave()
    {
        $model = new Ticket();
        $model->title = 'Title';
        $model->content_markdown = 'New *markdown* text';

        $this->assertTrue($model->save());
        $this->assertEquals("<p>New <em>markdown</em> text</p>\n", $model->content_html);
    }

    /**
     * test markdown behavior for stored model
     */
    public function testExitingModelSave()
    {
        $model = Ticket::findOne(1);
        $model->content_markdown = 'Other *markdown* text';

        $this->assertTrue($model->save());
        $this->assertEquals("<p>Other <em>markdown</em> text</p>\n", $model->content_html);
    }
}
