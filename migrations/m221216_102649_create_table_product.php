<?php

use yii\db\Migration;

class m221216_102649_create_table_product extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(100)->notNull(),
                'media_list_id' => $this->integer()->notNull(),
                'is_discounted' => $this->boolean()->notNull(),
                'description' => $this->text()->notNull(),
                'specifications' => $this->text()->notNull(),
                'way_to_use' => $this->text()->notNull(),
                'company_id' => $this->integer()->notNull(),
                'rating' => $this->float()->notNull(),
                'created_at' => $this->date()->notNull(),
                'updated_at' => $this->date()->notNull(),
                'created_by' => $this->integer()->notNull(),
                'price' => $this->float()->notNull(),
                'category_id' => $this->integer()->notNull(),
                'reviews_id' => $this->integer()->notNull(),
                'discount' => $this->integer()->notNull(),
                'new_price' => $this->float()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('category_id', '{{%product}}', ['category_id']);
        $this->createIndex('company_id', '{{%product}}', ['company_id']);
        $this->createIndex('created_by', '{{%product}}', ['created_by']);
        $this->createIndex('media_list_id', '{{%product}}', ['media_list_id']);
        $this->createIndex('reviews_id', '{{%product}}', ['reviews_id']);

        $this->addForeignKey(
            'product_ibfk_1',
            '{{%product}}',
            ['media_list_id'],
            '{{%media_list}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'product_ibfk_2',
            '{{%product}}',
            ['company_id'],
            '{{%company}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'product_ibfk_3',
            '{{%product}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'product_ibfk_4',
            '{{%product}}',
            ['category_id'],
            '{{%category}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'product_ibfk_5',
            '{{%product}}',
            ['reviews_id'],
            '{{%reviews}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}