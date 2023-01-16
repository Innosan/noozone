<?php

use yii\db\Migration;

class m221219_090852_create_table_bproducts extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%products}}',
            [
                'id' => $this->primaryKey(),
                'product_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('product_id', '{{%products}}', ['product_id']);

        $this->addForeignKey(
            'products_ibfk_1',
            '{{%products}}',
            ['product_id'],
            '{{%product}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
