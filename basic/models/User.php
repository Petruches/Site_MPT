<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $ID
 * @property string $name
 * @property string $fam
 * @property string $otch
 * @property string $username
 * @property string $pass
 * @property string $tel
 * @property string $mail
 * @property string $isAdmin
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }


    public function rules()
    {
        return [
            [['name', 'fam', 'otch', 'username', 'pass', 'tel', 'mail'], 'required'],
            [['name', 'fam', 'otch', 'mail'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 30],
            [['pass'], 'string', 'max' => 10],
            [['tel'], 'string', 'max' => 11],
        ];
    }


    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'name' => 'Имя',
            'fam' => 'Фамилия',
            'otch' => 'Отчество',
            'username' => 'Логин',
            'pass' => 'Пароль',
            'tel' => 'Телефон',
            'mail' => 'Mail',
            'isAdmin' => 'Админка',
        ];
    }

    /*public static function findByUsername($username)
    {
            return static::findOne(['username' => $username]);
    }*/

    /*public function validatePassword($password)
    {
        $hashed = $this->pass;
        if (crypt($password, $hashed) == $hashed)
        {
            return true;
        }
    }*/

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public function getId()
    {
        return $this->ID;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

   /* public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }*/
    
    public function create()
    {
        return $this->save(false);
    }
    
   /* public function saveFromVk($uid, $name, $photo)
    {
        $user = User::findOne($uid);
        if($user)
        {
            return Yii::$app->user->login($user);
        }
        
        $this->id = $id;
        $this->name = $name;
        $this->photo = $photo;
        $this->create();
        
        return Yii::$app->user->login($this);
    }*/

   /* public function getImage()
    {
        return $this->photo;
    }*/

    public static function findByUsername($username)
    {
        return User::find()->where(['username'=>$username])->one();
    }

    public function validatePassword($password)
    {
        return ($this->pass == $password) ? true : false;
    }
}
