<?php

use yii\db\Migration;

class m230116_065648_update_table_product extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'product_ibfk_5',
            '{{%product}}',
            ['company_id'],
            '{{%company}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'product_ibfk_6',
            '{{%product}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('product_ibfk_5', '{{%product}}');
        $this->dropForeignKey('product_ibfk_6', '{{%product}}');
    }
}
