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
                <h1 class="jumbotron-heading">Recent News</h1>

            </div>
        </section>

        <input type="hidden" id="isNews" value="1">
        <input type="hidden" id="page" value="1">
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="col-md-4" id="news_template" hidden>
                    <div class="card mb-4 box-shadow overflow-hidden">
                        <img class="card-img-top" id="news-image" src style="height: 225px; width: fit-content; display: block;"  data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text" id="news-title"></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a id="news-edit" href="<?= Url::to(['site/view-news']) ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small id="news-date" class="text-muted"></small>
                            </div>
                        </div>
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