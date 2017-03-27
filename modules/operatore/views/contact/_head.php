<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 17/02/17
 * Time: 09:21
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\admin\models\search\ClientStatus;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use app\modules\operatore\common\widgets\FamiliariList;


/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- page content -->



            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Scheda contatto <small>Creato il <?= html::encode($model->getFormattedDataCreazione()); ?></small></h2>

                      <div class="clearfix"></div>
                      <div class="btn-group">
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Scheda', [Url::to(['contact/scheda', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Anagrafica', [Url::to(['contact/update', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Situazione finanziaria', [Url::to(['contact/finanze', 'id' => $model->id])], ['class' => 'btn btn-primary']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Nucleo familiare', [Url::to(['parentela/index', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Immobili', [Url::to(['immobili/index', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Veicoli', [Url::to(['veicoli/index', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Aziende', [Url::to(['aziende/index', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Beni', [Url::to(['beni/index', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                          <?php echo Html::a('<i class="fa fa-edit m-right-xs"></i> Attività', [Url::to(['attivita/index', 'id' => $model->id])], ['class' => 'btn btn-primary ']); ?>
                      </div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                            <?php
                            $model->getImageTag();
                            ?>
                        </div>
                      </div>

                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">

                        <div class="col-md-6">
                            <h3><?= Html::encode($model->cognome); ?> <?= Html::encode($model->nome); ?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?= Html::encode($model->indirizzo); ?>, <?= Html::encode($model->cap); ?>  <?= Html::encode(ucfirst(strtolower($model->comune->name))); ?>, <?= Html::encode($model->comune->provincia->sigla); ?>
                                </li>

                                <li>
                                    <i class="fa fa-child user-profile-icon"></i> <?= Html::encode($model->getFormattedDataNascita()); ?> ( <?= Html::encode($model->getAge()); ?> anni )
                                </li>
                                <i class="fa fa-briefcase user-profile-icon"></i> <?php if(isset($model->lavoro)){ echo Html::encode(ucfirst(strtolower($model->lavoro->descrizione))); } ?>
                                </li>
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
                            </ul>
                        </div>
                          <div class="col-md-6">

                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->