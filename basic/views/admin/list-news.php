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
                    <h2>Manage <b>News</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="<?= Url::to(['admin/edit-news']) ?>" class="btn btn-success"> <span>Add New News</span></a>
                    </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($news as $new) : ?>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td><?= Html::encode("{$new->title}") ?></td>
                        <td><?= Html::encode("{$new->description}") ?></td>
                        <td><?= Html::encode("{$new->date}") ?></td>
                        <td>
                            <a href="<?= Url::to(['admin/edit-news', 'id' => $new->id]) ?>" class="edit btn btn-warning text-white" >Edit</a>
                            <a href="#deleteEmployeeModal" class="delete btn btn-danger text-white" >Delete</a>
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