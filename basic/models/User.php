<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }


    public function validatePassword($password)
    {
        return $this->password === md5(md5($password));
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function insertData($data)
    {
        if ($data['username']){
            $existingUser = User::find()->where(['username' => $data['username']])->one();
            if ($existingUser !== NULL){
                return false;
            }
        }
        $user = new User();
        $user->username = $data['username'];
        if ($data['password'] == $data['rePassword']){
            $user->password = md5(md5($data['password']));
        }
        else {
            return 0;
        }
        $user->role = "User";
        $user->save();
        return $user->id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    public static function checkPermissions($role) {
        //if user is logged in
        if(Yii::$app->user->isGuest) {
            return false;
        }
        if(Yii::$app->user->identity->role == $role) {
            return true;
        }
        return false;
    }
}
