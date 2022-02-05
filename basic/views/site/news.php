<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'News';
?>
<div class="site-index">

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">News</h1>

            </div>
        </section>

        <input type="hidden" id="isNewsCategories" value="1">
        <input type="hidden" id="isNews" value="1">
        <input type="hidden" id="page" value="1">
        <input type="hidden" id="category_id" value="0">



        <div id="search-container">
            <div class="form-group mt-5">
                <label class="w-100" for="">Search by keyword</label>

                <div class="row">

                <div class="col-10 ui-widget">
                    <input class="form-control w-100 d-inline" name="" id="keyword" aria-describedby="helpId" placeholder="keyword" autocomplete="off"> 

                </div>
                <div class="col-2">
                <button id="keyword-btn" class="btn btn-success d-inline w-100">Search</button>

                </div>
                </div>
            </div>
        </div>
        <div id="categories-container" class="row mx-auto justify-content-center">
            
            <div class="col-12 title mb-4">
                <h4 class="text-center">Categories</h4>
            </div>
            <?php foreach ($categories as $category) : ?>
                <div class="col-2 btn btn-secondary mx-4" onclick="loadNewsByCategory('<?= $category->id ?>')">
                    <h2 id="cat-<?= $category->id ?>"><?= $category->title ?></h2>
                </div>
            <?php endforeach; ?>

        </div>

        <div id="news_list_container" class="album  bg-light" hidden>
            <h2 class="text-center" id="current_category"></h2>
            <button id="back-to-categories" class="btn btn-secondary m-5 mt-0">Go back to categories</button>
            <div class="container">

                <div class="col-md-4" id="news_template" hidden>
                    <div class="card mb-4 box-shadow overflow-hidden">
                        <img class="card-img-top" id="news-image" src style="height: 225px; width: fit-content; display: block;" data-holder-rendered="true">
                        <div class="card-body">
                            <h5 class="card-text" id="news-title"></h5>
                            <p class="card-text" id="news-description"></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a id="news-edit" href="<?= Url::to(['site/view-news']) ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small id="news-date" class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sort">
                    <div class="form-group">
                        <input type="hidden" id="sort-name" value="">
                        <input type="hidden" id="sort-date" value="">
                        <label for="sort">Sort by:</label>
                        <button class="btn btn-secondary" id=sort-name-btn>Name <i class="fa  aria-hidden=" true"></i></button>
                        <button class="btn btn-secondary" id=sort-date-btn>Date <i class="fa" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="row" id="news-container">


                </div>
            </div>
            <li id="template-paggination" class="page-item " hidden><a class="page-link"></a></li>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item" onclick="changePage('-')">
                        <a class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <li class="page-item" onclick="changePage('+')">
                        <a class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </main>
</div>