<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $mail
 * @property string $phone
 * @property string $login
 * @property string $password encrypted pass
 * @property string $password_hash encrypted pass
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mail' => 'Почта',
            'phone' => 'Телефон',
            'login' => 'Логин',
            'password' => 'Пароль',
            'city_id' => 'Город',
            'currency_id' => 'Валюта',
            'sex_id' => 'Пол',
            'photo_url' => 'Ссылка на фото',
            'date_of_birth' => 'День рождения',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'cart_id' => 'Корзина',
            'favourite_id' => 'Избранное',
            'orders_id' => 'Заказы',
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
     * @throws Exception
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

    /**
     * Creates an example of User with admin rights,
     * used with for Rbac initialize.
     *
     * @return User
     * @throws Exception
     */
    public static function initAdminUser()
    {
        $adminUser = new User();

//        $adminSex = new Sex();
//        $adminCurrency = new Currency();
//        $adminCity = new City();
//
//        $adminSex->title = "Trans";
//        $adminSex->save();
//
//        $adminCurrency->title = "USD";
//        $adminCurrency->save();
//
//        $adminCity->name = "St. Petersburg";
//        $adminCity->save();

        $adminUser->login = 'admin';
        $adminUser->first_name = 'admin';
        $adminUser->last_name = 'admin';
        $adminUser->phone = '123456';
//        $adminUser->sex_id = $adminSex->id;
//        $adminUser->city_id = $adminCity->id;
//        $adminUser->currency_id = $adminCurrency->id;
        $adminUser->sex_id = 1;
        $adminUser->city_id = 1;
        $adminUser->currency_id = 1;
        $adminUser->mail = 'admin@admin.com';
        $adminUser->date_of_birth = '2012-12-12';
        $adminUser->photo_url = 'shrek.jpeg';

        $adminUser->setPassword('admin');

        return $adminUser;
    }

    /**
     * Returns the full name of a User,
     * can be used as class property.
     *
     * @return string
     */
    public function getFullName(): string
    {
        return $this->first_name . " " . $this->last_name . ", " . $this->mail;
    }
}
