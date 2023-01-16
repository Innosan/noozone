<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_place".
 *
 * @property int $id
 * @property int $city_id
 * @property string $street
 * @property int $house
 * @property int $flat
 * @property string $description
 * //deleted userid
 *
 * @property City $city
// * @property User $user
 */
class OrderPlace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_place';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'street', 'house', 'flat', 'description'], 'required'], //deleted user_id
            [['id', 'city_id', 'house', 'flat'], 'integer'], //deleted user_id
            [['description'], 'string'],
            [['street'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'flat' => 'Квартира',
            'description' => 'Описание',
//            'user_id' => 'ID пользователя',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

//    /**
//     * Gets query for [[User]].
//     *
//     * @return \yii\db\ActiveQuery
//     */
//    public function getUser()
//    {
//        return $this->hasOne(User::class, ['id' => 'user_id']);
//    }
}
