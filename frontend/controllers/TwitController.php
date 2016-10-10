<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Twits;
use frontend\models\FilterForm;
use common\models\User;
use common\models\TwitPublish;
use common\models\TwitPicture;
use common\models\UserFilter;



/**
 * Blog controller
 */
class TwitController extends Controller
{ 
    public $layout = 'twit.php';
    
    /**
     * @inheritdoc
     */
    
    public function behaviors()
    {
        return [
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
     
    public function actionHello()
    {
  
        return $this->render('hello',[
		'header' => 'This is a hello action of TwitController!',
		]);
   
        
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public $title = 'Twitter clone';
    public function actionIndex()
    {
        return $this->render('hello',[
		'header' => $this->title
		]);
    }
    
     public function actionTest()
    {
        return $this->render('test',[
		'header' => 'This is a test action of TwitController!'
		]);
        
    }
    
//     public function actionNew()
//    {
//         
//        $twit = new Twits();
//        $twit->image = 'trololo';
//        $twit->text = 'asbvTatat';
//        if($twit->save())
//        {
//           return $this->render('new',[
//		'res' => 'OK!',
//            ]); 
//            
//        } else 
//        {
//           return $this->render('test',[
//		'res' => 'Fail!',
//            ]); 
//        }
//    }
    public function actionCreateTwit()
    {
        $twit_form = new TwitPublish();
       
        $post = Yii::$app->request->post("TwitPublish");
        if(count($post))
        {
        $picture = \yii\web\UploadedFile::getInstance($twit_form, 'image'); // filename
        $image = null;
        if($picture)
            {
                 $image = TwitPicture::uploadImage($picture);  // saved filename with path
            }

           $twit_form->text = $post["text"];
           $twit_form->category_id = $post["category_id"];
           $twit_form->image = $image;
           
           if($twit_form->createTwit())
           {
               return $this->refresh();
           }    
       }
       
        return $this->render('create_twit', [
                'model' => $twit_form,
        ]);
    }
    
    public function actionFeed()
    {   
        $filter = new FilterForm();
        $post = Yii::$app->request->post();
        
        $filter->user[] = '1';
        $filter->user[] = Yii::$app->getUser()->id;
        
        /**
         * @var $autors_list list of signed users + user itself + admin
         */
       //$autors_list = $filter->user;
        
        //var_dump($filter->user);
        
        
        
        if(count($post))
        {
            //$filter->load($post);
            $filter->mode = $post['FilterForm']['mode'];    
        }
         
       /**
        *  @var $twits Twits[]
        */
        $twits = Twits::getFeedQuery(1,$filter)->all(); // 1 - # of page
        
       /**
        *  @var $users all users
        */
        
        $users = UserFilter::getAllUsers($twits); 
        
        
        return $this->render('feed',[
		'feed' => $twits,
                'filter' => $filter,
                'users' => $users,
                'authors' => UserFilter::getAutorsList(),
            ]);  
    }
    
    
        public function actionOneTwit($id)
    {
         
        //$twit = new Twits();
        if($twit = Twits::find()->where(['id'=>$id])->one())
        {   
            return $this->render('one_twit',[
		'twit' => $twit
            ]); 
        } else 
        {
            return $this->render('error',[
                'name' => 'Error #12345',
		'message' => 'Nothing is found!'
            ]);   
        }
                
       
    }
    
}




?>