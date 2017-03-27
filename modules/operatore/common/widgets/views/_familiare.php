
<?php

/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 27/12/2016
 * Time: 14:11
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<li>
    <?php
    if($model->idcontattop!=null){
        $img = yii\helpers\Url::to('@web/uploads/'). $model->contattop->avatar;

    }else{
        $img = yii\helpers\Url::to('@web/uploads/default.png');

    }

    echo Html::img($img, ['alt'=>'Avatar', 'class'=>'avatar']) ?>
    <div class="message_date">
        <h3 class="date text-info">24</h3>
        <p class="month">May</p>
    </div>
    <div class="message_wrapper">
        <h4 class="heading"><?= $model->parentela->descrizione ?>


            </h4>
        <blockquote class="message"><?php
            if($model->idcontattop!=null){
                echo $model->contattop->cognome ." ".$model->contattop->nome;

            }else{
                echo "Nessun contatto associato";

            }

            ?></blockquote>
        <br />
        <p class="url">
            <!--<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
            <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>-->
        </p>
    </div>
</li>