<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Country;
use app\models\Test;
use app\models\RegForm;
use app\models\Article;
use app\models\Categoty;
use app\models\commentForm;
use yii\data\Pagination;
use app\models\Cart;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$model = Article::getAll();

        $query = Article::find();

        $count = $query->count();

        $pagination = new pagination(['totalCount' => $count, 'pageSize' => 2]);

        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Categoty::getCategory();

        $comment = $article->comment;
        $commentForm = new commentForm();

        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'comment' => $comment,
            'commentForm' => $commentForm,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionMsg($msg = 'Привет') {
		return $this -> render('msg', ['msg' => $msg]);
	}
	//localhost:8080/msg?$msg	
	
	public function actionTest() {
		$model = new Test();
		if ($model->load(yii::$app->request->post()) && $model->validate())
		{
			$model->pass = md5($model->pass);
			return $this->render('test-confirm',['model' => $model]);
		}
		else
		{
			return $this->render('Test',['model' => $model]);
		}
	}

    public function actionCountries() {
        $countries = Country::find()->all();
		
		$country = new Country();
		
		return $this->render('countries', ['countries' => $countries]);
	}	
    //Форма регистрации
    /*public function actionReg() {

         $model = new RegForm();
         if ($model->load(yii::$app->request->post()) && $model->insertUser())
         {
            $model->insertUser();
         }
         else
         {
            return $this->render('reg', ['model' => $model]);
         }
         
         return $this->render('reg', ['model' => $model]);
    }*/

    public function actionSingle($id)
    {
        $commentForm = new CommentForm();

        $article = Article::findOne($id);

        $query = Article::find();

        $count = $query->count();

        $pagination = new pagination(['totalCount' => $count, 'pageSize' => 2]);

        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        $comments = $article->getArticleComments();

        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Categoty::getCategory();

        return $this->render('single', [
            'article' => $article,
            'articles' => $articles,
            'pagination' => $pagination,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'comments'=>$comments,
            'commentForm' => $commentForm,
        ]);


    }

    public function actionCategory($id)
    {
        $query = Article::find()->where(['category_id'=>$id]);

        $count = $query->count();

        $pagination = new pagination(['totalCount' => $count, 'pageSize' => 2]);

        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Categoty::getCategory();


        return $this->render('category', [
            'article' => $article,
            'articles' => $articles,
            'pagination' => $pagination,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            //echo 'Авторизируйтесь';
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //echo 'Вы есть';
            return $this->goBack();
        }
        return $this->render('/site/login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionReg()
    {
        $model = new regForm();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->Reg())
            {
                return $this->redirect(['index']);
            }
        }
        return $this->render('reg', ['model'=>$model]);
    }

    public function actionComment($id)
    {
        $model = new commentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Ваш комментарий рассматривается!');
                return $this->redirect(['site/view', 'id'=>$id]);
            }
        }
    }


}
