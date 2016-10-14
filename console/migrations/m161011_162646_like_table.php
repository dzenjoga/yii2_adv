<?php

use yii\db\Migration;

class m161011_162646_like_table extends Migration
{
   public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%likes}}', [
            'twit_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->addPrimaryKey('PK_twitid-userid', "{{%likes}}", ['twit_id', 'user_id']);
        $this->createIndex("likes_userid", "{{%likes}}", "user_id");
        $this->createIndex("likes_twitid", "{{%likes}}", "twit_id");
        $this->addForeignKey("FK_likes_userid", "{{%likes}}","user_id", "{{%user}}", "id");
        $this->addForeignKey("FK_likes_twitid", "{{%likes}}","twit_id", "{{%twits}}", "id");
    }

    public function safeDown()
    {
        $this->dropPrimaryKey('PK_twitid-userid', "{{%likes}}");
        $this->dropForeignKey("FK_likes_userid", '{{%likes}}');
        $this->dropForeignKey("FK_likes_twitid", '{{%likes}}');
        $this->dropTable('{{%likes}}');
    }
  
}
