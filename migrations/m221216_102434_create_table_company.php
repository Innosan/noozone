<?php

use yii\db\Migration;

class m221216_102434_create_table_company extends Migration
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
                'tin' => $this->integer()->notNull(),
                'photo_url' => $this->integer()->notNull(),
                'created_at' => $this->date()->notNull(),
                'updated_at' => $this->date()->notNull(),
                'created_by' => $this->integer()->notNull(),
                'manager_list_id' => $this->integer()->notNull(),
                'products_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }
}
