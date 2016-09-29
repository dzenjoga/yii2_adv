<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       // 'css/site.css',
        'css/bootstrap/bootstrap.min.css',
        "css/libs/font-awesome.css",
	"css/libs/nanoscroller.css",
        "css/compiled/theme_styles.css",
        'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400',
        

        
        
    ];
    public $js = [
        "js/demo-rtl.js",
        "js/html5shiv.js",
        "js/respond.min.js",
        "js/demo-skin-changer.js",  
	"js/jquery.js",
	"js/bootstrap.js",
	"js/jquery.nanoscroller.min.js",	
	"js/demo.js", 
        "js/scripts.js",
        "js/demo-skin-changer.js",
	"js/jquery.js",
	"js/bootstrap.js",
	"js/jquery.nanoscroller.min.js",
	"js/demo.js",
	"js/scripts.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
