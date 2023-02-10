<?php

namespace app\models;
use Yii;
use yii\base\Exception;
use yii\base\Model;

class SignUpForm extends Model {
    public $login;
    public $first_name;
    public $last_name;
    public $phone;
    public $mail;
    public $sex_id;
    public $city_id;
    public $currency_id;
    public $date_of_birth;
    public $photo_url;
    public $password;

    public function rules()
    {
        return [
            [['login', 'first_name', 'last_name', 'phone', 'date_of_birth', 'photo_url', 'mail', 'password'], 'required'],
            ['login', 'trim'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['login', 'string', 'min' => 2, 'max' => 50],
            ['first_name', 'string', 'min' => 2, 'max' => 50],
            ['last_name', 'string', 'min' => 2, 'max' => 50],
            ['phone', 'string', 'min' => 2, 'max' => 15],
            ['sex_id', 'integer'],
            ['city_id', 'integer'],
            ['currency_id', 'integer'],
            ['date_of_birth', 'string'],
            ['photo_url', 'string'],
            ['mail', 'email'],
            ['mail', 'string', 'max' => 50],
            ['mail', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6],
        ];
    }

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
            'cart_id' => 'ID корзины',
            'favourite_id' => 'ID избранного',
            'orders_id' => 'ID заказов',
        ];
    }

    /**
     * @throws Exception
     */
    public function signUp(): ?User
    {
        $user = new User();

        $user->login = $this->login;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->sex_id = $this->sex_id;
        $user->city_id = $this->city_id;
        $user->currency_id = $this->currency_id;
        $user->mail = $this->mail;
        $user->date_of_birth = $this->date_of_birth;
        $user->photo_url = $this->photo_url;
        $user->setPassword($this->password);

        $user->save();

        $auth = Yii::$app->authManager;

        $buyerRole = $auth->getRole('buyer');

        $auth->assign($buyerRole, $user->getId());

        return $user->save() ? $user : null;
    }
}