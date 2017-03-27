<?php

namespace app\modules\operatore\controllers;

use app\models\AltriBeniContattoModel;
use app\models\AttivitaContattoModel;
use app\models\AziendeContattoModel;
use app\models\ContactModel;
use app\models\ImmobiliContattoModel;
use app\models\VeicoliContattoModel;
use app\traits\FindModelTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;
use app\models\LogContattoModel;

/**
 * Class ClientController
 *
 * @package app\modules\admin\controllers
 */
class AttivitaController extends Controller
{
    use FindModelTrait;

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
                'modelClass' => AttivitaContattoModel::class,
                'forceCreate' => false,
            ],

        ];
    }

    public function actionDelete($id){
        $model = $this->findModel(AttivitaContattoModel::class, $id);

        $logs = new LogContattoModel();
        $logs->idcontatto=$model->contatto->id;
        $logs->idlogtype=8;
        $logs->operazione=3;
        $logs->iduser= Yii::$app->user->identity->id;
        $logs->save(false);

        $idContatto = $model->contatto->id;
        $model->delete();

        //ContactController::calcoloRischi($idContatto);
        return $this->redirect(['index','id' => $idContatto]);
    }

    /**
     * Creates a new user.
     *
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new AttivitaContattoModel();
        $model->idcontatto=$id;//::class, $id);

       if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('client', 'Attività creata correttamente.'));

                $logs = new LogContattoModel();
                $logs->idcontatto=$model->contatto->id;
                $logs->idlogtype=8;
                $logs->operazione=1;
                $logs->iduser= Yii::$app->user->identity->id;
                $logs->save(false);

                return $this->redirect(['index','id' => $model->contatto->id]);
            }
        }

        $contattoModel = $this->findModel(ContactModel::class, $id);

        return $this->render('create', [
            'model' => $model,
            'contattoModel' => $contattoModel,
        ]);
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

        $model = $this->findModel(AttivitaContattoModel::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->save(false);

            $logs = new LogContattoModel();
            $logs->idcontatto=$model->contatto->id;
            $logs->idlogtype=8;
            $logs->operazione=2;
            $logs->iduser= Yii::$app->user->identity->id;
            $logs->save(false);

            Yii::$app->session->setFlash('success', Yii::t('client', 'Attivita salvata.'));

            return $this->redirect(['index','id' => $model->contatto->id]);
        }

        $contattoModel = $model->contatto;//findModel(ContactModel::class, $model->idcontatto);


        return $this->render('update', [
            'model' => $model,
            'contattoModel' => $contattoModel,
        ]);
    }


}
