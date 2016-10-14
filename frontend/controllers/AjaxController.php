<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Likes;


/**
 * Site controller
 */
class AjaxController extends Controller
{
    
 
    public function actionLike()
    {
       $id = Yii::$app->request->post("id");
       
       if($id != NULL)
       {
           $like = new Likes();
           $like->add($id);
           $likes_count_upd = Likes::countLikes($id);
           //Yii::$app->response->format = Response::FORMAT_JSON;
           return  $likes_count_upd;  
       } 
       
       else
       {   //$id = var_dump($id);
           header('HTTP/1.1 404 Not Found'); // chnage to exception
           echo "'status': 'error' 'message': 'data is not trasmitted $id'";
           die();
       }
      
     
    }
    
}

    
?>