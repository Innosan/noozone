<?php

use yii\db\Migration;

class m221216_102703_create_table_reviews extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%reviews}}',
            [
                'id' => $this->primaryKey(),
                'review_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('review_id', '{{%reviews}}', ['review_id']);

        $this->addForeignKey(
            'reviews_ibfk_1',
            '{{%reviews}}',
            ['review_id'],
            '{{%review}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%reviews}}');
    }
}
