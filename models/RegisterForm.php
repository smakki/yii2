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
            // username and password are both required
            [['username', 'password','email'], 'required'],
            // rememberMe must be a boolean value
            //['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['email', 'email'],
        ];
    }
}