<?php

use yii\db\Migration;

class m221216_102641_create_table_order_places extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%order_places}}',
            [
                'id' => $this->primaryKey(),
                'order_place_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('order_place_id', '{{%order_places}}', ['order_place_id']);

        $this->addForeignKey(
            'order_places_ibfk_1',
            '{{%order_places}}',
            ['order_place_id'],
            '{{%order_place}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%order_places}}');
    }
}
