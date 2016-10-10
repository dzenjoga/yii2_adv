<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 *
 * @property integer $id
 * @property integer $user_id
 */
class TwitPicture extends Model
{
   public static $image_dir;
   
    public static function getImageDir()
   {
        if (self::$image_dir === null)
        {
          self::$image_dir = Yii::getAlias("@root") . "/upload/";
        } 
        return self::$image_dir;
         
   }
   
   /**
     * @param $picture UploadedFile
     * @return bool upload result
     */

       public static function uploadImage($picture)
    {
  
        $picture_filename = self::getImageDir() . $picture->name;
        if($picture->saveAs($picture_filename))
        {
            return self::getImageDir() . $picture->name;
        }
        else
        {
            return null;
        }       
    }


    public static function readImage($picture)
    {
        if($picture)
        {
            return file_get_contents($picture);
        } 
        else
        {
           return 'NULL'; 
        }
    }
   

}
