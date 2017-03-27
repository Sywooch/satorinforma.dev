<?php

/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 27/12/2016
 * Time: 14:11
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>

<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-stats">
       <div class="icon"><i style="color:green;" class="fa fa-check-square-o "></i>
       </div>
       <div class="count"><?php echo $model->polizza->descrizione; ?></div>

       <h3><?php echo 'Stipulata il '. $model->date_from; ?></h3>
      <!-- <p>Lorem ipsum psdea itgum rixt.</p>-->
   </div>
</div>