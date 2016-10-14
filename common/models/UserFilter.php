<?php

namespace common\models;

use yii\base\Model;
use common\models\User;
use Yii;

/**
 * User filter
 */
class UserFilter extends Model
{
   // public $username;
   // public $sub_authors;
    

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
    
    public static function getAutorsList()
    {
        if(Yii::$app->user->isGuest)
        {
            return NULL;
        }
        
        // the authors from subscribtion will be added here  
        $authors[] = 'admin';
        $authors[] = Yii::$app->getUser()->getIdentity()->username;
        return $authors;
    }
    
    public static function getAllUsers()
    {
        $twits = Twits::getFeedQuery()->all();;
        $users = []; 
        foreach ($twits as $a)
        {
            $users[$a->user_id] = $a->user->username;
        }
        return $users;
    } 
}
