<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 16/02/17
 * Time: 08:47
 */

namespace app\modules\operatore\controllers;

use yii\web\Controller;
use Yii;
use yii\helpers\Json;
use app\models\ComuniModel;
use app\models\ContactModel;

class AjaxController extends Controller
{
    public function actionSearchComune($term)
    {
        if (Yii::$app->request->isAjax) {

            $results = [];

            if (is_numeric($term)) {
                /** @var Tag $model */
                $model = ComuniModel::findOne(['id' => $term]);

                if ($model) {
                    $results[] = [
                        'id' => $model['id'],
                        'label' => $model['name'] . ' (model id: ' . $model['id'] . ')',
                    ];
                }
            } else {

                $q = addslashes($term);

                foreach(ComuniModel::find()->where("(`name` like '%{$q}%')")->andFilterWhere(['status'=>'Active'])->all() as $model) {
                    $results[] = [
                        'id' => $model['id'],
                        'label' => $model['name'] . ' (model id: ' . $model['id'] . ')',
                    ];
                }
            }

            echo Json::encode($results);
        }
    }

    public function actionSearchContact($term)
    {

        if (Yii::$app->request->isAjax) {



            $q = addslashes($term);

            foreach(ContactModel::find()->where("(`nome` like '%{$q}%')")->orWhere("(`cognome` like '%{$q}%')")->orWhere("(`id`  = '$q' )")->andFilterWhere(['idclient'=>1])->all() as $model) {
                $results[] = [
                    'id' => $model['id'],
                    'label' => $model['nome'] . ' '. $model['cognome'] . ' (codice fiscale : ' . $model['cf'] . ')',
                ];
            }

            echo Json::encode($results);
        }



    }
}