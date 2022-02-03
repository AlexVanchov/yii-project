<?php

namespace app\models;

use DateTime;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public static function getAll() // with pagination
    {
        $query = News::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $news = $query->orderBy('id DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return [
            'news' => $news,
            'pagination' => $pagination,
        ];
    }
    public static function get($id)
    {
        $news = News::find()->where(['id' => $id])->one();
        return $news;
    }

    public static function updateData($id, $data)
    {
        $news = News::find()->where(['id' => $id])->one();
        $news->title = $data['title'];
        $news->description = $data['description'];
        $news->category_id = $data['category_id'];
        $news->date = date("Y-m-d H:i:s", $data['date']);
        $news->save();
    }

    public static function insertData($data)
    {
        $news = new News();
        $news->title = $data['title'];
        $news->description = $data['description'];
        $news->category_id = $data['category_id'];
        $news->date = date("Y-m-d H:i:s", $data['date']);
        $news->save();
        return $news->id;
    }
    public static function remove($id)
    {
        $news = News::find()->where(['id' => $id])->one();
        $news->delete();
    }
}
