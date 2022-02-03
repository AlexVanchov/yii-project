<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewsForm extends Model
{
    public $title;
    public $description;
    public $category_id;
    public $date;

    public function rules()
    {
        return [
            [['title', 'description', 'category_id', 'date'], 'required'],
        ];
    }
}