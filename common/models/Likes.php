<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%likes}}".
 *
 * @property integer $twit_id
 * @property integer $user_id
 *
 * @property Twits $twit
 * @property User $user
 */




class Likes extends \yii\db\ActiveRecord
{  

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%likes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['twit_id', 'user_id'], 'required'],
            [['twit_id', 'user_id'], 'integer'],
            [['twit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Twits::className(), 'targetAttribute' => ['twit_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'twit_id' => 'Twit ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTwit()
    {
        return $this->hasOne(Twits::className(), ['id' => 'twit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function add($twit_id)
    {
        $this->twit_id = $twit_id;
        $this->user_id = Yii::$app->user->id;
        if($this->twit_id != NULL && $this->user_id != NULL)
        {
            return $this->save()? $this : NULL;
        }
        else
        {
            return NULL;
        }
    }
    
    public static function countLikes ($twit_id)
    {
        $count = count(static::find()->where(['twit_id' => "$twit_id"])->all());
        return $count;
    }
}
