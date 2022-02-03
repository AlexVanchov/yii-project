<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewsForm extends Model
{
    public $id;
    public $title;
    public $description;
    public $category_id;
    public $date;
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'maxFiles' => 10],
            [['title', 'description', 'category_id', 'date'], 'required'],
        ];
    }
    public function upload()
    {
        // var_dump(($this->imageFiles));exit;
        $uploadDir = Yii::getAlias('uploads/');
        foreach ($this->imageFiles as $file) {
            $name = $this->generateRandomName();
            $path = $uploadDir  . $name . '.' . $file->extension;
            $file->saveAs($path);
            NewsImages::insertData(['news_id' => $this->id, 'url' => $path]);
        }
        return true;
    }
    // generates random hash for image name
    public function generateRandomName()
    {
        return substr(md5(rand(0, 1000000)), 0, 10);
    }

}
