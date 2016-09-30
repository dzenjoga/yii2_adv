<?php

use yii\db\Migration;

class m160930_115605_publish_time extends Migration
{

    public function safeUp()
    {
        $this->addColumn( "{{%twits}}" , 'time_publish' , $this->timestamp());
    }

    public function safeDown()
    {
          $this->dropColumn("{{%twits}}", 'time_publish');
    }
   
}
