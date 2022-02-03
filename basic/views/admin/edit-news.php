<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>



<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <?php if (isset($news)) : ?>
                        <h2>Editing News: <b>"<?= Html::encode("{$news->title}") ?>"</b> </h2>
                    <?php else : ?>
                        <h2>Creating News </h2>
                    <?php endif; ?>
                </div>
                <?php if (isset($news)) : ?>
                    <div class="col-sm-6">
                        <a href="<?= Url::to(['admin/remove-news', 'id' => $news->id]) ?>" class="btn btn-danger"> <span>Delete</span></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <form action="" method="post">
            <div>
                <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input required type="text" name="data[title]" id="" class="form-control" placeholder="" value="<?= isset($news) ? Html::encode("{$news->title}") : "" ?>">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea required type="text" name="data[description]" class="form-control" cols="30" rows="10"><?= isset($news) ? Html::encode("{$news->description}") : "" ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="text" class="form-control-date" name="" id="datepicker" placeholder="" value="<?= isset($news) ? date('Y-m-d', strtotime($news->date)) : "" ?>">
                    <input type="hidden" name="data[date]" id="date" value="
                    <?php
                    if (isset($news)) {
                        $date = new DateTime($news->date);
                        echo $date->getTimestamp();
                    } else {
                        $date = new DateTime();
                        echo $date->getTimestamp();
                    }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="">Images</label>
                    <input type="file" class="form-control-file" name="" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select required class="form-control" name="data[category_id]" id="">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>" <?= isset($news) && $news->category_id == $category->id ? 'selected' : '' ?>><?= $category->title ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>