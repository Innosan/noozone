<?php

use yii\db\Migration;

class m221216_102638_create_table_order_place extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%order_place}}',
            [
                'id' => $this->primaryKey(),
                'city_id' => $this->integer()->notNull(),
                'street' => $this->string(100)->notNull(),
                'house' => $this->integer()->notNull(),
                'flat' => $this->integer()->notNull(),
                'description' => $this->text()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('city_id', '{{%order_place}}', ['city_id']);

        $this->addForeignKey(
            'order_place_ibfk_1',
            '{{%order_place}}',
            ['city_id'],
            '{{%city}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%order_place}}');
    }
}
