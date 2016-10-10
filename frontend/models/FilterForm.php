<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class FilterForm extends Model
{
    public $user;
    public $mode;
    
     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user'], 'integer'],
       //     ['mode', 'integer', 'allowArray' => true]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user' => 'User ID',
            'mode' => 'Mode',
        ];
    }

    
}

