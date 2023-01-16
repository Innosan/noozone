<?php

use yii\db\Migration;

class m221219_090851_create_table_sex extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sex}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(10)->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%sex}}');
    }
}
