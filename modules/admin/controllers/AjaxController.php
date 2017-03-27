<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 16/02/17
 * Time: 08:47
 */

namespace app\modules\admin\controllers;


use app\models\ComuniModel;
use yii\web\Controller;
use Yii;
use yii\helpers\Json;

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
}