<?php

use yii\db\Migration;

class m221219_090850_create_table_role extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%role}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(20)->notNull(),
                'permissions_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
