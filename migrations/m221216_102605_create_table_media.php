<?php

use yii\db\Migration;

class m221216_102605_create_table_media extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%media}}',
            [
                'id' => $this->primaryKey(),
                'media_type_id' => $this->integer()->notNull(),
                'url' => $this->string(300)->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('media_type_id', '{{%media}}', ['media_type_id']);

        $this->addForeignKey(
            'media_ibfk_1',
            '{{%media}}',
            ['media_type_id'],
            '{{%media_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%media}}');
    }
}
