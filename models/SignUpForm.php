<?php

namespace app\models;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\VarDumper;

class SignUpForm extends Model {
    public $login;
    public $first_name;
    public $last_name;
    public $phone;
    public $mail;
    public $sex_id;
    public $city_id;
    public $date_of_birth;
    public $photo_url;
    public $password;

    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['login', 'string', 'min' => 2, 'max' => 50],
            ['first_name', 'string', 'min' => 2, 'max' => 50],
            ['last_name', 'string', 'min' => 2, 'max' => 50],
            ['phone', 'string', 'min' => 2, 'max' => 15],
            ['sex_id', 'integer'],
            ['city_id', 'integer'],
            ['date_of_birth', 'string'],
            ['photo_url', 'string'],
            ['mail', 'required'],
            ['mail', 'email'],
            ['mail', 'string', 'max' => 50],
            ['mail', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
        $user->mail = $this->mail;
        $user->date_of_birth = $this->date_of_birth;
        $user->photo_url = $this->photo_url;
        $user->password_hash = $this->password;
        $user->setPassword($this->password);

        var_dump($user);

        return $user->save() ? $user : null;
    }
}