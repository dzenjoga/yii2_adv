<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Twit;



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
    
     public function actionNew()
    {
         
        $twit = new Twit();
        $twit->image = 'trololo';
        $twit->text = 'asbvTatat';
        if($twit->save())
        {
           return $this->render('new',[
		'res' => 'OK!',
            ]); 
            
        } else 
        {
           return $this->render('test',[
		'res' => 'Fail!',
            ]); 
        }
    }
    
    public function actionFeed()
    {
         
        //$twit = new Twit();
        $twits = Twit::find()->all();
                
        
        return $this->render('feed',[
		'feed' => $twits
            ]);  
    }
    
    public function actionOneTwit()
    {
         
        //$twit = new Twit();
        if($twit = Twit::find()->where(['id'=>'181'])->one())
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