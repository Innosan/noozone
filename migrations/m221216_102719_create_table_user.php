<?php

use yii\db\Migration;

class m221216_102719_create_table_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user}}',
            [
                'id' => $this->primaryKey(),
                'role_id' => $this->integer()->notNull(),
                'mail' => $this->string(50)->notNull(),
                'phone' => $this->string(15)->notNull(),
                'login' => $this->string(50)->notNull(),
                'password' => $this->string(256)->notNull()->comment('sha256 encrypted pass'),
                'city_id' => $this->integer()->notNull(),
                'currency_id' => $this->integer()->notNull()->defaultValue('1'),
                'sex_id' => $this->integer()->notNull(),
                'photo_url' => $this->string(2000)->notNull(),
                'date_of_birth' => $this->date()->notNull(),
                'card_list_id' => $this->integer()->notNull(),
                'first_name' => $this->string(50)->notNull(),
                'last_name' => $this->string(50)->notNull(),
                'cart_id' => $this->integer()->notNull(),
                'favourite_id' => $this->integer()->notNull(),
                'order_places_id' => $this->integer()->notNull(),
                'orders_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('card_list_id', '{{%user}}', ['card_list_id']);
        $this->createIndex('cart_id', '{{%user}}', ['cart_id']);
        $this->createIndex('city_id', '{{%user}}', ['city_id']);
        $this->createIndex('currency_id', '{{%user}}', ['currency_id']);
        $this->createIndex('favourite_id', '{{%user}}', ['favourite_id']);
        $this->createIndex('order_places_id', '{{%user}}', ['order_places_id']);
        $this->createIndex('orders_id', '{{%user}}', ['orders_id']);
        $this->createIndex('role_id', '{{%user}}', ['role_id']);
        $this->createIndex('sex_id', '{{%user}}', ['sex_id']);

        $this->addForeignKey(
            'user_ibfk_1',
            '{{%user}}',
            ['sex_id'],
            '{{%sex}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_2',
            '{{%user}}',
            ['role_id'],
            '{{%role}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_3',
            '{{%user}}',
            ['currency_id'],
            '{{%currency}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_4',
            '{{%user}}',
            ['city_id'],
            '{{%city}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_5',
            '{{%user}}',
            ['card_list_id'],
            '{{%card_list}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_6',
            '{{%user}}',
            ['cart_id'],
            '{{%cart}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_7',
            '{{%user}}',
            ['favourite_id'],
            '{{%favourite}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_8',
            '{{%user}}',
            ['order_places_id'],
            '{{%order_places}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'user_ibfk_9',
            '{{%user}}',
            ['orders_id'],
            '{{%orders}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
