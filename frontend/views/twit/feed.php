<?php

/* @var $this yii\web\View */

$this->title = 'Feed view';

?>

<div class="col-sm-8 col-sm-offset-1 blog-main">

          <div class="row">
            <div class="col-sm-6">
<?php

//               var_dump($feed);
foreach ($feed as $a)
{  
?>
              <section class="blog-post">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="blog-post-meta">
                      <span class="label label-light label-primary">Topic</span>
                      <p class="blog-post-date pull-right">Date</p>
                    </div>
                    <div class="blog-post-content">
                      <a href="post-image.html">
                        <h2 class="blog-post-title"> <?= $a['image'] ?> </h2>
                      </a>
                      <p><?= $a['text'] ?></p>
                      <a class="btn btn-info" href="post-image.html">Read more</a>
                      <a class="blog-post-share pull-right" href="#">
                        <i class="material-icons">&#xE80D;</i>
                      </a>
                    </div>
                  </div>
                </div>
              </section><!-- /.blog-post -->
<?php
}
?>           
              
            </div>
          </div>

          <nav>
            <ul class="pager">
              <li><a class="withripple" href="#">Previous</a></li>
              <li><a class="withripple" href="#">Next</a></li>
            </ul>
          </nav>

</div><!-- /.blog-main --> 
 