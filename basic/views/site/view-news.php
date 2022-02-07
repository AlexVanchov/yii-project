<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div id="main-content" class="blog-page">

    <input type="hidden" id="isViewNews" value="1">


    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-10 col-md-12 left-box m-auto">
                <div class="card single_post p-5">
                    <div class="body">
                        <div class="img-post">
                            <div class="splide">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        <?php foreach ($images as $image) : ?>
                                            <li class="splide__slide">
                                                <img src="/<?= $image->url ?>" alt="">
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h3><?= $news->title ?></h3>
                        <p><?= $news->description ?></p>
                        <hr>
                        <span><?= date('d-m-Y', strtotime($news->date)) ?></span> <span class="float-right">Category: <?= $category ?></span>
                    </div>
                </div>
                <div class="card p-5">
                    <div class="header">
                        <h2>Comments <?= count($comments) ?></h2>
                    </div>
                    <div class="body">
                        <ul class="comment-reply list-unstyled">

                            <?php foreach ($comments as $comment) : ?>
                                <li class="row clearfix">
                                    <div class="text-box col-md-10 col-8 p-l-0 p-r0 my-4">
                                        <h5 class="m-b-0"><?= $comment['username'] ?></h5>
                                        <p><?= $comment['comment'] ?></p>
                                        <ul class="list-inline">
                                            <li>Commented on: <?= date('d-m-Y', strtotime($comment['date'])) ?></li>
                                        </ul>
                                        <?php if ($comment['user_id'] == Yii::$app->user->getId()) : ?>
                                            <?php $form = ActiveForm::begin([
                                                'action' => ['site/remove-comment'],
                                                'method' => 'post',
                                                'options' => ['enctype' => 'multipart/form-data'],
                                            ]); ?>
                                            <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                            <input type="hidden" name="news_id" value="<?= $news->id ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <?php ActiveForm::end(); ?>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="card p-5">
                    <?php if (Yii::$app->user->isGuest) : ?>
                        <div class="header">
                            <h2>Leave a comment</h2>
                        </div>
                        <div class="body">
                            <p>You must <a href="<?= Url::to(['site/login']) ?>">login</a> to post a comment.</p>
                        </div>
                    <?php else : ?>
                        <div class="header">
                            <h2>Leave a comment</h2>
                        </div>
                        <div class="body">
                            <div class="comment-form">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <?php $form = ActiveForm::begin([
                                            // 'action' => ['site/add-comment'],
                                            'method' => 'post',
                                            'options' => ['enctype' => 'multipart/form-data'],
                                            'fieldConfig' => [
                                                'template' => "{label}\n{input}\n{error}",
                                                'labelOptions' => ['class' => 'col-lg-12 col-form-label mr-lg-3'],
                                                'inputOptions' => ['class' => 'col-lg-12 form-control'],
                                                'errorOptions' => ['class' => 'col-lg-12 invalid-feedback'],
                                            ],
                                            
                                            'validateOnSubmit'=>true,
                                        ]);
                                        ?>
                                        <?= $form->field($model, 'news_id')->hiddenInput(['value'=>$news->id])->label(false); ?>
                                        <!-- <div class="form-group">
                                            <textarea rows="4" name="comment" class="form-control no-resize" placeholder=""></textarea>
                                        </div> -->

                                        <?= $form->field($model, 'comment')->textarea(['autofocus' => true, 'content'=> 'safe', 'required'=> true])->label(false) ?>
                                        <button type="submit" class="btn btn-block btn-primary">Post</button>

                                        <?= $form->field($model, 'reCaptcha')->widget(\kekaadrenalin\recaptcha3\ReCaptchaWidget::class) ?>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>