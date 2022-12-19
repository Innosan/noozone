<?php

use yii\db\Migration;

class m221219_091032_create_table_orders extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%orders}}',
            [
                'id' => $this->primaryKey(),
                'order_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('order_id', '{{%orders}}', ['order_id']);

        $this->addForeignKey(
            'orders_ibfk_1',
            '{{%orders}}',
            ['order_id'],
            '{{%order}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
