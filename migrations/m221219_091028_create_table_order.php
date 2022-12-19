<?php

use yii\db\Migration;

class m221219_091028_create_table_order extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%order}}',
            [
                'id' => $this->primaryKey(),
                'delivery_type_id' => $this->integer()->notNull(),
                'total_cost' => $this->float()->notNull(),
                'total_discount' => $this->integer()->notNull(),
                'card_id' => $this->integer()->notNull(),
                'created_at' => $this->date()->notNull(),
                'is_delivered' => $this->boolean()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('card_id', '{{%order}}', ['card_id']);
        $this->createIndex('delivery_type_id', '{{%order}}', ['delivery_type_id']);

        $this->addForeignKey(
            'order_ibfk_1',
            '{{%order}}',
            ['card_id'],
            '{{%card}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'order_ibfk_3',
            '{{%order}}',
            ['delivery_type_id'],
            '{{%delivery_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
