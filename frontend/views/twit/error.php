<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="col-sm-8 col-sm-offset-1 blog-main">

          <div class="row">
            <div class="col-sm-6">

              <section class="blog-post">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="blog-post-meta">
                      <span class="label label-light label-primary">Error</span>
                      <p class="blog-post-date pull-right"></p>
                    </div>
                    <div class="blog-post-content">
                     
                     <h1><?= Html::encode($this->title) ?></h1>
                    <div class="alert alert-danger">
                        <?= nl2br(Html::encode($message)) ?>
                    </div>
                    <p>
                        The above error occurred while the Web server was processing your request.
                    </p>
                    <p>
                        Please contact us if you think this is a server error. Thank you.
                    </p>

                        
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
        
              
            </div>
          </div>

</div><!-- /.blog-main --> 
 



