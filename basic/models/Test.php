<?php

namespace app\models;

use yii\base\Model;

class Test extends Model
{

 public $email;
 public $name;
 public $passw;
 public $passw1;

 public function rules() {
    	return[
	 [['name', 'email', 'passw', 'passw1'], 'required'],
	 ['email', 'email'],
	 ];
    }
}
?>