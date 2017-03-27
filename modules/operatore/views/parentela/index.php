<?php

use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii2mod\editable\EditableColumn;
use yii2mod\user\models\enumerables\UserStatus;
use app\models\ClientModel;
use yii\data\ActiveDataProvider;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\UserModelSearch */

$this->title = Yii::t('contact', 'Modifica parentela');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo $this->render('../contact/_head', [
    'model' => $contattoModel,
]) ?>
<!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modifica parentela</h3>
            </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <?php $form = ActiveForm::begin(['method' => 'get',
                    'fieldConfig' => [
                        'options' => [
                            'tag' => false,
                        ],
                    ]]); ?>
                <div class="input-group">
                    <span class="input-group-btn">
                    </span>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">

                            <?php echo Html::a(Yii::t('immobili', 'Torna alla scheda'), [Url::to(['contact/scheda', 'id' => $contattoModel->id])], ['class' => 'btn btn-primary']) ?>
    <?php echo Html::a(Yii::t('contact', 'Aggiungi familiare'), ['create',  'id' => $contattoModel->id], ['class' => 'btn btn-success']) ?>
    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 10000]); ?>
    <?php
    $template = <<< EOL
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
    {pager}
    </div>
    <div class="clearfix"></div>
    <div class="contact-index">
       {items}
    </div>
EOL;



    ?>


                            <?php




                            $dataProvider = new ActiveDataProvider([
                                'query' => \app\models\ParentelaContattoModel::find()->andFilterWhere(['idcontatto'=>$idcontatto]),
                            ]);
                            echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'showFooter'=>true,
                                'showHeader' => true,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'attribute'=>'idparentela',
                                        'label'=>'Grado partentela',
                                        'contentOptions' =>function ($model, $key, $index, $column){
                                            return ['class' => 'tbl_column_name'];
                                        },
                                        'content'=>function($data){

                                            return $data->parentela->descrizione;
                                        }
                                    ],
                                    [
                                        'attribute'=>'anni',
                                        'label'=>'Età',
                                        'contentOptions' =>function ($model, $key, $index, $column){
                                            return ['class' => 'tbl_column_name'];
                                        },
                                        'content'=>function($data){
                                            if($data->contattop!=null)
                                                return $data->contattop->age;
                                            else
                                                return $data->anni;
                                        }
                                    ],
                                    [
                                        'attribute'=>'idcontattop',
                                        'label'=>'Contatto selezionato',
                                        'contentOptions' =>function ($model, $key, $index, $column){
                                            return ['class' => 'tbl_column_name'];
                                        },
                                        'content'=>function($data){
                                            if($data->contattop!=null)
                                                return $data->contattop->cognome . ' ' . $data->contattop->nome .' ( ' . $data->contattop->cf. ' ) ';
                                        }
                                    ],

                                    // 'isactive',

                                    ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
                                ],
                            ]);

                            ?>


                            <?php Pjax::end(); ?>

<!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- /page content -->