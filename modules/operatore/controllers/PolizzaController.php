<?php

namespace app\modules\operatore\controllers;

use app\models\ContactModel;
use app\models\ImmobiliContattoModel;
use app\models\PolizzaContattoModel;
use app\traits\FindModelTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;

/**
 * Class ClientController
 *
 * @package app\modules\admin\controllers
 */
class PolizzaController extends Controller
{
    use FindModelTrait;

    public $meseInizio ;
    public $annoInizio ;
    public $meseFine;
    public $annoFine;

    /**
     * @inheritdoc
     */
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
            'edit-client' => [
                'class' => EditableAction::class,
                'modelClass' => PolizzaContattoModel::class,
                'forceCreate' => false,
            ],

        ];
    }


    public function actionDelete($id){
        $model = $this->findModel(PolizzaContattoModel::class, $id);

       /* $logs = new LogContattoModel();
        $logs->idcontatto=$model->contatto->id;
        $logs->idlogtype=4;
        $logs->operazione=3;
        $logs->iduser= Yii::$app->user->identity->id;
        $logs->save(false);*/

        $idContatto = $model->idcontatto;
        $model->delete();


        return $this->redirect(['index','id' => $idContatto]);
    }

    /**
     * Creates a new user.
     *
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionCreate($id,$idpolizza=0)
    {
        $model = new PolizzaContattoModel();
        $model->idcontatto=$id;//::class, $id);
        $contattoModel = $this->findModel(ContactModel::class, $id);

        if($idpolizza==0){
            return $this->render('sceltapol', [
                'model' => $model,
                'contattoModel' => $contattoModel,
            ]);
        }else{


            //Scelto la polizza metto come data inizio la data di oggi
            $model->idpolizza=$idpolizza;
            $model->idcontatto=$id;
            $model->date_from=date("Y-m-d H:i:s");


            if ($model->save()) {
                return $this->redirect(['index', 'id' => $model->idcontatto]);
            }
            /*
            if (Yii::$app->request->post()){
                //Compongo il model
                $this->meseInizio=Yii::$app->request->post('meseInizio');
                $this->annoInizio=Yii::$app->request->post('annoInizio');
                $this->meseFine=Yii::$app->request->post('meseFine');
                $this->annoFine=Yii::$app->request->post('annoFine');

                $giornoInizio=1;

                $dataTmpInizio = $this->annoInizio * 10000 + $this->meseInizio * 100 + $giornoInizio;


                $format = 'Ymd';
                $dtInizio = \DateTime::createFromFormat($format, $dataTmpInizio);

                $model->date_from=$dtInizio->format('Y-m-d');
                if($this->meseFine!=null or $this->annoFine!=null ){
                    $dataTmpFine = $this->annoFine * 10000 + $this->meseFine * 100 + $giornoInizio;
                    $dtFine = \DateTime::createFromFormat($format, $dataTmpFine);
                    $model->date_to=$dtFine->format('Y-m-d');
                }

              $model->idpolizza=$idpolizza;
              $model->idcontatto=$id;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', Yii::t('client', 'Immobile creato correttamente.'));

                    $logs = new LogContattoModel();
                    $logs->idcontatto=$model->contatto->id;
                    $logs->idlogtype=4;
                    $logs->operazione=1;
                    $logs->iduser= Yii::$app->user->identity->id;
                    $logs->save(false);

                    return $this->redirect(['index','id' => $model->idcontatto]);
                }
            }else{
                $this->meseInizio=intval(date('m'));
                $this->annoInizio=date('Y');
            }*/

            $contattoModel = $this->findModel(ContactModel::class, $id);

            return $this->render('create', [
                'model' => $model,
                'contattoModel' => $contattoModel,
                'meseInizio' => $this->meseInizio,
                'annoInizio' => $this->annoInizio,
                'meseFine' => $this->meseFine,
                'annoFine' => $this->annoFine,
                'idpolizza' => $idpolizza,
            ]);
        }

    }

    /**
     * Creates a new user.
     *
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionIndex($id)
    {
        $contattoModel = $this->findModel(ContactModel::class, $id);



        return $this->render('index', [
            'idcontatto' => $id,
            'contattoModel' => $contattoModel
        ]);
    }

    /**
     * Creates a new user.
     *
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionList($id)
    {
        $contattoModel = $this->findModel(ContactModel::class, $id);

        $model = new PolizzaContattoModel();
        $model->idcontatto=$id;//::class, $id);


        return $this->render('sceltapol', [
            'model' => $model,
            'contattoModel' => $contattoModel,
        ]);
    }

    public function actionRevoca($id){
        $model = $this->findModel(PolizzaContattoModel::class, $id);
        $model->date_to=date("Y-m-d H:i:s");


        if ($model->save()) {
            return $this->redirect(['index', 'id' => $model->idcontatto]);
        }
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

        $model = $this->findModel(PolizzaContattoModel::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->save(false);

            $logs = new LogContattoModel();
            $logs->idcontatto=$model->contatto->id;
            $logs->idlogtype=4;
            $logs->operazione=2;
            $logs->iduser= Yii::$app->user->identity->id;
            $logs->save(false);

            Yii::$app->session->setFlash('success', Yii::t('client', 'Parentela salvata.'));

            return $this->redirect(['index','id' => $model->contatto->id]);
        }

        $contattoModel = $model->contatto;//findModel(ContactModel::class, $model->idcontatto);


        return $this->render('update', [
            'model' => $model,
            'contattoModel' => $contattoModel,
        ]);
    }


}
