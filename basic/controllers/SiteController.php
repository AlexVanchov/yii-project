<?php

namespace app\controllers;

use app\models\Category;
use app\models\CommentForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use app\models\NewsComment;
use app\models\NewsComments;
use app\models\NewsImages;
use app\models\RegisterForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNews()
    {
        $data = Category::getAll(false);
        return $this->render('news', $data);
    }
    public function actionViewNews()
    {
        $model = new CommentForm(); // add comment
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if (Yii::$app->request->isPost && !Yii::$app->user->isGuest) { //Post Request
                $postData = Yii::$app->request->post();
                $data = NewsComment::insertData($model);
                $this->redirect(array('view-news', 'id' => $model['news_id']));
            }
        }


        $id = Yii::$app->request->get('id');
        $data = News::get($id);

        $comments = NewsComment::get($id);
        $images = NewsImages::get($id);
        $category = Category::get($data['category_id']);

        return $this->render('view-news', array('news' => $data, 'images' => $images, 'category' => $category['title'], 'comments' => $comments, 'model' => $model));
    }



    public function actionRemoveComment()
    {

        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $data = $request->post();

            NewsComment::remove($data['comment_id']);

            $this->redirect(array('site/view-news', 'id' => $data['news_id']));
        }
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (User::checkPermissions("Admin")) { // if user is admin redirect to admin panel
                return $this->redirect(['admin/index']);
            }
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = Yii::$app->request->post();

            $res = User::insertData($model);
            if ($res === false) {
                return $this->redirect(['site/register', 'error' => 'User already exists']);
            } else if ($res === 0) {
                return $this->redirect(['site/register', 'error' => 'Passwords doen\'t match']);
            }
            return $this->redirect(['site/login']);
        } else {
            $error = Yii::$app->request->get('error');
            return $this->render('register', array('error' => $error, 'model' => $model));
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    // Ajax Requests
    public function actionGetNews()
    {
        if (Yii::$app->request->isAjax) {
            $page = Yii::$app->request->post('page');
            $sortName = Yii::$app->request->post('sortName');
            $sortDate = Yii::$app->request->post('sortDate');
            $category_id = Yii::$app->request->post('category_id');
            $keyword = Yii::$app->request->post('keyword');

            $data = News::getAll($page, array("sortName" => $sortName, "sortDate" => $sortDate, "category_id" => $category_id, "keyword" => $keyword));
            $attributes = array();
            foreach ($data as $news) {
                $el = $news->getAttributes();

                $images = NewsImages::get($el['id']);
                $imgAttributes = array();
                foreach ($images as $image) {
                    $imgEl = $image->getAttributes();
                    $imgAttributes[] = $imgEl['url'];
                }
                $el['images'] = $imgAttributes;
                $el['description'] = substr(strip_tags($el['description']), 0, 160) . "...";
                $attributes[] = $el;
            }

            return json_encode(array('data' => $attributes, 'count' => News::count($category_id, $keyword)));
        }
    }
    public function actionGetNewsAutocomplete()
    {
        if (Yii::$app->request->isAjax) {
            $page = Yii::$app->request->post('page');
            $sortName = Yii::$app->request->post('sortName');
            $sortDate = Yii::$app->request->post('sortDate');
            $category_id = Yii::$app->request->post('category_id');
            $keyword = Yii::$app->request->post('keyword');

            $data = News::getAll($page, array("sortName" => $sortName, "sortDate" => $sortDate, "category_id" => $category_id, "keyword" => $keyword), true);
            $attributes = array();
            foreach ($data as $news) {
                $el = $news->getAttributes();
                $attributes[] = $el;
            }

            return json_encode(array('data' => $attributes));
        }
    }
}
