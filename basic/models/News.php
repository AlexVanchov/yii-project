<?php

namespace app\models;

use DateTime;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public static function getAll($page = false, $filters = false) // with pagination
    {
        $query = News::find();

        if ($page !== false) {
            $news = $query;
            if ($filters !== false) {
                $orderByStr = '';
                if ($filters['sortDate'] !== '') {
                    switch ($filters['sortDate']) {
                        case '+':
                            $orderByStr = 'date ASC';
                            break;
                        case '-':
                            $orderByStr = 'date DESC';
                            break;
                    }
                }
                $operator = $orderByStr != "" ? "," : "";
                if ($filters['sortName'] !== '') {
                    switch ($filters['sortName']) {
                        case '+':
                            $orderByStr .= $operator . 'title ASC';
                            break;
                        case '-':
                            $orderByStr .= $operator . 'title DESC';
                            break;
                    }
                }
                $orderByStr = $orderByStr === "" ? "date DESC" : $orderByStr;
                // var_dump($orderByStr);
                // exit;
                $news->orderBy($orderByStr);
            } else {
                $news->orderBy('date DESC');
            }
            $news = $news
                ->offset($page * 6 - 6)
                ->limit(6)
                ->all();
            // echo '<pre>';
            // var_dump($news);
            return $news;
        } else {
            $pagination = new Pagination([
                'defaultPageSize' => 6,
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
    public static function removeImages($id)
    {
        $images = NewsImages::find()->where(['news_id' => $id])->all();
        foreach ($images as $image) {
            $image->delete();
        }
    }
    public static function count()
    {
        $count = News::find()->count();
        return $count;
    }
}
