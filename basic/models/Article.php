<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article".
 *
 * @property int $ID
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property int $viewed
 * @property int $user_id
 * @property int $status
 * @property int $category_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           /* [['description', 'content'], 'string'],
            [['date'], 'safe'],
            [['viewed', 'user_id', 'status', 'category_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],*/
            [['title'], 'required'],
            [['title', 'description', 'content'], 'string'],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['title'], 'string', 'max' => 255],
            [['zena'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'content' => 'Контент',
            'date' => 'Дата',
            'image' => 'Картинка',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Статус',
            'category_id' => 'Category ID',
            'zena' => 'Цена',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        /*if($this->image)
        {
            return '/uploads/' . $this->image;
        }
        return '/no-image.png';*/

        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel-> deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function getCategoty()
    {
        return $this->hasOne(Categoty::className(), ['ID' => 'category_id']);
    }

    public function saveCategoty($category_id)
    {
        $category = Categoty::findOne($category_id);
        if($category != null)
        {
            $this->link('categoty', $category);
            return true;
        }
    }

    public function getTags()
    {
        return $this->hasMany(tag::className(), ['ID' => 'tag_id'])->viaTable('article_tag', ['article_id' => 'ID']);
    }

    public function getSelectedTags()
    {
        $selectedTags = $this->getTags()->select('ID')->asArray()->all();
        return ArrayHelper::getColumn($selectedTags, 'ID');
    }

    public function saveTags($tags)
    {
        if(is_array($tags))
        {
            $this->clearCurrentTags();

            foreach ($tags as $tag_id) 
            {
                $tag = Tag::findOne($tag_id);
                $this->link('tags', $tag);
            }
        }
    }

    public function clearCurrentTags()
    {
        ArticleTag::deleteAll(['article_id' => $this->ID]);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getAll()
    {
        $query = Article::find();

        $count = $query->count();

        $pagination = new pagination(['totalCount' => $count, 'pageSize' => 1]);

        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getPopular()
    {
        return Article::find()->orderBy('viewed desc')->limit(3)->all();
    }

    public static function getRecent()
    {
        return Article::find()->orderBy('date asc')->limit(4)->all();
    }

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->ID;
        return $this->save();
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id'=>'ID']);
    }

    public function getArticleComments()
    {
        return $this->getComments()->where(['status'=>1])->all();
    }
}
