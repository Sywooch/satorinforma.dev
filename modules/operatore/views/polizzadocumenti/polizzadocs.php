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

$this->title = Yii::t('immobile', 'Documenti');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo $this->render('../contact/_head', [
    'model' => $contattoModel,
]) ?>
<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Manutenzione Documenti Polizza </h3>
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

                        <?php echo Html::a(Yii::t('polizza', 'Torna alle polizze'), [Url::to(['polizza/index', 'id' => $contattoModel->id])], ['class' => 'btn btn-primary']) ?>
                        <?php echo Html::a(Yii::t('polizza', 'Inserisci documento'), [Url::to(['polizzadocumenti/create', 'id' => $model->idpolizza_contatto])], ['class' => 'btn btn-success']) ?>

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
                            'query' => \app\models\PolizzaContattoDocumentiModel::find()->andFilterWhere(['idpolizza_contatto'=>$model->idpolizza_contatto])->orderBy('data_creazione DESC' ),
                        ]);
                        echo GridView::widget([
                            'dataProvider' => $dataProvider,
                            'showFooter'=>true,
                            'showHeader' => true,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'Tipo',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        $dc=$model->documento;
                                        if($dc!=null)
                                        return $dc->tipoFile->descrizione;//$model->documento->filetype->descrizione;

                                    },
                                ],

                                [
                                    'attribute'=>'data_creazione',
                                    'label'=>'Data inserimento',
                                    'contentOptions' =>function ($model, $key, $index, $column){
                                        return ['class' => 'tbl_column_name'];
                                    },
                                    'content'=>function($data){
                                        return $data->data_creazione;
                                    }
                                ],


                                // 'isactive',

                                ['class' => 'yii\grid\ActionColumn', 'template' => '{delete} {pdf}',
                                    'buttons' => [
                                        'pdf' => function ($url, $model) {
                                            return Html::a('<i class="fa fa-file-pdf-o "></i>', [Url::to(['polizzadocumenti/opendocs', 'idFile' => $model->idfile_container])], ['class' => '', 'target'=>'_blank']);
                                            /*return Html::a('<span class="glyphicon glyphicon-open-file"></span>', $url, [
                                                'title' => Yii::t('app', 'Docs'),
                                            ]);*/
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