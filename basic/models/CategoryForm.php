<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CategoryForm extends Model
{
    public $title;
    public $description;

    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
        ];
    }
}