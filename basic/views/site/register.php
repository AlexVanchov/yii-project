<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to register:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>


    <span class="text-danger"><?= $error ?></span>
    <div class="form-group row field-loginform-username required">
        <label class="col-lg-1 col-form-label mr-lg-3" for="">Username</label>
        <input type="text" class="col-lg-3 form-control" name="username" autofocus="" aria-required="true">
    </div>
    <div class="form-group row field-loginform-username required">
        <label class="col-lg-1 col-form-label mr-lg-3" for="">Password</label>
        <input type="password" class="col-lg-3 form-control" name="password" autofocus="" aria-required="true">
    </div>
    <div class="form-group row field-loginform-username required">
        <label class="col-lg-1 col-form-label mr-lg-3" for="">Confirm Password</label>
        <input type="password" class="col-lg-3 form-control" name="rePassword" autofocus="" aria-required="true">
    </div>

    <div class="form-group">
        <div class="offset-lg-1 col-lg-11">
            <button type="submit" class="btn btn-primary" name="">Register</button>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <span>Already have account? <a href="<?= Url::to(['site/login']) ?>">Login</a></span>
    <hr>
</div>