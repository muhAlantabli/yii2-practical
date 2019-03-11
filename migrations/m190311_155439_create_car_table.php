<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m190311_155439_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'type' => $this->string(100)->notNull(),
        ]);

        $records = [
            [
                'name' => 'Ford Focus',
                'type' => 'family',
            ],
            [
                'name' => 'Opel Astra',
                'type' => 'family',
            ],
            [
                'name' => 'Kia Ceed',
                'type' => 'family',
            ],
            [
                'name' => 'Porsche Boxster',
                'type' => 'sport',
            ],
            [
                'name' => 'Ferrari 550',
                'type' => 'sport',
            ],
        ];

        foreach ($records as $record) {
            $this->insert('{{%car}}', $record);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
