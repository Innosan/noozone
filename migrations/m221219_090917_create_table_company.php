<?php

use yii\db\Migration;

class m221219_090917_create_table_company extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%company}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->integer()->notNull(),
                'tax_number' => $this->integer()->notNull(),
                'photo_url' => $this->integer()->notNull(),
                'created_at' => $this->date()->notNull(),
                'updated_at' => $this->date()->notNull(),
                'created_by' => $this->integer()->notNull(),
                'manager_list_id' => $this->integer()->notNull(),
                'products_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%company}}', ['created_by']);
        $this->createIndex('manager_list_id', '{{%company}}', ['manager_list_id']);
        $this->createIndex('products_id', '{{%company}}', ['products_id']);

        $this->addForeignKey(
            'company_ibfk_1',
            '{{%company}}',
            ['manager_list_id'],
            '{{%manager_list}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'company_ibfk_2',
            '{{%company}}',
            ['products_id'],
            '{{%products}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'company_ibfk_3',
            '{{%company}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }
}
