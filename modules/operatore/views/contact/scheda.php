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
use yii\grid\GridView;

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
                    <h2>Scheda contatto <small>Creato il <?= html::encode($model->getFormattedDataCreazione()); ?> da <?= html::encode($model->userinserimento->username); ?>
                            Ultima modifica il <?= html::encode($model->getFormattedDataModifica()); ?> da <?= html::encode($model->usermodifica->username); ?></small></h2>
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
                            <?php
                            if($model->avatar!=null) {
                                $img="data:image/jpeg;base64,".base64_encode($model->avatar->file);
                                echo Html::img($img, ['alt'=>'some', 'class'=>'img-responsive avatar-view']);
                            } ?>
                        </div>
                      </div>
                      <h3><?= Html::encode($model->cognome); ?> <?= Html::encode($model->nome); ?></h3>
                        <p><?= Html::encode($model->cf); ?></p>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?= Html::encode($model->indirizzo); ?>, <?= Html::encode($model->cap); ?>  <?= Html::encode(ucfirst(strtolower($model->comune->name))); ?>, <?= Html::encode($model->comune->provincia->sigla); ?>
</li>
                          <li><i class="fa fa-genderless user-profile-icon"></i> <?php if(isset($model->sesso)){ echo Html::encode($model->sesso); } ?></li>
                        <li>
                            <i class="fa fa-child user-profile-icon"></i> <?= Html::encode($model->getFormattedDataNascita()); ?> ( <?= Html::encode($model->getAge()); ?> anni )
                        </li>
                          <li><i class="fa fa-briefcase user-profile-icon"></i> <?php if(isset($model->lavoro)){ echo Html::encode(ucfirst(strtolower($model->lavoro->descrizione))); } ?></li>
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
                      </ul>

                        <?php echo Html::a('<i class="fa fa-edit "></i> Gestione Polizze', [Url::to(['polizza/index', 'id' => $model->id])], ['class' => 'btn btn-success btn-block']); ?>
                        <?php echo Html::a('<i class="fa fa-edit "></i> Report HTML', [Url::to(['contact/html', 'id' => $model->id])], ['class' => 'btn btn-success btn-block']); ?>
                        <?php echo Html::a('<i class="fa fa-edit "></i> Report PDF', [Url::to(['contact/pdf', 'id' => $model->id])], ['class' => 'btn btn-success btn-block', 'target'=>'_blank']); ?>
                        <?php echo Html::a('<i class="fa fa-edit "></i> Log attività', [Url::to(['log/index', 'id' => $model->id])], ['class' => 'btn btn-success btn-block']); ?>

                        <br/>
                        <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                                <a><?= Html::encode($model->rating); ?></a>

                                <?php $cls="fa-star-o"; if($model->rating>=1) $cls="fa-star"; echo Html::a('<span class="fa '.$cls.'"></span>', [Url::to(['contact/rating', 'id' => $model->id, 'rating' => '1'])], ['class' => '']); ?>
                                <?php $cls="fa-star-o"; if($model->rating>=2) $cls="fa-star"; echo Html::a('<span class="fa '.$cls.'"></span>', [Url::to(['contact/rating', 'id' => $model->id, 'rating' => '2'])], ['class' => '']); ?>
                                <?php $cls="fa-star-o"; if($model->rating>=3) $cls="fa-star"; echo Html::a('<span class="fa '.$cls.'"></span>', [Url::to(['contact/rating', 'id' => $model->id, 'rating' => '3'])], ['class' => '']); ?>
                                <?php $cls="fa-star-o"; if($model->rating>=4) $cls="fa-star"; echo Html::a('<span class="fa '.$cls.'"></span>', [Url::to(['contact/rating', 'id' => $model->id, 'rating' => '4'])], ['class' => '']); ?>
                                <?php $cls="fa-star-o"; if($model->rating>=5) $cls="fa-star"; echo Html::a('<span class="fa '.$cls.'"></span>', [Url::to(['contact/rating', 'id' => $model->id, 'rating' => '5'])], ['class' => '']); ?>

                            </p>

                        </div>
                        <br/>
                      <br />

                      <!-- start skills -->
                      <h4>Indici di rischio</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Protezione del reddito</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $model->risk1*20 ;?>"></div>
                          </div>
                        </li>
                        <li>
                          <p>Protezione del patrimonio</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $model->risk2*20 ;?>"></div>
                          </div>
                        </li>
                        <li>
                          <p>Pianificazione del risparmio</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $model->risk3*20 ;?>"></div>
                          </div>
                        </li>
                        <li>
                          <p>Pianificazione della successione</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $model->risk4*20 ;?>"></div>
                          </div>
                        </li>
                      </ul>
                      <!-- end of skills -->
                        <br/><br/><br/><br/><br/>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <!--    <div class="profile_title">
                            <div class="col-md-6">
                              <h2>Polizza attiva</h2>
                            </div>
                            <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">

                              </div
                        </div>

                      </div>>-->
                       <div>
                           <?php if($model->getActivePolizza()) {
                               echo $this->render('_polizza', [
                                   'model' => $model->getActivePolizza(),
                               ]);
                           }else{
                               echo $this->render('_nopolizza', []);
                           }
                           ?>



                       </div>
                      <!-- start of user-activity-graph -->

                      <div id="" style="width:100%; height:280px;"></div>
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs " role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content0" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Situazione finanziaria</a>
                            </li>
                            <li role="presentation"><a href="#tab_content1" id="fami-tab" role="tab" data-toggle="tab" aria-expanded="true">Nucleo familiare</a>
                          </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="beni-tab2" data-toggle="tab" aria-expanded="false">Beni</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="attivita-tab2" data-toggle="tab" aria-expanded="false">Attività</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content4" role="tab" id="pensioni-tab2" data-toggle="tab" aria-expanded="false">Scheda pensionistica</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content5" role="tab" id="successione-tab2" data-toggle="tab" aria-expanded="false">Successione</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content6" role="tab" id="report-tab2" data-toggle="tab" aria-expanded="false">Storico report</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content0" aria-labelledby="personal-tab">

                                <table class="data table table-striped no-margin">
                                    <tr>
                                        <td>Anni contribuzione:</td>
                                        <td style="text-align: left;"><?php echo $model->annicontrib; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lavori diversi dall'attuale:</td>
                                        <td><?php echo $model->diversi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Reddito lordo annuo:</td>
                                        <td><?php echo $model->redditolordo; ?> &euro;</td>
                                    </tr>
                                    <tr>
                                        <td>Sbalzi di reddito:</td>
                                        <td><?php echo $model->sbalzi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Liquidità (in conto corrente o investimenti):</td>
                                        <td><?php echo $model->liquidita; ?> &euro;</td>
                                    </tr>
                                    <tr>
                                        <td>Debiti (mutui/finanziamenti/residui/ecc...):</td>
                                        <td><?php echo $model->debiti; ?> &euro;</td>
                                    </tr>
                                    <tr>
                                        <td>TFR maturato in azienda (solo se privato):</td>
                                        <td><?php echo $model->tfrmat; ?></td>
                                    </tr>
                                </table>

                            </div>
                          <div role="tabpanel" class="tab-pane fade " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                              <!-- inizio tabella immobili -->
                              <table class="data table table-striped no-margin">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th></th>
                                      <th>Grado parentela</th>
                                      <th>Contatto associato</th>
                                      <th>Età</th>
                                  </tr>
                                  </thead>
                                  <?php
                                  $cont=1;
                                  $arrimm = $model->getParenti();
                                  foreach ($arrimm as $familiare){
                                      echo "<tr>";
                                      echo "<td>$cont</td>";
                                      echo "<td>";

                                      if($familiare->idcontattop!=null){
                                          $familiare->contattop->getImageTagSmall();

                                      }else{
                                          $img = yii\helpers\Url::to('@web/uploads/default.png');

                                      }

                                     // echo Html::img($img, ['alt'=>'Avatar', 'class'=>'avatar']) ;
                                      echo "</td>";
                                      echo "<td>".$familiare->parentela->descrizione."</td>";
                                      echo "<td>";
                                           if($familiare->idcontattop!=null){
                                               echo $familiare->contattop->cognome ." ".$familiare->contattop->nome;

                                           }else{
                                               echo "Nessun contatto associato";

                                           }
                                      echo "</td>";
                                      echo "<td>".$familiare->anni."</td>";

                                      echo "</tr>";
                                      $cont++;

                                  }
                                  ?>
                                  </tbody>

                              </table>
                              <!-- fine tabella beni -->


                            <!-- end recent activity -->

                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                              <!-- inizio tabella immobili -->
                              <table class="data table table-striped no-margin">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Categoria</th>
                                      <th>Tipo</th>
                                      <th>Valore</th>
                                      <th>Percentuale proprietà</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                    $somma = 0;
                                  $arrimm = $model->getImmobili();
                                  $cont=1;
                                  foreach ($arrimm as $immobile){
                                      echo "<tr>";
                                      echo "<td>$cont</td>";
                                      echo "<td>Immobile</td>";
                                      echo "<td>".$immobile->tipoImmobile->descrizione."</td>";
                                      echo "<td>".$immobile->valore."</td>";
                                      echo "<td>".($immobile->percentuale)->percentualecol."</td>";
                                      echo "</tr>";
                                      $somma += ( $immobile->valore * $immobile->percentuale->percentualecol ) /100 ;
                                      $cont++;
                                  }
                                  ?>

                                  <?php

                                  $arrimm = $model->getAziende();
                                  foreach ($arrimm as $azienda){
                                      echo "<tr>";
                                      echo "<td>$cont</td>";
                                      echo "<td>Azienda</td>";
                                      echo "<td>".$azienda->tipoAzienda->descrizione."</td>";
                                      echo "<td>".$azienda->valore."</td>";
                                      echo "<td>".($azienda->percentuale)->percentualecol."</td>";
                                      echo "</tr>";
                                      $somma += ( $azienda->valore * $azienda->percentuale->percentualecol ) /100 ;
                                      $cont++;
                                  }
                                  ?>

                                  <?php

                                  $arrimm = $model->getVeicoli();
                                  foreach ($arrimm as $veicolo){
                                      echo "<tr>";
                                      echo "<td>$cont</td>";
                                      echo "<td>Veicolo</td>";
                                      echo "<td>".$veicolo->tipoVeicolo->descrizione."</td>";
                                      echo "<td>".$veicolo->valore."</td>";
                                      echo "<td>".($veicolo->percentuale)->percentualecol."</td>";
                                      echo "</tr>";
                                      $somma += ( $veicolo->valore * $veicolo->percentuale->percentualecol ) /100 ;
                                      $cont++;
                                  }
                                  ?>

                                  <?php

                                  $arrimm = $model->getAltriBeni();

                                  foreach ($arrimm as $bene){
                                      echo "<tr>";
                                      echo "<td>$cont</td>";
                                      echo "<td>Altri beni</td>";
                                      echo "<td>".$bene->descrizione."</td>";
                                      echo "<td>".$bene->valore."</td>";
                                      echo "<td></td>";
                                      echo "</tr>";
                                      $somma += $bene->valore;
                                      $cont++;
                                  }

                                  ?>


                                  </tbody>
                                  <tfoot>
                                  <tr>
                                      <td colspan="3" style="text-align:right;">Totale:</td>
                                      <td><?php echo $somma; ?></td>
                                      <td>

                                      </td>
                                  </tr>
                                  </tfoot>
                              </table>
                              <!-- fine tabella beni -->
                          </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <!-- inizio tabella attivita -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Attività</th>

                                    </tr>
                                    </thead>
                                    <?php
                                    $arrimm = $model->getAttivita();
                                    $cont=1;
                                    foreach ($arrimm as $attivita){
                                        echo "<tr>";
                                        echo "<td>$cont</td>";
                                        echo "<td>".$attivita->attivita->descrizione."</td>";

                                        echo "</tr>";
                                        $cont++;
                                    }
                                    ?>
                                    </tbody>

                                </table>
                                <!-- fine tabella beni -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                <!-- inizio tabella pensionistica -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>Età<!-- (SVILETAPEN)--></th>
                                        <th>Anno pensionamento<!-- (SVILANNPEN)--></th>
                                        <th>Modalità pensionamento<!-- (SVILTIPOPEN)--></th>
                                        <th>Anni contribuzione<!-- (SVILACTOTPEN)--></th>
                                        <th>Totale contribuzione<!--(SVILMESEACTOTPEN)--></th>
                                        <th>Importo<!-- (SVILIMPPEN)--></th>
                                        <th>Tipo calcolo<!-- (SVILCRITCALCOLO)--></th>
                                    </tr>
                                    </thead>
                                    <?php
                                    if($model->irsa!=null) {
                                        $arrimm = $model->irsa->getArrayResult();
                                        if(isset($arrimm['outputJson'])){
                                        $cont = count($arrimm['outputJson']['SVILIMPPEN']);
                                        for ($i = 0; $i < $cont; $i++) {
                                            echo "<tr>";
                                            echo "<td>" . $arrimm['outputJson']['SVILETAPEN'][$i] . "</td>";
                                            echo "<td>" . $arrimm['outputJson']['SVILANNPEN'][$i] . "</td>";
                                            echo "<td>" . $arrimm['outputJson']['SVILTIPOPEN'][$i] . "</td>";
                                            echo "<td>" . $arrimm['outputJson']['SVILACTOTPEN'][$i] . "</td>";
                                            echo "<td>" . $arrimm['outputJson']['SVILMESEACTOTPEN'][$i] . "</td>";
                                            echo "<td>" . $arrimm['outputJson']['SVILIMPPEN'][$i] . " &euro;</td>";
                                            echo "<td>" . $arrimm['outputJson']['SVILCRITCALCOLO'][$i] . "</td>";
                                            echo "</tr>";

                                        }
                                        }
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3" style="text-align:right;">Pensione di inabilità:</td>
                                        <td><?php if($model->irsa!=null and isset($arrimm['outputJson'])) echo $arrimm['outputJson']['IMPINABILITA']; ?> &euro;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align:right;">Pensione di invalidità:</td>
                                        <td><?php if($model->irsa!=null and isset($arrimm['outputJson'])) echo $arrimm['outputJson']['IMPINVALIDITA']; ?> &euro;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align:right;">Pensione superstiti:</td>
                                        <td><?php if($model->irsa!=null and isset($arrimm['outputJson'])) echo $arrimm['outputJson']['IMPINDIRETTA']; ?> &euro;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align:right;">Cassa appartenenza:</td>
                                        <td><?php if($model->irsa!=null and isset($arrimm['outputJson'])) echo $arrimm['outputJson']['CASSAAPPARTENENZA']; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    </tfoot>
                                </table>
                                <!-- fine tabella pensionistica -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                <!-- inizio tabella successione -->
                                <?php \app\modules\operatore\controllers\ContactController::tabellaSuccessioneScheda($model); ?>
                                <!-- fine tabella successione -->
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                                <!-- inizio tabella storico report -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>Utente</th>
                                        <th>Data ora produzione</th>

                                    </tr>
                                    </thead>
                                    <?php
                                    $arrimm = $model->getReport();
                                    $cont=1;
                                    foreach ($arrimm as $report){
                                        echo "<tr>";
                                        echo "<td>$cont</td>";
                                        echo "<td>";
                                     echo Html::a('<i class="fa fa-file-pdf-o "></i>', [Url::to(['contact/pdfs', 'idFile' => $report->idfile_container])], ['class' => '', 'target'=>'_blank']);
                                     echo "</td>";

                                        echo "<td>".$report->user->username."</td>";
                                        echo "<td>".$report->getFormattedDataCreazione()."</td>";
                                        echo "</tr>";
                                        $cont++;
                                    }
                                    ?>
                                    </tbody>

                                </table>
                                <!-- fine tabella storico report -->
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->