<?php 

namespace app\modules\admin\controllers;

use Yii;
use app\models\Comment;
use yii\web\Controller;


class CommentController extends Controller
{
	public function actionIndex()
    {
        $comment = Comment::find()->orderBy('id desc')->all();
        
        return $this->render('index',['comment'=>$comment]);
    }

    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);
        if($comment->delete())
        {
            return $this->redirect(['comment/index']);
        }
    }

    public function actionAllow($id)
    {
        $comment = Comment::findOne($id);
        if($comment->allow())
        {
            return $this->redirect(['comment/index']);
        }
    }
    
    public function actionDisallow($id)
    {
        $comment = Comment::findOne($id);
        if($comment->disallow())
        {
            return $this->redirect(['comment/index']);
        }
    }
}