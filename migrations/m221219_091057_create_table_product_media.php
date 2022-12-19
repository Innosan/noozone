<?php

use yii\db\Migration;

class m221219_091057_create_table_product_media extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product_media}}',
            [
                'id' => $this->primaryKey(),
                'media_type_id' => $this->integer()->notNull(),
                'url' => $this->string(300)->notNull(),
                'product_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('media_type_id', '{{%product_media}}', ['media_type_id']);
        $this->createIndex('product_id', '{{%product_media}}', ['product_id']);

        $this->addForeignKey(
            'product_media_ibfk_1',
            '{{%product_media}}',
            ['media_type_id'],
            '{{%media_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'product_media_ibfk_2',
            '{{%product_media}}',
            ['product_id'],
            '{{%product}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%product_media}}');
    }
}
