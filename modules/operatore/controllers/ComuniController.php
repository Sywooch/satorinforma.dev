<?php

namespace app\modules\operatore\controllers;

use app\models\ContactModel;
use app\modules\operatore\models\search\ContactSearch;
use app\modules\operatore\models\search\ProvinceSearch;
use app\traits\FindModelTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;
use yii\web\UploadedFile;

/**
 * Class UserController
 *
 * @package app\modules\admin\controllers
 */
class ComuniController extends Controller
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



    public function actionIndex($strinfo=''){
        $items = \app\models\ComuniModel::find()->orFilterWhere(['like', 'name', $strinfo.'%', false])->andFilterWhere(['status'=>'Active'])->asArray()->all();
        \Yii::$app->response->format = 'json';
        return $items;
    }

}
