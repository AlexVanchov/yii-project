<?php

namespace app\controllers;

use app\models\Category;
use app\models\CategoryForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use app\models\NewsForm;
use yii\data\Pagination;

class AdminController extends Controller
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
        $this->layout = 'admin';
        return $this->render('index');
    }
    /**
     * Displays News.
     *
     * @return string
     */
    public function actionNews()
    {
        $data = News::getAll();

        $this->layout = 'admin';
        return $this->render('list-news', $data);
    }

    public function actionEditNews()
    {
        $this->layout = 'admin';
        $request = Yii::$app->request;
        $input = $request->post();
        $id = $request->get('id');

        if (!empty($input)) { //Post Request
            $attributes = $input['data'];

            // var_dump($attributes);
            // exit;

            $model = new NewsForm();
            if ($model->load($request->post(), 'data') && $model->validate()) {
                if ($id !== null) {
                    News::updateData($id, $attributes);
                } else {
                    $id = News::insertData($attributes);
                }
                Yii::$app->session->setFlash('success', 'Saved successfully');

            }
            else {
                
                Yii::$app->session->setFlash('error', 'Invalid input');
            }
            $this->redirect(array('admin/edit-news', 'id' => $id));
        } else {

            $categories = Category::getAll(false);
            $categories=$categories['categories'];
            // echo '<pre>';
            // var_dump();
            // exit;
            if ($id !== null) {

                $data = News::get($id);
                return $this->render('edit-news', [
                    'news' => $data,
                    'categories' => $categories,
                ]);
            } else {
                return $this->render('edit-news', [
                    'categories' => $categories
                ]);
            }
        }
    }
    public function actionRemoveNews()
    {
        $this->layout = 'admin';
        $request = Yii::$app->request;
        $id = $request->get('id');
        if ($id !== null) {
            News::remove($id);
        }

        $this->layout = 'admin';
        $this->redirect(array('admin/news'));
    }

    /**
     * Displays Categories.
     *
     * @return string
     */
    public function actionCategories()
    {
        $data = Category::getAll();

        $this->layout = 'admin';
        return $this->render('list-categories', $data);
    }
    public function actionRemoveCategory()
    {
        $this->layout = 'admin';
        $request = Yii::$app->request;
        $id = $request->get('id');
        if ($id !== null) {
            Category::remove($id);
        }

        $this->layout = 'admin';
        $this->redirect(array('admin/categories'));
    }
    public function actionEditCategory()
    {
        $this->layout = 'admin';
        $request = Yii::$app->request;
        $input = $request->post();
        $id = $request->get('id');
        if (!empty($input)) {
            $attributes = $input['data'];


            $model = new CategoryForm();
            if ($model->load($request->post(), 'data') && $model->validate()) {
                if ($id !== null) {
                    Category::updateData($id, $attributes);
                } else {
                    $id = Category::insertData($attributes);
                }

                $this->redirect(array('admin/edit-category', 'id' => $id));
            }
        } else {

            if ($id !== null) {

                $data = Category::get($id);
                return $this->render('edit-category', [
                    'category' => $data,
                ]);
            } else {
                return $this->render('edit-category');
            }
        }
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'admin';
        if (!Yii::$app->user->isGuest) {
            return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(array('admin/index'));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $this->layout = 'admin';
        Yii::$app->user->logout();

        return $this->render('index');
    }
}
