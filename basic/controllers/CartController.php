<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Article;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii;

class CartController extends Controller
{
	public function actionAdd()
	{
		$id = Yii::$app->request->get('id');
		$product = Article::findOne($id);
		if(empty($product))	return false;
		$session = Yii::$app->session;
		$session->open();
		$cart = new Cart();
		$cart->addToCart($product);
	}
}
