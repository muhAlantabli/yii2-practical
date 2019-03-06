<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m190306_141550_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->defaultValue(null),
            'description' => $this->text()
        ], 'ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT charset=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
