<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
//use \yii\widgets\ActiveForm;
use app\models\comment;
use app\models\commentForm;

$this->title = $article->title;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="<?= $article->getImage(); ?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['/site/category', 'id'=>$article->categoty->ID])?>"><?= $article->categoty->title; ?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>"><?= $article->title; ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <?= $article->content; ?>
                        </div>
                       <div class="decoration">
                       <!--      <a href="<?= \yii\helpers\Url::to(['cart\add', 'id'=>$article->ID]); ?>" class="btn btn-default">Купить</a> -->
                        </div>
                       <!-- <a href="">Цена: <?= $article->zena; ?> руб.</a> -->
                        <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize"><?= $article->getDate(); ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="s-vk" href="#"><i class="fa fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
            

                 <?= $this->render('/partials/comment', [
                 'article'=>$article,
                 'comments'=>$comments,
                 'commentForm'=>$commentForm
             ])?>

            </div>
          <!--  <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">
                    
                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Популярные посты</h3>

                        <?php foreach ($popular as $article) :?>
                        

                        <div class="popular-post">


                            <a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>" class="popular-img"><img src="<?= $article->getImage(); ?>" alt="">

                                <div class="p-overlay"></div>
                            </a>

                            <div class="p-content">
                                <a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>" class="text-uppercase"><?= $article->title; ?></a>
                                <span class="p-date"><?= $article->getDate(); ?></span>

                            </div>
                        </div>

                        <?php endforeach; ?>

                    </aside>
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Недавние посты</h3>
  
                        <?php foreach ($recent as $article) :?>

                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>" class="popular-img"><img src="<?= $article->getImage(); ?>" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>" class="text-uppercase"><?= $article->title; ?></a>
                                    <span class="p-date"><?= $article->getDate(); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                           
                        </div>
                    </aside>
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Категории</h3>
                        <ul>
                            <?php foreach ($categories as $categoty) :?>

                            <li>
                                <a href="#"><?= $categoty->title; ?></a>
                                <span class="post-count pull-right"> (<?= $categoty->getArticlesCount(); ?>)</span>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
            </div> -->
            <?/*= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);*/?>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->
