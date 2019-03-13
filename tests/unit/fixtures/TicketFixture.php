<?php

namespace app\tests\unit\fixtures;

use yii\test\ActiveFixture;

class TicketFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Ticket';
    public $dataFile = '@app/tests/unit/fixtures/data/ticket.php';
}
