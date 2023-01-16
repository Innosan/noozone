<?php

use yii\db\Migration;

class m230116_065335_update_table_card extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'card_ibfk_1',
            '{{%card}}',
            ['user_id'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('card_ibfk_1', '{{%card}}');
    }
}
