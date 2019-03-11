<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account}}`.
 */
class m190311_142227_create_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%account}}', [
            'id' => $this->primaryKey(),
            'balance' => $this->double(10, 2)->defaultValue(null),
        ], 'ENGINE=InnoDB charset=utf8');

        $data = [
            [
                'id' => 1,
                'balance' => 1110
            ],
            [
                'id' => 2,
                'balance' => 779
            ],
            [
                'id' => 3,
                'balance' => 568
            ]
        ];

        foreach ($data as $record)
            $this->insert('{{%account}}', $record);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%account}}');
    }
}
