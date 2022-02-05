<?php

namespace app\models;

use DateTime;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public static function getAll($page = false, $filters = false, $autocompleteUsage = false) // with pagination
    {
        $query = News::find();

        if ($page !== false) {
            $news = $query;
            if ($filters !== false) {
                if ($autocompleteUsage) {
                    $query->select('title');
                }
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
                if ($filters['category_id'] !== "0") {
                    $query->where(['category_id' => $filters['category_id']]);
                }
                if ($filters['keyword'] !== "") {
                    // $query->andFilterWhere([
                    //     'or',
                    //     ['like', 'title', $filters['keyword']],
                    //     ['like', 'description', $filters['keyword']]
                    // ]);
                    $query->where(['or', ['like', 'title', $filters['keyword']], ['or', ['like', 'description', $filters['keyword']]]]);
                    // $query->orWhere(['like', 'title', $filters['keyword']]);
                    // $query->orWhere(['like', 'title', $filters['keyword']]);
                }
                $orderByStr = $orderByStr === "" ? "date DESC" : $orderByStr;
                // var_dump($orderByStr);
                // exit;
                $news->orderBy($orderByStr);
            } else {
                $news->orderBy('date DESC');
            }
            if ($autocompleteUsage) {
                $news = $news
                    ->all();
                return $news;
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
    public static function count($category_id = false, $keyword = false)
    {
        $query = News::find();
        $count = 0;
        if ($keyword !== "") {
            if ($category_id !== "0") {
                $query->where(['and', ['category_id'=> $category_id]], ['or', ['like', 'title', $keyword], ['or', ['like', 'description', $keyword]]]);
            }
            else {
                $query->where(['or', ['like', 'title', $keyword], ['or', ['like', 'description', $keyword]]]);
            }
            
        } else if ($category_id !== "0") {
            $query->where(['category_id' => $category_id]);
        }

        $count = $query->count();
        return $count;
    }
}
