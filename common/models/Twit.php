<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "twits".
 *
 * @property integer $id
 * @property string $text
 * @property string $image
 */
class Twit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'twits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'image' => 'Image',
        ];
    }
}