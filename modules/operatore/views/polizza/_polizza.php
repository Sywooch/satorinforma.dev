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
<!-- price element -->
<div style="<?php if($contattoModel->redditolordo >= $model->redditoInf and $contattoModel->redditolordo <= $model->redditoSup) echo "border : 5px solid red;"; ?>" class="col-md-3 col-sm-6 col-xs-12">
    <div class="pricing">
        <div class="title">
            <h2><?= $model->descrizione; ?></h2>
            <h1><?php echo number_format($model->costo, 2, ',', '.'); ?> &euro; /mese</h1>
        </div>
        <div class="x_content">
            <div class="">
                <div class="pricing_features">
                    <ul class="list-unstyled text-left">
                        <?php
                        $arrimm = $model->descrizioni;
                        foreach ($arrimm as $desc){

                            if($desc->tipo){
                                echo "<li><i class=\"fa fa-check text-success\"></i> ".$desc->descrizione."</strong></li>";
                            }else{
                                echo "<li><i class=\"fa fa-check text-danger\"></i> ".$desc->descrizione."</strong></li>";
                            }

                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="pricing_footer">
                <?php echo Html::a('Seleziona', [Url::to(['polizza/create', 'id' => $contattoModel->id, 'idpolizza' => $model->idpolizza])], ['class' => 'btn btn-success btn-block', 'role'=>'button']); ?>


            </div>
        </div>
    </div>
</div>
<!-- price element -->