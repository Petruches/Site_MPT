<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $ID
 * @property string $text
 * @property int $user_id
 * @property int $article_id
 * @property int $status
 */
class Comment extends \yii\db\ActiveRecord
{

    const STATUS_ALLOW = 1;
    const STATUS_DISALLOW = 0;

    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'article_id', 'status'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'text' => 'Текст',
            'user_id' => 'Пользователь ID',
            'article_id' => 'Статья ID',
            'status' => 'Статус',
        ];
    }

        public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }
    
    public function isAllowed()
    {
        return $this->status;
    }

    public function allow()
    {
        $this->status = self::STATUS_ALLOW;
        return $this->save(false);
    }

    public function disallow()
    {
        $this->status = self::STATUS_DISALLOW;
        return $this->save(false);
    }
}
