<?php

namespace app\models;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string $number
 * @property string $expiry_date
 * @property string $owner_name
 * @property int $is_default
 * @property int $user_id
 *
 * @property Order[] $orders
 * @property User $user
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'expiry_date', 'owner_name', 'is_default', 'user_id'], 'required'],
            [['id', 'is_default', 'user_id'], 'integer'],
            [['expiry_date'], 'safe'],
            [['owner_name'], 'string', 'max' => 40],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер карты',
            'expiry_date' => 'Дата окончания',
            'owner_name' => 'Имя владельца',
            'is_default' => 'Использовать по умолчанию',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['card_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
