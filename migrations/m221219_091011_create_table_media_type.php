<?php

use yii\db\Migration;

class m221219_091011_create_table_media_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%media_type}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(20)->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%media_type}}');
    }
}
