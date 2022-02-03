<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>



<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <?php if (isset($category)) : ?>
                        <h2>Editing category: <b>"<?= Html::encode("{$category->title}") ?>"</b> </h2>
                    <?php else : ?>
                        <h2>Creating category </h2>
                    <?php endif; ?>
                </div>
                <?php if (isset($category)) : ?>
                    <div class="col-sm-6">
                        <a href="<?= Url::to(['admin/remove-category', 'id' => $category->id]) ?>" class="btn btn-danger"> <span>Delete</span></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <form action="" method="post">
            <div>
                <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input required type="text" name="data[title]" id="" class="form-control" placeholder="" required value="<?= isset($category) ? Html::encode("{$category->title}") : "" ?>">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea required type="text" name="data[description]" class="form-control" cols="30" rows="10"><?= isset($category) ? Html::encode("{$category->description}") : "" ?></textarea>
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>