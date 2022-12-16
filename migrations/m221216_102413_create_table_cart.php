<?php

use yii\db\Migration;

class m221216_102413_create_table_cart extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%cart}}',
            [
                'id' => $this->primaryKey(),
                'total_price' => $this->float()->notNull(),
                'products_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('products_id', '{{%cart}}', ['products_id']);

        $this->addForeignKey(
            'cart_ibfk_1',
            '{{%cart}}',
            ['products_id'],
            '{{%products}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%cart}}');
    }
}
