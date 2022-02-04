<?php

namespace app\models;

use DateTime;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class NewsImages extends ActiveRecord
{
    public static function get($id)
    {
        $news = NewsImages::find()->where(['news_id' => $id])->all();
        return $news;
    }

    public static function insertData($data)
    {
        $news = new NewsImages();
        $news->news_id = $data['news_id'];
        $news->url = $data['url'];
        $news->save();
        return $news->id;
    }
    public static function remove($id)
    {
        $image = NewsImages::find()->where(['id' => $id])->one();
        $news_id =0;
        if($image !== null) {
            $news_id = $image['news_id'];
            $image->delete();
        }
        return $news_id;
    }
}
