<?php

use yii\db\Migration;

class m161001_231150_twit_category extends Migration
{
 
    public function safeUp()
    {
        $this->addColumn( "{{%twits}}" , 'category_id' , $this->integer(2), 'AFTER user_id');
    }

    public function safeDown()
    {
          $this->dropColumn("{{%twits}}", 'category_id');
    }
   
}
