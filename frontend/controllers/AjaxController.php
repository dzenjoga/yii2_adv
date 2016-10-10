<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;


/**
 * Site controller
 */
class AjaxController extends Controller
{
    
 
    public function actionLike()
    {
       $id = Yii::$app->request->post("id");
       
       if($id != null)
       {
           return  '{"status": "success", "id": "{$id}"}';  
       } 
       else
       {
           header('HTTP/1.1 404 Not Found'); // chnage to exception
           echo '"status": "error" "message": "data is not trasmitted"';
           die();
       }
      
     
    }
    
}

    
?>