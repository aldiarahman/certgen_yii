<?php


namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;

class RegisterForm extends Model
{
    public $nama;
    public $email;
    public $username;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username','password','password_repeat','nama','email'],'required'],
            ['email', 'email'],
            [['username','password','password_repeat'],'string','min' => 6,'max' => 12],
            ['password_repeat','compare','compareAttribute' => 'password'],
        ];
    }

    public function register()
    {
        $user = new User();
        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->username = $this->username;
        $user->auth_key = \Yii::$app->security->generateRandomString();
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);

        if ($user->save())
        {
            return true;
        }

        \Yii::error("Gagal Registrasi : ".VarDumper::dumpAsString($user->errors));
        return false;
    }
}