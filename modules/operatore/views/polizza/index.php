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

$this->title = Yii::t('immobile', 'Immobile');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo $this->render('../contact/_head', [
    'model' => $contattoModel,
]) ?>
<!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manutenzione Polizze</h3>
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

                            <?php echo Html::a(Yii::t('polizza', 'Torna alla scheda'), [Url::to(['contact/scheda', 'id' => $contattoModel->id])], ['class' => 'btn btn-primary']) ?>
    <?php if($contattoModel->haveActivePolizza()==false) echo Html::a(Yii::t('polizza', 'Inserisci polizza'), ['list' , 'id' => $contattoModel->id], ['class' => 'btn btn-success']) ?>

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
                                'query' => \app\models\PolizzaContattoModel::find()->andFilterWhere(['idcontatto'=>$idcontatto])->orderBy('date_from DESC' ),
                            ]);
                            echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'showFooter'=>true,
                                'showHeader' => true,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    [
                                        'attribute' => 'Chiudi',
                                        'format' => 'raw',
                                        'value' => function ($model) {
                                            if($model->date_to==null)
                                                 return  Html::a('Revoca', [Url::to(['polizza/revoca', 'id' => $model->idpolizza_contatto])], ['class' => 'btn btn-primary']);
                                            else return '';
                                        },
                                    ],
                                    [
                                        'attribute'=>'idpolizza',
                                        'label'=>'Polizza stipulata',
                                        'contentOptions' =>function ($model, $key, $index, $column){
                                            return ['class' => 'tbl_column_name'];
                                        },
                                        'content'=>function($data){

                                            return $data->polizza->descrizione;
                                        }
                                    ],
                                    [
                                        'attribute'=>'date_from',
                                        'label'=>'Data inizio',
                                        'contentOptions' =>function ($model, $key, $index, $column){
                                            return ['class' => 'tbl_column_name'];
                                        },
                                        'content'=>function($data){
                                            return $data->date_from;
                                        }
                                    ],
                                    [
                                        'attribute'=>'date_to',
                                        'label'=>'Data scadenza',
                                        'contentOptions' =>function ($model, $key, $index, $column){
                                            return ['class' => 'tbl_column_name'];
                                        },
                                        'content'=>function($data){

                                            return $data->date_to;
                                        }
                                    ],

                                    // 'isactive',

                                    ['class' => 'yii\grid\ActionColumn', 'template' => '{delete} {docs}',
                                    'buttons' => [
                                'docs' => function ($url, $model) {

                                    $url= Url::to(['polizzadocumenti/index', 'id' => $model->idpolizza_contatto]);

                                    return Html::a('<span class="glyphicon glyphicon-open-file"></span>', $url, [
                                        'title' => Yii::t('app', 'Docs'),
                                    ]);
                                }
                            ],],
                                ],
                            ]);

                            ?>





<!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- /page content -->