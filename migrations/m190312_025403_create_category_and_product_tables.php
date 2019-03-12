<?php

use yii\db\Migration;

/**
 * Class m190312_025403_create_category_and_product_tables
 */
class m190312_025403_create_category_and_product_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11),
            'title' => $this->string(255)->notNull(),
        ], 'ENGINE=InnoDB');

        $this->addForeignKey(
            'fk-category-parent_id',
            'category',
            'parent_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11),
            'title' => $this->string(255)->notNull(),
        ], 'ENGINE=InnoDB');

        $this->addForeignKey(
            'fk-category-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->batchInsert('category', ['id', 'parent_id', 'title'], [
            [
                'id' => 1,
                'parent_id' => null,
                'title' => 'TV, Audio/Video'
            ],
            [
                'id' => 2,
                'parent_id' => null,
                'title' => 'Photo'
            ],
            [
                'id' => 3,
                'parent_id' => null,
                'title' => 'Video'
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'title' => 'TV'
            ],
            [
                'id' => 5,
                'parent_id' => 1,
                'title' => 'Acoustic System'
            ],
            [
                'id' => 6,
                'parent_id' => 2,
                'title' => 'Cameras'
            ],
            [
                'id' => 7,
                'parent_id' => 2,
                'title' => 'Flashes and Lenses'
            ],
            [
                'id' => 8,
                'parent_id' => 3,
                'title' => 'Video Cams'
            ],
            [
                'id' => 9,
                'parent_id' => 3,
                'title' => 'TV'
            ],
            [
                'id' => 10,
                'parent_id' => 3,
                'title' => 'Action Cams'
            ],
            [
                'id' => 11,
                'parent_id' => 3,
                'title' => 'Accessories'
            ],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190312_025403_create_category_and_product_tables cannot be reverted.\n";

        return false;
    }
    */
}
