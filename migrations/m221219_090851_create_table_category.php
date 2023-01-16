<?php

use yii\db\Migration;

class m221219_090851_create_table_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%category}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->text()->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
