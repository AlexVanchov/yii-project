<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>





<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Categories</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="<?= Url::to(['admin/edit-category']) ?>" class="btn btn-success" > <span>Add New Category</span></a>
                    </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                    </th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td>
                        </td>
                        <td><?= Html::encode("{$category->title}") ?></td>
                        <td><?= Html::encode("{$category->description}") ?></td>
                        <td>
                            <a href="<?= Url::to(['admin/edit-category', 'id' => $category->id]) ?>" class="edit btn btn-warning text-white" >Edit</a>
                            <a href="<?= Url::to(['admin/remove-category', 'id' => $category->id]) ?>" class="delete btn btn-danger text-white" >Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
        <!-- <div class="clearfix">
            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div> -->
    </div>
</div>