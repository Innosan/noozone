<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $role_id
 * @property string $mail
 * @property string $phone
 * @property string $login
 * @property string $password sha256 encrypted pass
 * @property string $password_hash sha256 encrypted pass
 * @property int $city_id
 * @property int $currency_id
 * @property int $sex_id
 * @property string $photo_url
 * @property string $date_of_birth
 * @property string $first_name
 * @property string $last_name
 * @property int $cart_id
 * @property int $favourite_id
 * @property int $orders_id
 *
 * @property Card[] $cards
 * @property Cart $cart
 * @property City $city
 * @property Company[] $companies
 * @property Currency $currency
 * @property Favourite $favourite
 * @property ManagerList[] $managerLists
 * @property OrderPlace[] $orderPlaces
 * @property Orders $orders
 * @property Product[] $products
 * @property Review[] $reviews
 * @property Role $role
 * @property Sex $sex
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
//    public function rules()
//    {
//        return [
//            [['id', 'role_id', 'mail', 'phone', 'login', 'password', 'city_id', 'sex_id', 'photo_url', 'date_of_birth', 'first_name', 'last_name', 'cart_id', 'favourite_id', 'orders_id'], 'required'],
//            [['id', 'role_id', 'city_id', 'currency_id', 'sex_id', 'cart_id', 'favourite_id', 'orders_id'], 'integer'],
//            [['date_of_birth'], 'safe'],
//            [['mail', 'login', 'first_name', 'last_name'], 'string', 'max' => 50],
//            [['phone'], 'string', 'max' => 15],
//            [['password'], 'string', 'max' => 256],
//            [['photo_url'], 'string', 'max' => 2000],
//            [['id'], 'unique'],
//            [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sex::class, 'targetAttribute' => ['sex_id' => 'id']],
//            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
//            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
//            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
//            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['cart_id' => 'id']],
//            [['favourite_id'], 'exist', 'skipOnError' => true, 'targetClass' => Favourite::class, 'targetAttribute' => ['favourite_id' => 'id']],
//            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['orders_id' => 'id']],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'ID роли',
            'mail' => 'Почта',
            'phone' => 'Телефон',
            'login' => 'Логин',
            'password' => 'Пароль',
            'city_id' => 'ID города',
            'currency_id' => 'ID валюты',
            'sex_id' => 'ID пола',
            'photo_url' => 'Ссылка на фото',
            'date_of_birth' => 'День рождения',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'cart_id' => 'ID корзины',
            'favourite_id' => 'ID избранного',
            'orders_id' => 'ID заказов',
        ];
    }

    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Card::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'cart_id']);
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

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }

    /**
     * Gets query for [[Favourite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourite()
    {
        return $this->hasOne(Favourite::class, ['id' => 'favourite_id']);
    }

    /**
     * Gets query for [[ManagerLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManagerLists()
    {
        return $this->hasMany(ManagerList::class, ['manager_id' => 'id']);
    }

    /**
     * Gets query for [[OrderPlaces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderPlaces()
    {
        return $this->hasMany(OrderPlace::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::class, ['id' => 'orders_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    /**
     * Gets query for [[Sex]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Sex::class, ['id' => 'sex_id']);
    }

    public static function findIdentity($id): ?User
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): ?User
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($login): ?User
    {
        return static::findOne(['login' => $login]);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function validatePassword($password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws \yii\base\Exception
     */
    public function setPassword(string $password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
