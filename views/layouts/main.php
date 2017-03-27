<?php
/**
 * This is gentella layout, taken from index.html
 */

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Url;

\app\assets\MyAsset::register($this);

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content="Indosat - IP Allocation & Booking Management" />
        <?= Html::csrfMetaTags() ?>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title & Rest -->
        <title><?= Html::encode("Sator INFORMA"); ?></title>
        <?php $this->head() ?>

    </head>
    <body class="nav-md footer_fixed">
    <?php $this->beginBody() ?>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title">
                            <?php
                            $url = Url::home(true);
                            echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '50px', 'align' => '']) ?>
                            <span>Sator INFORMA</span>
                            <!--<i class="fa fa-paw"></i> --></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <!--<img src="images/img.jpg" alt="..." class="img-circle profile_img">-->
                            <?php
                                if(Yii::$app->user->isGuest==false)
                             Yii::$app->user->identity->getImageTag();
                            ?>
                        </div>
                        <div class="profile_info">
                            <span>Benvenuto,</span>
                            <h2><?php   if(Yii::$app->user->isGuest==false) echo Yii::$app->user->identity->username; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>OPERAZIONI</h3>



                            <ul class="nav side-menu">
                                <li><a href="/site/index"><i class="fa fa-home"></i> Home</span></a></li>
                                <?php
                                    if( Yii::$app->getUser()->can('admin')) {
                                        ?>
                                        <li><a><i class="fa fa-edit"></i> Administrator <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="/admin/client/index">Clienti</a></li>
                                                <li><a href="/admin/user/index">Utenti</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                            ?>
                                <li><a><i class="fa fa-desktop"></i> Contatti <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/operatore/contact/index">Cerca</a></li>
                                        <li><a href="/operatore/contact/create">Nuovo</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="chartjs.html">Chart JS</a></li>
                                        <li><a href="chartjs2.html">Chart JS2</a></li>
                                        <li><a href="morisjs.html">Moris JS</a></li>
                                        <li><a href="echarts.html">ECharts</a></li>
                                        <li><a href="other_charts.html">Other Charts</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="nav navbar-nav ">
                            <h1>
                            <?php
                            echo Yii::$app->user->identity->client->description;
                            ?>
                            </h1>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">


                                    <?php
                                    if(Yii::$app->user->isGuest==false)
                                    Yii::$app->user->identity->getImageTagSmall();
                                    ?><?php   if(Yii::$app->user->isGuest==false)echo Yii::$app->user->identity->username; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><?php echo Html::a(' Profilo', [Url::to(['profile/edit' ])], ['class' => '']); ?></li>

                                  <!--  <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>-->
                                    <li><?php echo Html::a('<i class="fa fa-sign-out pull-right"></i> Log Out', [Url::to(['site/logout' ])], ['class' => '']); ?></li>
                                </ul>
                            </li>

                           <!-- <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">

                                                 <?php
                                                 if(Yii::$app->user->isGuest==false) Yii::$app->user->identity->getImageTagSmall();
                                                 ?>
                                                </span>
                                            <span>
                          <span><?php   if(Yii::$app->user->isGuest==false) echo Yii::$app->user->identity->username; ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>-->
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <?php echo $content; ?>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Sator INFORMA <?php
                    $url = Url::home(true);
                    echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '25px', 'align' => '']) ?>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <?php $this->endBody() ?>



    </body>
</html>
<?php $this->endPage() ?>