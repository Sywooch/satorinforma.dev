<?php
/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 16/12/2016
 * Time: 10:27
 */
namespace app\assets;
use yii\web\AssetBundle;
class MyAsset extends AssetBundle
{
    //public $baseUrl = '@web';
    public $sourcePath = '@bower';

    //public $baseUrl = '@web';

  //  public $basePath = '@webroot';
    //public $baseUrl = '@web';

    public function init()
    {
        parent::init();
        // resetting BootstrapAsset to not load own css files
      //  Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
       //     'css' => []
        //];
    }

    public $css = [
        'gentelella/vendors/bootstrap/dist/css/bootstrap.min.css',
        'gentelella/vendors/font-awesome/css/font-awesome.css',
        //'gentelella/vendors/iCheck/skins/flat/green.css',
        //'gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
        'gentelella/build/css/custom.min.css'
    ];
    public $js = [
        //'gentelella/vendors/jquery/dist/jquery.min.js',
        'gentelella/vendors/bootstrap/dist/js/bootstrap.min.js',
        'gentelella/vendors/fastclick/lib/fastclick.js',
        'gentelella/vendors/nprogress/nprogress.js',
        'gentelella/vendors/Chart.js/dist/Chart.min.js',
        'gentelella/vendors/jquery-sparkline/dist/jquery.sparkline.min.js',
        'gentelella/vendors/raphael/raphael.min.js',
        'gentelella/vendors/morris.js/morris.min.js',
        'gentelella/vendors/gauge.js/dist/gauge.min.js',
        'gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
        'gentelella/vendors/skycons/skycons.js',
        'gentelella/vendors/Flot/jquery.flot.js',
        'gentelella/vendors/Flot/jquery.flot.pie.js',
        'gentelella/vendors/Flot/jquery.flot.time.js',
        'gentelella/vendors/Flot/jquery.flot.stack.js',
        'gentelella/vendors/Flot/jquery.flot.resize.js',
        'gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js',
        'gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js',
        'gentelella/vendors/flot.curvedlines/curvedLines.js',
        'gentelella/vendors/DateJS/build/date.js',
        'gentelella/vendors/moment/min/moment.min.js',
        'gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js',
        'gentelella/build/js/custom.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'\rmrevin\yii\fontawesome\AssetBundle',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $publishOptions = [];


}