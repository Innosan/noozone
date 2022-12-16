<?php

use yii\db\Migration;

class m221216_102700_create_table_review extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%review}}',
            [
                'id' => $this->primaryKey(),
                'pros' => $this->text()->notNull(),
                'cons' => $this->text()->notNull(),
                'description' => $this->text()->notNull(),
                'media_list_id' => $this->integer()->notNull(),
                'is_approved' => $this->boolean()->notNull(),
                'likes' => $this->integer()->notNull(),
                'dislikes' => $this->integer()->notNull(),
                'created_at' => $this->date()->notNull(),
                'updated_at' => $this->date()->notNull(),
                'created_by' => $this->integer()->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%review}}');
    }
}
