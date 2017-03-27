<?php

namespace app\modules\admin\models\search;

use app\models\UserModel;
use yii\data\ActiveDataProvider;
use Yii;
use app\models\ClientModel;
/**
 * Class UserSearch
 *
 * @package app\modules\admin\models\search
 */
class UserSearch extends UserModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status','idclient'], 'integer'],
            [['username', 'email'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $idclient =Yii::$app->user->identity->idclient;

        $client= ClientModel::findOne(['id'=>$idclient]);

        if($client->master=="Y"){
            $query = UserModel::find();
        }else{
            $query = UserModel::find(['idclient'=>$idclient]);
        }

       // $query = UserModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'idclient' => $this->idclient,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
