<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Cart extends ActiveRecord
{
	public function addToCart($product, $qty = 1)
	{
		echo 'Работает!';
	}
}