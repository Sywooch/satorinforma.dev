<?php

namespace app\modules\operatore\controllers;

use app\models\ContactModel;
use app\modules\operatore\models\search\ContactSearch;
use app\modules\operatore\models\search\LogSearch;
use app\modules\operatore\models\search\ProvinceSearch;
use app\traits\FindModelTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;
use yii\web\UploadedFile;
use app\models\LogContattoModel;
use yii\data\ActiveDataProvider;


/**
 * Class UserController
 *
 * @package app\modules\admin\controllers
 */
class LogController extends Controller
{
    use FindModelTrait;

    public function behaviors()
    {

        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get'],
                ],
            ],
        ];
    }


    public function actionIndex($id, $params=''){
        $contattoModel = $this->findModel(ContactModel::class, $id);
        $query = LogContattoModel::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => ['data_inserimento' => SORT_DESC],
            ],
        ]);

        //$this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/

          $query->andFilterWhere([
              'idcontatto' => $id,
          ]);

        /*$query->orFilterWhere(['like', 'nome', $this->strflt])
            ->orFilterWhere(['like', 'cognome', $this->strflt])
            ->orFilterWhere(['like', 'email', $this->strflt]);*/


        return $this->render('index', [
            'idcontatto' => $id,
            'dataProvider' => $dataProvider,
            'contattoModel' => $contattoModel
        ]);
    }


}
