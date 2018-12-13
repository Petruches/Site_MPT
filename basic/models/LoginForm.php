<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $passuser;
    public $pass;
    public $rememberMe = true;

    private $_user = false;

    //private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'pass'], 'required'],
            /*['rememberMe', 'boolean'],*/
            ['pass', 'validatePassword'],
        ];
    }

         public function attributeLabels()
     {
        return [
        'username' => 'Логин',
        'pass' => 'Пароль',
        /*'rememberMe' => 'Запомнить меня',*/
     ];
     }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->pass)) {
                $this->addError($attribute, 'Неверный пароль или логин!');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser()/*, $this->rememberMe ? 3600*24*30 : 0*/ );
        }
        return false;
    }

    public function getUser()
    {
        if($this->_user === false)
        {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
