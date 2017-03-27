<?php

namespace app\modules\operatore\controllers;

use app\models\ContactModel;
use app\models\FileContainerModel;
use app\models\LogContattoModel;
use app\modules\operatore\models\search\ContactSearch;
use app\traits\FindModelTrait;
use Mpdf\Mpdf;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;
use yii\web\UploadedFile;
use app\models\ReportContattoModel;



/**
 * Class UserController
 *
 * @package app\modules\admin\controllers
 */
class ContactController extends Controller
{
    use FindModelTrait;



    public function behaviors()
    {


        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get'],
                    'create' => ['get', 'post'],
                    'update' => ['get', 'post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'edit-user' => [
                'class' => EditableAction::class,
                'modelClass' => ContactModel::class,
                'forceCreate' => false,
            ],
            'index' => [
                'class' => 'yii2tech\admin\actions\Index',
                'newSearchModel' => function () {
                    return new ContactSearch();
                },
            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
                'findModel' => function ($id) {
                    return $this->findModel(ContactModel::class, $id);
                },
                'flash' => Yii::t('contact', 'Contact has been deleted.'),
            ],
        ];
    }

    /**
     * Creates a new user.
     *
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */

    public function actionCreate()
    {
        //$model = new UserModel(['scenario' => 'createUser']);
        $model = new ContactModel();

        $model->idclient=Yii::$app->user->identity->idclient;


        if ($model->load(Yii::$app->request->post())) {



            $model->utente_inserimento=Yii::$app->user->identity->id;
            $model->utente_modifica=Yii::$app->user->identity->id;
            //if ($model->createUser()) {
            if ($model->save()) {

                $image = UploadedFile::getInstance($model, 'image');


                if(isset($image)) {


                    $avatar= new FileContainerModel();
                    $avatar->file_type=1;
                    $avatar->file = file_get_contents($image->tempName);
                    $avatar->file_ext = pathinfo($image->name, PATHINFO_EXTENSION);
                    $avatar->file_name=$image->name;

                    if ($avatar->save()) {

                        $model->avatarid=$avatar->idfile_container;
                    }

                }else{
                    $model->avatarid=1;
                }


                $model->update(false);


                $model = $this->findModel(ContactModel::class, $model->id);
                $model->calcoloRischi();

                $logs = new LogContattoModel();
                $logs->idcontatto=$model->id;
                $logs->idlogtype=1;
                $logs->operazione=2;
                $logs->iduser= Yii::$app->user->identity->id;
                $logs->save(false);


                //return $this->redirect(['view', 'id'=>$model->id]);

                //Yii::$app->session->setFlash('success', Yii::t('user', 'User has been created.'));

                return $this->redirect(['scheda', 'id'=>$model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionIndici($id){
        $model = $this->findModel(ContactModel::class, $id);
        $model->calcoloRischi();
        return $this->redirect(['scheda', 'id'=>$model->id]);
    }

    public function actionRating($id, $rating){
        $model = $this->findModel(ContactModel::class, $id);
        $model->rating=$rating;
        $model->save(false);

        return $this->redirect(['scheda', 'id'=>$model->id]);
    }


    public static function tabellaSuccessione($model){
        //inserisco tabella
        $tbl1 = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        $tbl1a = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        $tbl2 = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        $tbl2a = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );

        switch ($model->categoriasuccessione) {
            case 1:
                $tbl1[1]="100%";
                $tbl1a[1]=number_format($model->patrimoniostimato,2,'.',',');
                break;
            case 2:
                $tbl1[1]="50%";
                $tbl1[2]="50%";
                $tmpVal=$model->patrimoniostimato / 2;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');
                $tbl1a[2]=number_format($tmpVal,2,'.',',');
                break;
            case 3:
                $tbl1[1]="33,33%";
                $tbl1[2]="66,66%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl1a[2]=number_format($tmpVal,2,'.',',');

                break;
            case 4:
                $tbl1[1]="66,66%";
                $tbl1[3]="33,3%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl1a[3]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');

                break;
            case 5:
                $tbl1[1]="66,66%";
                $tbl1[4]="33,33%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl1a[4]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');

                break;
            case 6:
                $tbl1[1]="66,66%";
                $tbl1[3]="25%";
                $tbl1[4]="8,33%";

                $tmpVal=($model->patrimoniostimato * 66.66 ) /100;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');
                $tmpVal=($model->patrimoniostimato * 25 ) /100;
                $tbl1a[3]=number_format($tmpVal,2,'.',',');
                $tmpVal = ($model->patrimoniostimato * 8.33 ) /100;
                $tbl1a[4]=number_format($tmpVal,2,'.',',');

                break;
            case 7:
                $tbl1[2]="100%";
                $tbl1a[2] = $model->patrimoniostimato;
                break;
            case 8:
                $tbl1[3]="100%";
                $tbl1a[3] = $model->patrimoniostimato;
                break;
            case 9:
                $tbl1[4]="100%";
                $tbl1a[4] = $model->patrimoniostimato;
                break;
            case 10:
                $tbl1[3]="50%";
                $tbl1[4]="50%";
                $tmpVal=$model->patrimoniostimato / 2;
                $tbl1a[3]=number_format($tmpVal,2,'.',',');
                $tbl1a[4]=number_format($tmpVal,2,'.',',');
                break;
            case 11:
                $tbl1[5]="100%";
                $tbl1a[5] = $model->patrimoniostimato;
                break;
        }

        switch ($model->sategoriasuccessione) {
            case 1:
                $tbl2[1]="50%";
                $tbl2[6]="50%";

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 2:
                $tbl2[1]="33,33%";
                $tbl2[2]="33,33%";
                $tbl2[6]="33,33%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                $tbl2a[2]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 3:
                $tbl2[1]="25%";
                $tbl2[2]="50%";
                $tbl2[6]="25%";

                $tmpVal=$model->patrimoniostimato / 4;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[2]=number_format($tmpVal,2,'.',',');

                break;
            case 4:
                $tbl2[1]="50%";
                $tbl2[3]="25%";
                $tbl2[6]="25%";

                $tmpVal=$model->patrimoniostimato / 4;
                $tbl2a[3]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                break;
            case 5:
                $tbl2[2]="50%";
                $tbl2[6]="50%";

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[2]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 6:
                $tbl2[2]="66,66%";
                $tbl2[6]="33,33%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl2a[2]=number_format($tmpVal,2,'.',',');
                break;
            case 7:
                $tbl2[3]="33,33%";
                $tbl2[6]="66,66%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl2a[3]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 8:
                $tbl1[6]="100%";

                $tbl1a[6]=$model->patrimoniostimato ;
                break;
        }

        $visCl = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        if($tbl1[1]!="" or $tbl1a[1]!="" or $tbl2[1]!="" or $tbl2a[1]!="") $visCl[1]="S";
        if($tbl1[2]!="" or $tbl1a[2]!="" or $tbl2[2]!="" or $tbl2a[2]!="") $visCl[2]="S";
        if($tbl1[3]!="" or $tbl1a[3]!="" or $tbl2[3]!="" or $tbl2a[3]!="") $visCl[3]="S";
        if($tbl1[4]!="" or $tbl1a[4]!="" or $tbl2[4]!="" or $tbl2a[4]!="") $visCl[4]="S";
        if($tbl1[5]!="" or $tbl1a[5]!="" or $tbl2[5]!="" or $tbl2a[5]!="") $visCl[5]="S";
        if($tbl1[6]!="" or $tbl1a[6]!="" or $tbl2[6]!="" or $tbl2a[6]!="") $visCl[6]="S";

        echo " <table width=\"100%\" style=\"text-align:center; margin:1px; font-family: 'catamaran'; font-size: 18px; \">";
        echo "<tr>";
        echo "<td  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:white;\"></td>";
        if( $visCl[1]=="S"){
            echo "<td  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">CONIUGE</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">FIGLI</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">ASCENDENTI</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">COLLATERALI</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">ALTRI PAR.</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">DISPONIBILITA'</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td rowspan=\"2\"  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">SENZA TESTAMENTO</td>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl1[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl1[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl1[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl1[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl1[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl1[6]."</td>";
        }
        echo "</tr>";
        echo "<tr>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[6]."</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td rowspan=\"2\"  valign=\"middle\" height=\"60px\" style=\" color:white; background-color:#95C123;\">QUOTE DI LEGGITTIMA</td>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl2[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl2[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl2[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl2[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl2[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl2[6]."</td>";
        }
        echo "</tr>";
        echo "<tr>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[6]."</td>";
        }
        echo "</tr>";
        echo "</table>";

    }


    public static function tabellaSuccessioneScheda($model){
        //inserisco tabella
        $tbl1 = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        $tbl1a = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        $tbl2 = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        $tbl2a = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );

        switch ($model->categoriasuccessione) {
            case 1:
                $tbl1[1]="100%";
                $tbl1a[1]=number_format($model->patrimoniostimato,2,'.',',');
                break;
            case 2:
                $tbl1[1]="50%";
                $tbl1[2]="50%";
                $tmpVal=$model->patrimoniostimato / 2;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');
                $tbl1a[2]=number_format($tmpVal,2,'.',',');
                break;
            case 3:
                $tbl1[1]="33,33%";
                $tbl1[2]="66,66%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl1a[2]=number_format($tmpVal,2,'.',',');

                break;
            case 4:
                $tbl1[1]="66,66%";
                $tbl1[3]="33,3%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl1a[3]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');

                break;
            case 5:
                $tbl1[1]="66,66%";
                $tbl1[4]="33,33%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl1a[4]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');

                break;
            case 6:
                $tbl1[1]="66,66%";
                $tbl1[3]="25%";
                $tbl1[4]="8,33%";

                $tmpVal=($model->patrimoniostimato * 66.66 ) /100;
                $tbl1a[1]=number_format($tmpVal,2,'.',',');
                $tmpVal=($model->patrimoniostimato * 25 ) /100;
                $tbl1a[3]=number_format($tmpVal,2,'.',',');
                $tmpVal = ($model->patrimoniostimato * 8.33 ) /100;
                $tbl1a[4]=number_format($tmpVal,2,'.',',');

                break;
            case 7:
                $tbl1[2]="100%";
                $tbl1a[2] = $model->patrimoniostimato;
                break;
            case 8:
                $tbl1[3]="100%";
                $tbl1a[3] = $model->patrimoniostimato;
                break;
            case 9:
                $tbl1[4]="100%";
                $tbl1a[4] = $model->patrimoniostimato;
                break;
            case 10:
                $tbl1[3]="50%";
                $tbl1[4]="50%";
                $tmpVal=$model->patrimoniostimato / 2;
                $tbl1a[3]=number_format($tmpVal,2,'.',',');
                $tbl1a[4]=number_format($tmpVal,2,'.',',');
                break;
            case 11:
                $tbl1[5]="100%";
                $tbl1a[5] = $model->patrimoniostimato;
                break;
        }

        switch ($model->sategoriasuccessione) {
            case 1:
                $tbl2[1]="50%";
                $tbl2[6]="50%";

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 2:
                $tbl2[1]="33,33%";
                $tbl2[2]="33,33%";
                $tbl2[6]="33,33%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                $tbl2a[2]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 3:
                $tbl2[1]="25%";
                $tbl2[2]="50%";
                $tbl2[6]="25%";

                $tmpVal=$model->patrimoniostimato / 4;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[2]=number_format($tmpVal,2,'.',',');

                break;
            case 4:
                $tbl2[1]="50%";
                $tbl2[3]="25%";
                $tbl2[6]="25%";

                $tmpVal=$model->patrimoniostimato / 4;
                $tbl2a[3]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[1]=number_format($tmpVal,2,'.',',');
                break;
            case 5:
                $tbl2[2]="50%";
                $tbl2[6]="50%";

                $tmpVal=$model->patrimoniostimato / 2;
                $tbl2a[2]=number_format($tmpVal,2,'.',',');
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 6:
                $tbl2[2]="66,66%";
                $tbl2[6]="33,33%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl2a[2]=number_format($tmpVal,2,'.',',');
                break;
            case 7:
                $tbl2[3]="33,33%";
                $tbl2[6]="66,66%";

                $tmpVal=$model->patrimoniostimato / 3;
                $tbl2a[3]=number_format($tmpVal,2,'.',',');
                $tmpVal = $tmpVal *2;
                $tbl2a[6]=number_format($tmpVal,2,'.',',');
                break;
            case 8:
                $tbl1[6]="100%";

                $tbl1a[6]=$model->patrimoniostimato ;
                break;
        }

        $visCl = array(0 => "",1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", );
        if($tbl1[1]!="" or $tbl1a[1]!="" or $tbl2[1]!="" or $tbl2a[1]!="") $visCl[1]="S";
        if($tbl1[2]!="" or $tbl1a[2]!="" or $tbl2[2]!="" or $tbl2a[2]!="") $visCl[2]="S";
        if($tbl1[3]!="" or $tbl1a[3]!="" or $tbl2[3]!="" or $tbl2a[3]!="") $visCl[3]="S";
        if($tbl1[4]!="" or $tbl1a[4]!="" or $tbl2[4]!="" or $tbl2a[4]!="") $visCl[4]="S";
        if($tbl1[5]!="" or $tbl1a[5]!="" or $tbl2[5]!="" or $tbl2a[5]!="") $visCl[5]="S";
        if($tbl1[6]!="" or $tbl1a[6]!="" or $tbl2[6]!="" or $tbl2a[6]!="") $visCl[6]="S";

        echo "<table class=\"data table table-striped no-margin\">";
        echo " <thead>";
        echo "<tr>";
        echo "<th></th>";
        if( $visCl[1]=="S"){
            echo "<th>CONIUGE</th>";
        }
        if( $visCl[2]=="S"){
            echo "<th>FIGLI</th>";
        }
        if( $visCl[3]=="S"){
            echo "<th>ASCENDENTI</th>";
        }
        if( $visCl[4]=="S"){
            echo "<th>COLLATERALI</th>";
        }
        if( $visCl[5]=="S"){
            echo "<th>ALTRI PAR.</th>";
        }
        if( $visCl[6]=="S"){
            echo "<th>DISPONIBILITA'</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td rowspan=\"2\"  valign=\"middle\" >SENZA TESTAMENTO</td>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl1[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl1[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl1[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl1[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl1[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl1[6]."</td>";
        }
        echo "</tr>";
        echo "<tr>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl1a[6]."</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td rowspan=\"2\"  valign=\"middle\" >QUOTE DI LEGGITTIMA</td>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl2[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl2[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl2[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl2[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl2[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl2[6]."</td>";
        }
        echo "</tr>";
        echo "<tr>";
        if( $visCl[1]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[1]."</td>";
        }
        if( $visCl[2]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[2]."</td>";
        }
        if( $visCl[3]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[3]."</td>";
        }
        if( $visCl[4]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[4]."</td>";
        }
        if( $visCl[5]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[5]."</td>";
        }
        if( $visCl[6]=="S"){
            echo "<td valign=\"middle\">".$tbl2a[6]."</td>";
        }
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";

    }

    public function actionHtml($id){
        $model = $this->findModel(ContactModel::class, $id);
        return $this->render('pdfhtml', [
            'model' => $model,
        ]);
    }
    public function actionPdf($id){

        $model = $this->findModel(ContactModel::class, $id);


        $namefile="report_".$id."_".date("Ymd");


        $return['id'] =  $model->id;


        //Produco pdf

        $html= $this->renderPartial('pdfhtml', [
            'model' => $model,
        ]);

        //['','A4','','',2,2,0,0,0,0]
        $param = [
            'mode' => '',
            'format' => 'A4',
            'default_font_size' => 0,
            'default_font' => '',
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
            'orientation' => 'P',
        ];
        $mpdf = new Mpdf($param);

        $mpdf->incrementFPR1 = 4;

        // Write some HTML code:
        $mpdf->debug = true;
        $mpdf->useSubstitutions=false;
        $mpdf->simpleTables = true;

       // $mpdf->SetProtection(array('print'));
       // $mpdf->SetTitle("Sator Informa - Report");
       // $mpdf->SetAuthor("Sator Informa");
        // $mpdf->SetWatermarkText("Paid");
        //$mpdf->showWatermarkText = true;
        //$mpdf->watermark_font = 'DejaVuSansCondensed';
        //$mpdf->watermarkTextAlpha = 0.1;
       // $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);

        $mpdf->Output('../runtime/pdf/'.$namefile.'.pdf','F');



        //Salvo sul DB
        $report=new FileContainerModel();
        $report->file_type=2;
        $report->file = file_get_contents('../runtime/pdf/'.$namefile.'.pdf');
        $report->file_ext = 'pdf';
        $report->file_name=$namefile;

        if ($report->save(false)) {
            $reportContatto= new ReportContattoModel();
            $reportContatto->idcontatto=$model->id;
            $reportContatto->iduser=Yii::$app->user->identity->id;
            $reportContatto->idfile_container=$report->idfile_container;
            $reportContatto->save(false);


        }

        unlink('../runtime/pdf/'.$namefile.'.pdf');


        $mpdf->Output();

      /*  $params=array();
        $params['content']='ciao';
        Yii::$app->mailer->compose('html', ['nomecognome' => 'ciso'])
            ->setFrom('gestione@dipendenteprotetto.esy.es')
            ->setTo($moduleForm->usermail)
            ->setSubject('Sator Informa invio report informativo' )
            ->attach('../runtime/pdf/'.$namefile.'.pdf')
            ->send();*/
        //ritorno
       // Yii::$app->response->format = Response::FORMAT_JSON;
       // return $return;

    }

    /**
     * Modifica parte economica.
     *
     * If update is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionFinanze($id)
    {
        $model = $this->findModel(ContactModel::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->calcoloRischi(true);

            $model->save();

            $logs = new LogContattoModel();
            $logs->idcontatto=$model->id;
            $logs->idlogtype=5;
            $logs->operazione=2;
            $logs->iduser= Yii::$app->user->identity->id;
            $logs->save(false);



            Yii::$app->session->setFlash('success', Yii::t('user', 'Modifiche salvate correttamente.'));

            return $this->redirect(['scheda', 'id'=>$model->id]);
        }

        return $this->render('finanze', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing user.
     *
     * If update is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel(ContactModel::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->utente_modifica=Yii::$app->user->identity->id;

            $image = UploadedFile::getInstance($model, 'image');



            if(isset($image)) {


                if(isset($model->avatar)){
                    $avatar=$model->avatar;
                }else{
                    $avatar=new FileContainerModel();
                }

                $avatar->file_type=1;
                $avatar->file = file_get_contents($image->tempName);
                $avatar->file_ext = pathinfo($image->name, PATHINFO_EXTENSION);
                $avatar->file_name=$image->name;

                if ($avatar->save()) {
                    $model->avatarid=$avatar->idfile_container;

                }

            }
            $model->update(false);

            $model = $this->findModel(ContactModel::class, $id);

            $model->calcoloRischi(true);


            $logs = new LogContattoModel();
            $logs->idcontatto=$model->id;
            $logs->idlogtype=1;
            $logs->operazione=2;
            $logs->iduser= Yii::$app->user->identity->id;
            $logs->save(false);


            Yii::$app->session->setFlash('success', Yii::t('user', 'User has been saved.'));

            return $this->redirect(['scheda', 'id'=>$model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Display usr shcede
     *
     * If update is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionScheda($id)
    {
        $model = $this->findModel(ContactModel::class, $id);

        if ($model->load(Yii::$app->request->post())) {

        }

        return $this->render('scheda', [
            'model' => $model,
        ]);
    }

    public function actionPdfs($idFile){
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename='report.pdf'");

        $model = $this->findModel(FileContainerModel::class, $idFile);
        $img="data:application/pdf;base64,".$model->file;
        echo $img;

    }


}
