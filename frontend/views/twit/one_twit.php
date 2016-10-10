<?php

/* @var $this yii\web\View */


$image_src = $twit->getImage();
        

$this->title = 'One twit view';

?>
<div class="col-sm-8 col-sm-offset-1 blog-main">

          <div class="row">
          
           <div class="col-sm-6">
           <section class="blog-post">
                <div class="panel panel-default">
                  <img class="img-responsive" src="<?= $image_src ?>">
                  <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-primary"><?= $twit->getCategory() ?></span>
                      <p class="blog-post-date pull-right">Date</p>
                    </div>
                    <div class="blog-post-content">  
                      <img class="img-responsive" src="">
                      
                      <p><?= $twit->text ?></p>

                    
                      <a class="blog-post-share pull-right" href="#">
                        <i class="material-icons">&#xE80D;</i>
                      </a>
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
          </div>
          
              
</div><!-- /.blog-main --> 
</div>
 