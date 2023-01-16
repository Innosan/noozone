<?php

use yii\db\Migration;

class m221219_090852_create_table_delivery_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%delivery_type}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(20)->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%delivery_type}}');
    }
}
