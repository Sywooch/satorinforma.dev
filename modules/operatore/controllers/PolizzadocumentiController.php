<?php

namespace app\modules\operatore\controllers;

use app\models\ContactModel;
use app\models\ImmobiliContattoModel;
use app\models\PolizzaContattoDocumentiModel;
use app\models\PolizzaContattoModel;
use app\traits\FindModelTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;
use yii\web\UploadedFile;
use app\models\FileContainerModel;
use yii\widgets\ActiveForm;

/**
 * Class ClientController
 *
 * @package app\modules\admin\controllers
 */
class PolizzadocumentiController extends Controller
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
                'modelClass' => PolizzaContattoDocumentiModel::class,
                'forceCreate' => false,
            ],

        ];
    }

    public function actionIndex($id){
        $model = $this->findModel(PolizzaContattoModel::class, $id);
        $contattoModel = $this->findModel(ContactModel::class, $model->idcontatto);


        return $this->render('polizzadocs', [
            'model' => $model,
            'contattoModel' => $contattoModel,
        ]);
    }

    public function actionDelete($id){
        $model = $this->findModel(PolizzaContattoDocumentiModel::class, $id);

       /* $logs = new LogContattoModel();
        $logs->idcontatto=$model->contatto->id;
        $logs->idlogtype=4;
        $logs->operazione=3;
        $logs->iduser= Yii::$app->user->identity->id;
        $logs->save(false);*/

        $idPolizzaContatto = $model->polizzacontatto->idpolizza_contatto;
        $model->delete();


        return $this->redirect(['index','id' => $idPolizzaContatto]);
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


        $modelPolizzaContatto = $this->findModel(PolizzaContattoModel::class, $id);
        $contattoModel = $this->findModel(ContactModel::class, $modelPolizzaContatto->idcontatto);

        $model = new PolizzaContattoDocumentiModel();
        $model->idpolizza_contatto=$id;

        $modelFile= new FileContainerModel();


        if ($modelFile->load(Yii::$app->request->post())) {



                $modelFile->file_type=Yii::$app->request->post()['FileContainerModel']['file_type'];



                $documento = UploadedFile::getInstance($modelFile, 'file');
                if(isset($documento)) {




                    $modelFile->file = file_get_contents($documento->tempName);
                    $modelFile->file_ext = pathinfo($documento->name, PATHINFO_EXTENSION);
                    $modelFile->file_name=$documento->name;

                   if ($modelFile->save()) {

                        $model->idfile_container=$modelFile->idfile_container;
                    }else{
                       $modelFile->addError('file', $error = 'File obbligatorio');
                       //return ActiveForm::validate($modelFile);
                   }


                    $model->save(false);
                }







                //return $this->redirect(['view', 'id'=>$model->id]);

                //Yii::$app->session->setFlash('success', Yii::t('user', 'User has been created.'));

                return $this->redirect(['index', 'id'=>$model->idpolizza_contatto]);

        }else{
            $modelFile->addError('file', $error = 'File obbligatorio');
            //return ActiveForm::validate($modelFile);
        }

        return $this->render('create', [
            'model' => $model,
            'contattoModel' => $contattoModel,
            'modelFile' => $modelFile,
        ]);
    }


    public function actionOpendocs($idFile){
        $model = $this->findModel(FileContainerModel::class, $idFile);
      //  header("Content-type:application/".$model->file_ext);
        header("Content-Disposition:attachment;filename='".$model->file_name."'");


        $data="data:application/".$model->file_ext.";base64,".$model->file;
        $data=$model->file;
        echo $data;

    }


}
