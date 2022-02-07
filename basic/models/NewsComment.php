<?php

namespace app\models;

use DateTime;
use Yii;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class NewsComment extends ActiveRecord
{
    public static function get($id)
    {
        $comments = NewsComment::find()->where(['news_id' => $id])->all();
        return $comments;
    }

    public static function insertData($data)
    {
        $comment = new NewsComment();
        $comment->comment = $data['comment'];
        $comment->news_id = $data['news_id'];
        $comment->username = Yii::$app->user->identity->username;
        $comment->user_id = Yii::$app->user->getId();
        $comment->save();
        return $comment->id;
    }
    public static function remove($id)
    {
        $comment = NewsComment::find()->where(['id' => $id, 'user_id' => Yii::$app->user->getId()])->one();
        $comment->delete();
    }
}
