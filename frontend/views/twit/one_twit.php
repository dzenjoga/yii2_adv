<?php

/* @var $this yii\web\View */

$this->title = 'One twit view';

?>
<div class="col-sm-8 col-sm-offset-1 blog-main">

          <div class="row">
          

              <section class="blog-post">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="blog-post-meta">
                      <span class="label label-light label-primary">Topic</span>
                      <p class="blog-post-date pull-right">Date</p>
                    </div>
                    <div class="blog-post-content">
                      <a href="post-image.html">
                        <h2 class="blog-post-title"> <?= $twit['image'] ?> </h2>
                      </a>
                      <p><?= $twit['text'] ?></p>
                      <a class="btn btn-info" href="post-image.html">Read more</a>
                      <a class="blog-post-share pull-right" href="#">
                        <i class="material-icons">&#xE80D;</i>
                      </a>
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
        
              
         
          </div>

          <nav>
            <ul class="pager">
              <li><a class="withripple" href="#">Previous</a></li>
              <li><a class="withripple" href="#">Next</a></li>
            </ul>
          </nav>

</div><!-- /.blog-main --> 
 