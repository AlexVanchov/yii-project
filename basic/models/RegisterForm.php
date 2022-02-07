<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $rePassword;
    public $reCaptcha;



    public function rules()
    {
        return [
            [['username', 'password', 'rePassword'], 'required'],
            ['rePassword', 'compare', 'compareAttribute' => 'password'],
            [['reCaptcha'], \kekaadrenalin\recaptcha3\ReCaptchaValidator::className(), 'acceptance_score' => 0]
        ];
    }

    
}
