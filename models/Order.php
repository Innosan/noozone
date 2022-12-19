<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $delivery_type_id
 * @property float $total_cost
 * @property int $total_discount
 * @property int $card_id
 * @property string $created_at
 * @property int $is_delivered
 *
 * @property Card $card
 * @property DeliveryType $deliveryType
 * @property Orders[] $orders
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'delivery_type_id', 'total_cost', 'total_discount', 'card_id', 'created_at', 'is_delivered'], 'required'],
            [['id', 'delivery_type_id', 'total_discount', 'card_id', 'is_delivered'], 'integer'],
            [['total_cost'], 'number'],
            [['created_at'], 'safe'],
            [['id'], 'unique'],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Card::class, 'targetAttribute' => ['card_id' => 'id']],
            [['delivery_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryType::class, 'targetAttribute' => ['delivery_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_type_id' => 'ID способа доставки',
            'total_cost' => 'Полная стоимость',
            'total_discount' => 'Скидка',
            'card_id' => 'ID карты',
            'created_at' => 'Создано',
            'is_delivered' => 'Доставлено',
        ];
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Card::class, ['id' => 'card_id']);
    }

    /**
     * Gets query for [[DeliveryType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryType()
    {
        return $this->hasOne(DeliveryType::class, ['id' => 'delivery_type_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['order_id' => 'id']);
    }
}
