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
    const IMAGE_DIR = '../../frontend/web/images/';
    const IMAGE_PATH = '/images/';
    const NO_CAT = 'No category';
    
    const MODE_TEXT = 1;
    const MODE_IMAGE = 2;
    const MODE_BOTH = 3;
    
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
    
    public static function getImageDir()
    {
        if(!is_dir(self::IMAGE_DIR))
        {
            mkdir(self::IMAGE_DIR);
        }
        return self::IMAGE_DIR;
    }
    
    public function getCategory()
    {
//       var_dump($this->category_id);
//       return $this->category_id;
        
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
         
}
