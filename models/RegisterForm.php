<?php
/**
 * Created by PhpStorm.
 * User: днс
 * Date: 22.02.2017
 * Time: 17:26
 */

namespace app\models;



use yii\base\Model;

class RegisterForm extends Model
{
    public $username, $password, $email;

    public function rules()
    {
        return [
            [['username', 'email', 'password'],'filter', 'filter' => 'trim'],
            [['username', 'email', 'password'],'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['username', 'unique',
                'targetClass' => User::className(),
                'message' => 'Это имя уже занято.'],
            ['email', 'email'],
           ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'Эта почта уже занята.'],
            /*['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],*/
            /*['status', 'in', 'range' =>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
            ]],*/
            /*['status', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'emailActivation'],*/
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'Эл. почта',
            'password' => 'Пароль'
        ];
    }
    public function register()
    {
        if ($this->validate()){
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        //$user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        /*if($this->scenario === 'emailActivation')
            $user->generateSecretKey();*/
        return $user->save() ? $user : null;
        }return null;
    }
}