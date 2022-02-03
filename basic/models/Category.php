<?php

namespace app\models;

use yii\data\Pagination;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function getAll($hasPagination = true) // with pagination
    {
        $query = Category::find();
        $data = array();
        if ($hasPagination) {

            $pagination = new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $query->count(),
            ]);
            $data['pagination']=$pagination;
            $categories = $query->orderBy('id DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
            $data['categories']=$categories;
        } else {
            $categories = $query->orderBy('id DESC')
            ->all();
            $data['categories']=$categories;
        }

        
        return $data;
    }
    public static function get($id)
    {
        $category = Category::find()->where(['id' => $id])->one();
        return $category;
    }

    public static function updateData($id, $data) {
        $category = Category::find()->where(['id' => $id])->one();
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->save();
    }

    public static function insertData($data) {
        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->save();
        return $category->id;
    }
    public static function remove($id) {
        $category = Category::find()->where(['id' => $id])->one();
        $category->delete();
    }
}
