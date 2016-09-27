<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Tweet;



/**
 * Blog controller
 */
class BlogController extends Controller
{ 
    public $layout = 'blog.php';
    
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
        $tweet = new Tweet();
        $tweet->text = 'abc';
        $tweet->image = 'dfw';
        
        if($tweet->save()){
            $title = 'OK!';
        } else {
             $title = 'False!';
        }
        
        return $this->render('test',[
		'header' => 'This is a test action of BlogController!',
		]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('hello',[
		'header' => $title
		]);
    }
    
     public function actionTest()
    {
        return $this->render('test',[
		'header' => 'This is a test action of BlogController!',
		]);
    }
}




?>