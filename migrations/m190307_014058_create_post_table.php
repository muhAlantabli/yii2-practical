<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m190307_014058_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
        ], 'ENGINE=InnoDB DEFAULT charset=utf8');


        for ($i = 0; $i < 7; $i++) {
            $this->insert('{{%post}}', [
                'title' => 'Test Article #' . $i,
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet mauris est. Sed at dignissim dui.',
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
