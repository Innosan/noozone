<?php

use yii\db\Migration;

class m221216_102350_create_table_card_list extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%card_list}}',
            [
                'id' => $this->primaryKey(),
                'card_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('card_id', '{{%card_list}}', ['card_id']);

        $this->addForeignKey(
            'card_list_ibfk_1',
            '{{%card_list}}',
            ['card_id'],
            '{{%card}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%card_list}}');
    }
}
