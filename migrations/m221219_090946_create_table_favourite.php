<?php

use yii\db\Migration;

class m221219_090946_create_table_favourite extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%favourite}}',
            [
                'id' => $this->primaryKey(),
                'product_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('product_id', '{{%favourite}}', ['product_id']);

        $this->addForeignKey(
            'favourite_ibfk_1',
            '{{%favourite}}',
            ['product_id'],
            '{{%product}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%favourite}}');
    }
}
