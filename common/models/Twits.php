<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%twits}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $text
 * @property string $image
 * @property string $time_publish
 * @property integer $category_id
 *
 * @property User $user
 */
class Twits extends \yii\db\ActiveRecord
{
   public static $image_dir;
   
  
   

    const NO_CAT = 'No category';
    const MODE_UNKNOWN = 0;
    const MODE_TEXT = 1;
    const MODE_IMAGE = 2;
    const MODE_BOTH = 3;
    
    public static $modes = [
        self::MODE_BOTH => 'Text and image', 
        self::MODE_IMAGE => 'Image', 
        self::MODE_TEXT => 'Text', 
   
    ];

        public static $categories = [
       'Category A', 'Category B', 'Category C', 'Category D'     
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%twits}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id','category_id'], 'integer'],
            [['text'], 'string'],
            [['image'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    

    
    public function getCategory()
    {    
        $a = static::$categories;
        if ($this->category_id == '')
        {
            return self::NO_CAT;
        }
        return $a[$this->category_id]; 
    }
    
    public function getContent()
    {
        $result = new \stdClass();
        
        if($this->text) 
        {
            $result->text = $this->text;
            $result->mode = self::MODE_TEXT; 
        }
        
        if($this->image)
        {
            $result->image = $this->image;
            $result->mode = self::MODE_IMAGE; 
        }
        
        if($this->image && $this->text)
        {
           $result->mode = self::MODE_BOTH; 
        }
        
            return $result;
    }

    public function getImage()
    {
            $image = TwitPicture::readImage($this->image);
            if($image)
            {
               return 'data:image/jpg;base64,'. base64_encode($image);
      
            }
            else {
                return NULL;
            }
        
    }
    
    public static function getFeedQuery($page = 1, $filter = null)
    {
        $twit_query = static::find()->leftJoin(User::tableName(), static::tableName().'.user_id = '.User::tableName().'.id')->with('user');
        
        if($filter)
        {
            
            
             if($filter->mode)
            {
                $or = FALSE;
                if(in_array(Twits::MODE_BOTH, $filter->mode))
                {
                    //var_dump('both!');
                    $twit_query->where(['!=', 'text', ''])->andWhere(['!=', 'image' , '']);
                    $or = TRUE;
                }
                
                if(in_array(Twits::MODE_TEXT, $filter->mode))
                {
                    //var_dump('text');
                    if($or)
                    {
                        //var_dump('or');
                        $twit_query->orWhere(['!=', 'text', '']);
                    }
                    else
                    {
                        //var_dump('nor');
                        $twit_query->where(['!=', 'text', ''])->andwhere(['image' => NULL]);
                    }  
                }
                
                if(in_array(Twits::MODE_IMAGE, $filter->mode))
                {
                    //var_dump('image');
                     if($or)
                    {
                        //var_dump('or'); 
                        $twit_query->orWhere(['!=','image', '']);
                    }
                    else
                    {
                       $twit_query->where(['!=','image', ''])->andwhere(['text' => '']);
                    }  
                   
                }
            }
            
            if($filter->user)
            {   
                $twit_query->andWhere([User::tableName().'.id' => $filter->user[0]]);
                foreach($filter->user as $a)
                {
                    $twit_query->orWhere([User::tableName().'.id' => $a]);
                }
                 
            }
        }
        return $twit_query->orderby(['time_publish' => SORT_DESC]);
    }
         
}
