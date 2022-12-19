<?php

use yii\db\Migration;

class m221219_090955_create_table_manager_list extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%manager_list}}',
            [
                'id' => $this->primaryKey(),
                'manager_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('manager_id', '{{%manager_list}}', ['manager_id']);

        $this->addForeignKey(
            'manager_list_ibfk_1',
            '{{%manager_list}}',
            ['manager_id'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%manager_list}}');
    }
}
