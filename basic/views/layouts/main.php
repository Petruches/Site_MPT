<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\assets\PublicAsset;
use yii\bootstrap\Modal;

//AppAsset::register($this);
PublicAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/site/index"><img src="/images/GunTake.jpg" style="width: 120px" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="/site/index">Домой</a>
                        
                    </li>
                </ul>
                <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">

                        <!-- <li><a href="/site/login">Пользователь</a></li> -->

                        <? if (Yii::$app->user->isGuest){
                        echo "
                        <li><a href='/site/login' >Вход</a></li>
                        <li><a href='/site/reg' >Регистрация</a></li>";
                        }
                        else
                        {
                        ?>
                       <!-- <div class='btn-group' role='group'> -->
                        <li><a href="site/login" >Профиль (<? echo Yii::$app->user->identity->username;?>)</a></li>
                        <li><a href="/site/logout" data-method="post" class="white text-center">Выход</a></li>
                      <!--  </div> -->
                        <?
                        }
                        ?>
                        <li><a href="#">Корзина</a></li>
                      <!--  <li><a href="/site/reg">Регистрация</a></li>
                        <li><a href="#">Корзина</a></li>
                        <li><a href="/site/login" data-method="post">Выход</a></li> -->
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<?= $content ?>


<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-img"><img src="/images/GunTake2.png" style="width: 300px" alt=""></div>
                    <div class="about-content">Текст про сайт
                    </div>
                    <div class="address">
                        <h4 class="text-uppercase">Контакты</h4>

                        <p>Северное чертаново, дом 6, корп. 440</p>

                        <p> Телефон: +7 (999) 333 22 44</p>

                        <p>GunTake.ru</p>
                    </div>
                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Информация</h3>

                    <p>Текст</p>

                </aside>
            </div>
            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Поддержка</h3>


                    <div class="custom-post">
                        <div>
                            <a href="#"><img src="/images/kon.png" style="width: 300px" alt=""></a>
                        </div>
                        <div>
                            <a href="#" class="text-uppercase">При поддержке концерна "Калашникова"</a>
                            <span class="p-date">&copy; <?= date('Y') ?> </span>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; <?= date('Y') ?><a href="#">Guntake, </a> Сайт сделал <i
                            class="fa fa-heart"></i> студент <a href="#">Быков Пётр</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<?php Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'model-lg',
    'footer' => '<a href="#" class="btn btn-success">Оформить заказ</a> <button type="button" class="btn btn-danger">Очистить карзину</button>',
     ]); 
Modal::end();
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
