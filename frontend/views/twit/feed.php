<?php

/* @var $this yii\web\View 
 * 
 * 
 * 
 *  */

$this->title = 'Feed view';
// <?= 
?>

<div class="col-sm-8 col-sm-offset-1 blog-main">

          <div class="row">
            
<?php

//               var_dump($feed);
foreach ($feed as $a)
{  
    $twit_content = $a->getContent();
    if($twit_content->mode === common\models\Twits::MODE_BOTH){
        
?>

            <div class="col-sm-6">
              <section class="blog-post">
                <div class="panel panel-default">
                  <img class="img-responsive" src="<?= $twit_content->image ?>">
                  <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-primary"><?= $a->getCategory() ?></span>
                      <p class="blog-post-date pull-right">Date</p>
                    </div>
                    <div class="blog-post-content">  
                      <img class="img-responsive" src="">
                      
                      <p><?= $twit_content->text ?></p>

                      <a class="btn btn-info" href="post-image.html">Read more</a>
                      <a class="blog-post-share pull-right" href="#">
                        <i class="material-icons">&#xE80D;</i>
                      </a>
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
            </div> 
<?php
    }
        if($twit_content->mode === common\models\Twits::MODE_TEXT){

?>
           <div class="col-sm-6">
              <section class="blog-post">
                <div class="panel panel-default">
            
                  <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-primary"><?= $a->getCategory() ?></span>
                      <p class="blog-post-date pull-right">Date</p>
                    </div>
                    <div class="blog-post-content">
                        
                      <p><?= $twit_content->text ?></p>
                      
                      <a class="btn btn-info" href="post-image.html">Read more</a>
                      <a class="blog-post-share pull-right" href="#">
                        <i class="material-icons">&#xE80D;</i>
                      </a>
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
            </div> 
              
<?php
    }
        if($twit_content->mode === common\models\Twits::MODE_IMAGE){
?>
            
             <div class="col-sm-6">
              <section class="blog-post">
                <div class="panel panel-default">
                  <img class="img-responsive" src="<?= $twit_content->image ?>">
                  <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-primary"><?= $a->getCategory() ?></span>
                      <p class="blog-post-date pull-right">Date</p>
                    </div>
                    <div class="blog-post-content">          
                 
                      <a class="btn btn-info" href="post-image.html">Read more</a>
                      <a class="blog-post-share pull-right" href="#">
                        <i class="material-icons">&#xE80D;</i>
                      </a>
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
            </div> 
       
            
<?php
        }
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
 