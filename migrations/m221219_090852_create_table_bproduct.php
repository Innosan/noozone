<?php

use yii\db\Migration;

class m221219_090852_create_table_bproduct extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(100)->notNull(),
                'is_discounted' => $this->boolean()->notNull(),
                'description' => $this->text()->notNull(),
                'specifications' => $this->text()->notNull(),
                'way_to_use' => $this->text()->notNull(),
                'company_id' => $this->integer()->notNull(),
                'rating' => $this->float()->notNull(),
                'created_at' => $this->date()->notNull(),
                'updated_at' => $this->date()->notNull(),
                'created_by' => $this->integer()->notNull(),
                'price' => $this->float()->notNull(),
                'category_id' => $this->integer()->notNull(),
                'discount' => $this->integer()->notNull(),
                'new_price' => $this->float()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('category_id', '{{%product}}', ['category_id']);

        $this->addForeignKey(
            'product_ibfk_4',
            '{{%product}}',
            ['category_id'],
            '{{%category}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
