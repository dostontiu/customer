<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Cookie;

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
                'rules' => [
                    [
                        'actions' => ['error', 'logout', 'index', 'menu-left', 'dark', 'light', 'language'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
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

    public function beforeAction($action)
    {
        if ($action->id == 'menu-left'){
            $this->enableCsrfValidation = false;
        }elseif ($action->id == 'deny'|| $action->id=='seny'|| $action->id=='under') {
            $this->layout = 'frest/login';
        }

        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => (Yii::$app->user->id) ? 'frest/main' : 'frest/login',
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
        $countProducts = 5;
        $countCustomers = 18;
        return $this->render('index', [
            'countProducts' => $countProducts,
            'countCustomers' => $countCustomers,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'frest/login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionMenuLeft()
    {
        $res = $_POST['menu_lefts'];
        $session = Yii::$app->session;
        if ($session->get('menu_left') == 0) {
            $session = Yii::$app->session;
            $session->set('menu_left', 1);
        } else {
            $session = Yii::$app->session;
            $session->set('menu_left', 0);
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $res;
    }

    public function actionDark()
    {
        $res = 0;
        $session = Yii::$app->session;
        if ($session->get('menu_dark') == 0) {
            $session = Yii::$app->session;
            $session->set('menu_dark', 1);
            $res = 1;
        } else {
            $session = Yii::$app->session;
            $session->set('menu_dark', 0);
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $res;
    }

    public function actionLanguage($lang)
    {
        Yii::$app->language = $lang;

        $languageCookie = new Cookie([
            'name' => 'language',
            'value' => $lang,
            'expire' => time() + 60 * 60 * 24 * 30, //30 days
        ]);

        Yii::$app->response->cookies->add($languageCookie);

        return $this->redirect(Yii::$app->request->referrer);
    }
}
