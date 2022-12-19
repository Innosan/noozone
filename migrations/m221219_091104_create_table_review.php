<?php

use yii\db\Migration;

class m221219_091104_create_table_review extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%review}}',
            [
                'id' => $this->primaryKey(),
                'pros' => $this->text()->notNull(),
                'cons' => $this->text()->notNull(),
                'description' => $this->text()->notNull(),
                'is_approved' => $this->boolean()->notNull(),
                'likes' => $this->integer()->notNull(),
                'dislikes' => $this->integer()->notNull(),
                'created_at' => $this->date()->notNull(),
                'updated_at' => $this->date()->notNull(),
                'created_by' => $this->integer()->notNull(),
                'product_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%review}}', ['created_by']);
        $this->createIndex('product_id', '{{%review}}', ['product_id']);

        $this->addForeignKey(
            'review_ibfk_1',
            '{{%review}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'review_ibfk_2',
            '{{%review}}',
            ['product_id'],
            '{{%product}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%review}}');
    }
}
