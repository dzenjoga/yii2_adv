<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\models\Twits;
use yii\helpers\Url;
use common\models\User;

/*
 *  @var $this yii\web\View 
 * @var $this yii\web\View
 * @var $name string 
 * @var $message string 
 * @var $exception Exception 
 * @var $filter \frontend\models\FiletrForm
 **/

$this->title = 'Feed view';

$like_url = Url::to(['ajax/like']);

$this->registerJsFile('js/like.js', ['depends' => [yii\web\JqueryAsset::className()]]);   

//var_dump($authors);
$form = ActiveForm::begin([
    'id' => 'Filter-form',
    'options' => ['class' => 'form-vertical'],    
        ]);
?>
    <?= $form->field($filter, 'user')->dropDownList($users, ['prompt' => 'Все пользователи']) ?>
    <?= $form->field($filter, 'mode')->checkboxList(Twits::$modes) ?>
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<?php
ActiveForm::end();
?>

<div class="col-sm-8 col-sm-offset-1 blog-main">

          <div class="row">
            
<?php
//               var_dump($feed);
foreach ($feed as $a)
{  
    $twit_content = $a->getContent();
    $image_src = $a->getImage();
?>
 

            <div class="col-sm-6">
              <section class="blog-post">
                <div class="panel panel-default">
                  
                  <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-primary"><?= $a->getCategory() ?></span>
                      <p class="blog-post-date pull-right"><?= $a->time_publish ?></p>
                    </div>
                    <div class="blog-post-content">  
                     
                        
                      
                      
<?php
    if($twit_content->mode === common\models\Twits::MODE_BOTH){       
?>
                      <img class="img-responsive" src="<?= $image_src ?>">
                      <p><?= $twit_content->text ?></p>
<?php
    }
    if($twit_content->mode === common\models\Twits::MODE_TEXT){       
?>
                      <p><?= $twit_content->text ?></p>                      
<?php
    }
    if($twit_content->mode === common\models\Twits::MODE_IMAGE){       
?>
                      <img class="img-responsive" src="<?= $image_src ?>">
<?php
    }      
?>     
                      
                      <p><a class="btn btn-info" href=""> Author: <?= $a->user->username ?> </a></p>
                      
                      <a class="btn btn-info" href="<?= \yii\helpers\Url::to(['twit/one-twit','id' => $a->id]) ?>" >Read more</a>
                      
                      <a class="blog-post-share pull-right" href="#">
                        <i class="material-icons">&#xE80D;</i> 
                      </a>
                      
                      <button class="like-btn">
                          <i class="fa fa-heart" data-id =" <?= $a->id?>"> </i>
                      </button>
                     
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
            </div> 
          
<?php
}
?>           
          </div>

          <nav>
            <ul class="pager">
              <li><a class="withripple" href="#">Previous</a></li>
              <li><a class="withripple" href="#">Next</a></li>
            </ul>
          </nav>
</div><!-- /.blog-main --> 
 