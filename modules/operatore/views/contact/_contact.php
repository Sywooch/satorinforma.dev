
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
<?php
if($index == 0) {


}
?>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
    <div class="well profile_view">
        <div class="col-sm-12">
            <h4 class="brief">

                <i><?php if(isset($model->lavoro)){ echo Html::encode(ucfirst(strtolower($model->lavoro->descrizione))); } ?></i></h4>
            <div class="left col-xs-7">
                <h2><?= Html::encode($model->cognome) ?> <?= Html::encode($model->nome) ?></h2>
                <p><strong<?= Html::encode($model->cf); ?></strong></p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker user-profile-icon"></i> <?= Html::encode($model->indirizzo); ?>, <?= Html::encode($model->cap); ?>  <?= Html::encode(ucfirst(strtolower($model->comune->name))); ?>, <?= Html::encode($model->comune->provincia->sigla); ?>
                    </li>
                    <li><i class="fa fa-genderless user-profile-icon"></i> <?php if(isset($model->sesso)){ echo Html::encode($model->sesso); } ?></li>
                    <li>
                        <i class="fa fa-child user-profile-icon"></i> <?= Html::encode($model->getFormattedDataNascita()); ?> ( <?= Html::encode($model->getAge()); ?> anni )
                    </li>
                    <li><i class="fa fa-child user-profile-icon"></i> <?php if(isset($model->id_civile)){ echo Html::encode(ucfirst(strtolower($model->statoCivile->descrizione))); } ?></li>
                    <li>
                        <i class="fa fa-phone user-profile-icon"></i> <?= Html::encode($model->phone); ?>
                    </li>
                    <li>
                        <i class="fa fa-mobile user-profile-icon"></i> <?= Html::encode($model->cell); ?>
                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-envelope user-profile-icon"></i>
                        <a href="mail:<?= Html::encode($model->email); ?>" ><?= Html::encode($model->email); ?></a>
                    </li>
                    <li>


                    </li>
                </ul>
            </div>
            <div class="right col-xs-5 text-center">
                <?php
                if($model->avatar!=null) {
                     $img="data:image/jpeg;base64,".base64_encode($model->avatar->file);
                      echo Html::img($img, ['alt'=>'some', 'class'=>'img-circle img-responsive', 'style'=>'min-height: 188px;']);
                } ?>
            </div>
        </div>
        <div class="col-xs-12 bottom text-center">
            <div class="col-xs-12 col-sm-6 emphasis">
                <p class="ratings">
                  <!--  <a><?= Html::encode($model->rating); ?></a>-->

                    <?php $cls="fa-star-o"; if($model->rating>=1) $cls="fa-star"; echo '<span class="fa '.$cls.'"></span>'; ?>
                    <?php $cls="fa-star-o"; if($model->rating>=2) $cls="fa-star"; echo '<span class="fa '.$cls.'"></span>'; ?>
                    <?php $cls="fa-star-o"; if($model->rating>=3) $cls="fa-star"; echo '<span class="fa '.$cls.'"></span>'; ?>
                    <?php $cls="fa-star-o"; if($model->rating>=4) $cls="fa-star"; echo '<span class="fa '.$cls.'"></span>'; ?>
                    <?php $cls="fa-star-o"; if($model->rating>=5) $cls="fa-star"; echo '<span class="fa '.$cls.'"></span>'; ?>



                </p>

            </div>
            <div class="col-xs-12 col-sm-6 emphasis">

                <!--<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                    </i> <i class="fa fa-comments-o"></i> </button>-->
                <?php if($model->haveActivePolizza()){
                    $url = Url::home(true);
                    echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '25px', 'align' => 'left']); }?>

                <?php echo Html::a('<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-user"> </i>Visualizza scheda </button>', ['scheda', 'id'=>$model->id], ['class' => '']) ?>


            </div>
        </div>
    </div>
</div>

<?php
if($index != 0 ) {

    if ($index % 3 == 2) {

        echo " <div class=\"clearfix visible-md visible-lg\"></div>";
    }
}
?>