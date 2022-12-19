<?php

use yii\db\Migration;

class m221219_091108_create_table_review_media extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%review_media}}',
            [
                'id' => $this->primaryKey(),
                'media_type_id' => $this->integer()->notNull(),
                'url' => $this->string(300)->notNull(),
                'review_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('media_type_id', '{{%review_media}}', ['media_type_id']);
        $this->createIndex('review_id', '{{%review_media}}', ['review_id']);

        $this->addForeignKey(
            'review_media_ibfk_1',
            '{{%review_media}}',
            ['media_type_id'],
            '{{%media_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'review_media_ibfk_2',
            '{{%review_media}}',
            ['review_id'],
            '{{%review}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%review_media}}');
    }
}
