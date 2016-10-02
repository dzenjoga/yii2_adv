<?php
namespace common\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class TwitPublish extends Model
{
    public $text;
    public $image;
    public $category_id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'image'], 'string'],
         //   [['image'], ['string', max(255)]],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'test' => 'Twit text',
            'image' => 'Twit picture path'
        ];
    }
    
    public function createTwit()
    {
        if(!$this->validate())
        {
            return null;
        }
        
        $twit = new Twits();
        $twit->text = $this->text;
        $twit->image = $this->image;
        $twit->category_id = $this->category_id; 
        $twit->user_id = \Yii::$app->user->id;
        
        var_dump($twit);
        
        return $twit->save() ? $twit : null;
    }
    
    
     /**
     * @param $picture UploadedFile
     * @return bool upload result
     */
    public static function uploadImage($picture)
    {
  
        $picture_filename = Twits::getImageDir() . $picture->name;
        if($picture->saveAs($picture_filename))
        {
            return Twits::IMAGE_PATH . $picture->name;
        }
        else
        {
            return null;
        }


            
    }


   
}
