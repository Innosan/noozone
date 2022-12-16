<?php

use yii\db\Migration;

class m221216_102611_create_table_media_list extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%media_list}}',
            [
                'id' => $this->primaryKey(),
                'media_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('media_id', '{{%media_list}}', ['media_id']);

        $this->addForeignKey(
            'media_list_ibfk_1',
            '{{%media_list}}',
            ['media_id'],
            '{{%media}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%media_list}}');
    }
}
