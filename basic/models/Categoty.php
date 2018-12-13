<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoty".
 *
 * @property int $ID
 * @property string $title
 */
class Categoty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'title' => 'Титульник',
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'ID']);
    }

    public function getArticlesCount()
    {
        return $this->getArticles()->count();
    }

    public static function getCategory()
    {
        return Categoty::find()->all();
    }
}
