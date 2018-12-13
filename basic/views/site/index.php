<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Главная страничка';
?>



<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            	<?php foreach ($articles as $article) :?>

                <article class="post">
                    <div class="post-thumb">
                        <a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>"><img src="<?= $article->getImage(); ?>" alt=""></a>

                        <a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>" class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">Просмотреть</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['/site/category', 'id'=>$article->categoty->ID])?>"><?= $article->categoty->title; ?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>"><?= $article->title; ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p><?= $article->description; ?>
                            </p>

                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href="<?= Url::toRoute(['/site/single', 'id'=>$article->ID]); ?>" class="more-link">Прочитать</a>
                                
                            </div>
                            <a href="<?= yii\helpers\Url::to(['/cart/add', 'id'=>$article->ID]) ?>" data-id="<?= $article->ID; ?>" class="btn btn-default add-to-cart">Купить. <?= $article->zena; ?> руб.</a>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize"><a href="#"></a> <?= $article->getDate(); ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed; ?>
                            </ul>
                        </div>
                    </div>
                </article>

                <?php endforeach; ?>
                <?php
                echo LinkPager::widget([
                	'pagination' => $pagination,
                ]);
                ?>

            </div>

            <div class="col-md-4" data-sticky_column>
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
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->