<?php

namespace app\modules\operatore\models\search;

use yii\data\ActiveDataProvider;
use app\models\ContactModel;
use app\models\ClientModel;
use yii;

/**
 * Class UserSearch
 *
 * @package app\modules\admin\models\search
 */
class ContactSearch extends ContactModel
{
    public $strflt;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            ['strflt', 'string'],
            [['nome','cognome', 'email'], 'safe'],
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
        /*
         * Condizioni di filtro per admin
         */

        $idclient =Yii::$app->user->identity->idclient;

        $client= ClientModel::findOne(['id'=>$idclient]);


        $query = ContactModel::find();
        if($client->master=="Y"){

        }else{
            //$query = ContactModel::find(['idclient'=>$idclient]);
            $query->andFilterWhere([
                'idclient' => $idclient,
            ]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => ['cognome' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            //'id' => $this->id,
        ]);

        $query->orFilterWhere(['like', 'nome', $this->strflt])
            ->orFilterWhere(['like', 'cognome', $this->strflt])
            ->orFilterWhere(['like', 'email', $this->strflt]);


        return $dataProvider;
    }
}
