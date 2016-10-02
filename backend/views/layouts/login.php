<?php


/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AdminAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AdminAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
	 <?php $this->head() 
	//<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
?>
</head>
<body>
    <?php $this->beginBody() ?>
    
    


    
    
<div id="theme-wrapper">
    <header class="navbar" id="header-navbar">
	<div class="container">
            <a href="index.html" id="logo" class="navbar-brand">
					<img src="img/logo.png" alt="" class="normal-logo logo-white"/>
					<img src="img/logo-black.png" alt="" class="normal-logo logo-black"/>
					<img src="img/logo-small.png" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
            </a>
				
          <div class="clearfix">
				<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="fa fa-bars"></span>
				</button>
				
			
				
				<div class="nav-no-collapse pull-right" id="header-nav">
					<ul class="nav navbar-nav pull-right">

						<li class="hidden-xxs">
							<a class="btn">
								<i class="fa fa-power-off"></i>
							</a>
						</li>
					</ul>
				</div>
				</div>
			</div>
		</header>
		<div id="page-wrapper" class="container">
			<div class="row">
			
				<div id="content-wrapper">
					<div class="row">
						<div class="col-lg-12">
                                                    
                                                        <div class="wrap">
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
                                                                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                                                            } else {
                                                                $menuItems[] = '<li>'
                                                                    . Html::beginForm(['/site/logout'], 'post')
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

                                                            <div class="container">
                                                                <?= Breadcrumbs::widget([
                                                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                                                ]) ?>
                                                                <?= Alert::widget() ?>
                                                                <?= $content ?>
                                                            </div>
                                                        </div> 
							
							
						</div>
					</div>
					
					<footer id="footer-bar" class="row">
						<p id="footer-copyright" class="col-xs-12">
							Powered by Cube Theme.
						</p>
					</footer>
				</div>
			</div>
		</div>
	</div>
	
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>