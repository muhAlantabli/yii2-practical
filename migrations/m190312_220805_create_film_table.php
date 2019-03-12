<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 */
class m190312_220805_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'release_year' => $this->integer(4)->notNull()
        ], 'ENGINE=InnoDB');


        $this->batchInsert('film', ['id' ,'title', 'release_year'], [
            [1, 'Interstellar', 2014],
            [2, "Harry Potter and the Goblet of Fire", 2008],
            [3, 'Back to the Future', 1985],
            [4, 'Blade Runner', 1982],
            [5, 'Dallas Buyers Club', 2013],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%film}}');
    }
}
