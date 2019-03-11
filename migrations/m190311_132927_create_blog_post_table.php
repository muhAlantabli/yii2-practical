<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog_post}}`.
 */
class m190311_132927_create_blog_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog_post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'created_date' => $this->integer(),
            'modified_date' => $this->integer(),
        ], 'ENGINE=InnoDB DEFAULT charset=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%blog_post}}');
    }
}
