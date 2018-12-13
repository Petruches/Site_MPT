<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegForm extends Model
{
     public $name;
     public $fam;
     public $otch;
     public $username;
     public $pass;
     public $tel;
     public $mail;
     

     public function rules()
     {
     	return [
     		[['name', 'fam', 'otch', 'username', 'pass', 'tel', 'mail'], 'required'],
            [['mail'], 'email'],
            [['mail'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email'],
     	];
     }

     public function attributeLabels()
     {
     	return [
     	'name' => 'Имя',
     	'fam' => 'Фамилия',
        'otch' => 'Отчество',
        'username' => 'Логин',
        'pass' => 'Пароль',
        'tel' => 'Телефон',
        'mail' => 'mail',
     ];
     }

    /*public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

                        //if ($model->password = '') {
                //$this->addError($attribute, 'Поля пустые!, заполните все поля');
            }
    }*/

    public function insertUser()
    {
    	$user = new User();
    	$user->name = $this->name;
        $user->fam = $this->fam;
        $user->otch = $this->otch;
    	$user->username = $this->username;
        $user->pass = $this->pass;
        $user->tel = $this->tel;
        $user->mail = $this->mail;
    	$user->save();
    }

    public function Reg()
    {
        /*if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }*/
        $user = new User();
        $user->name = $this->name;
        $user->fam = $this->fam;
        $user->otch = $this->otch;
        $user->username = $this->username;
        $user->pass = $this->pass;
        $user->tel = $this->tel;
        $user->mail = $this->mail;
        $user->save();
    }
}

?>