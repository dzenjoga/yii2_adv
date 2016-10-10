<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\TwitAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
 
TwitAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->language ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <?php $this->head() ?>
  </head>

  <body>
    <?php $this->beginBody() ?>
  
      
    <div class="navbar navbar-material-blog navbar-info navbar-absolute-top navbar-overlay">

      <div class="navbar-image" style="background-image: url('img/travel/unsplash-1.jpg');background-position: center 30%;"></div>

      <div class="navbar-wrapper container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= \yii\helpers\Url::to(['twit/feed'])?>"><i class="material-icons">&#xE871;</i>Twitter 2.0</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="active dropdown">
              <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Main menu <b class="caret"></b></a>
              <ul class="dropdown-menu">
<?php
if(Yii::$app->user->isGuest)
{
?>
                  
                  <li><a href="<?= \yii\helpers\Url::to(['user/login'])?>">Login</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['user/signup'])?>">Signup</a></li>
<?php
}
 else 
{
?>
                <li><a href="<?= \yii\helpers\Url::to(['twit/create-twit'])?>">Create new twit</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['twit/feed'])?>">Feed</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['user/logoff'])?>">Logoff</a></li>
<?php
}
?>
              </ul>
            </li>
            <li><a href="<?= \yii\helpers\Url::to(['twit/about'])?>">About</a></li>
            <li><a href="<?= \yii\helpers\Url::to(['twit/contact'])?>">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
              <?php
                                                            /*
                                                            NavBar::begin([
                                                                'brandLabel' => 'My Company',
                                                                'brandUrl' => Yii::$app->homeUrl,
                                                                'options' => [
                                                                    'class' => 'navbar-inverse navbar-fixed-top',
                                                                ],
                                                            ]);
                                                             
                                                           
                                                            $menuItems = [
                                                                ['label' => 'Home', 'url' => ['/site/index']],
                                                            ];  */
                                                            if (Yii::$app->user->isGuest) {
                                                                $menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];
                                                            } else {
                                                                $menuItems[] = '<li>'
                                                                    . Html::beginForm(['/user/logout'], 'post')
                                                                    . Html::submitButton(
                                                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                                                        ['class' => 'btn btn-link']
                                                                    )
                                                                    . Html::endForm()
                                                                    . '</li>';
                                                            }
                                                            echo Nav::widget([
                                                                'options' => ['class' => 'navbar-nav navbar-right'],
                                                                'items' => $menuItems,
                                                            ]);
                                                           // NavBar::end();
                                                            ?>  
              
          </ul>
        </div>
      </div>
    </div>


      
    <div class="container blog-content">

        
        
      <div class="row">

     
        
        
        
    <?= $content?>
        
        

        </div><!-- /.row -->

    </div><!-- /.container -->
      
      
      

    <footer class="blog-footer">

      <div id="links">
        <div class="container">
          <div class="row">
            <div class="col-sm-2">
            <i class="material-icons brand">&#xE871;</i>
            </div>

            <div class="col-sm-8 text-center offset">
              <ul class="list-inline">
                <li><a href="index.html">Home</a></li>
                <li><a href="page-about.html">About</a></li>
                <li><a href="doc-buttons.html">Documentation</a></li>
                <li><a href="page-contact.html">Contact</a></li>
              </ul>
            </div>

            <div class="col-md-2 text-right offset">
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </footer>
    <button class="material-scrolltop info" type="button"></button>
  
  <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>

