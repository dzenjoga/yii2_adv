<?php
namespace backend\controllers;

use Yii;
use yii\web;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Twits;
use common\models\TwitPublish;

/**
 * Site controller
 */
class SiteController extends Controller
{
    
    public $layout = "main_new.php";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [ 'error'],
                        'allow' => true,
                  
                    ],
                    [
                        'actions' => ['logout', 'index', 'create-twit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ]
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login.php';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
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
    
    public function actionCreateTwit()
    {
       $twit_form = new TwitPublish();
       
       $post = Yii::$app->request->post("TwitPublish");
       if(count($post))
       {
           
           
       $picture = web\UploadedFile::getInstance($twit_form, 'image'); // filename
          
       $image = null;
            if($picture)
            {
                 $image = TwitPublish::uploadImage($picture);  // saved filename with path
            }
           
           
           $twit_form->text = $post["text"];
           $twit_form->category_id = $post["category_id"];
           $twit_form->image = $image;
           
           if($twit_form->createTwit())
           {
               return $this->refresh();
           }    
       }
       
      // var_dump($twit_form);
        return $this->render('create_twit', [
                'model' => $twit_form,
        ]);
    }
}
