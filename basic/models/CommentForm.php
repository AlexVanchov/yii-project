<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;
    public $news_id;
    public $reCaptcha;



    public function rules()
    {
        return [
            [['comment', 'news_id'], 'required'],
            [['reCaptcha'], \kekaadrenalin\recaptcha3\ReCaptchaValidator::className(), 'acceptance_score' => 0]
        ];
    }

    
}
