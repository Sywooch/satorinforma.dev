<?php

namespace app\modules\admin\models\search;

use app\models\ClientModel;
use yii\data\ActiveDataProvider;

/**
 * Class UserSearch
 *
 * @package app\modules\admin\models\search
 */
class ClientSearch extends ClientModel
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','id'], 'integer'],
            [['description', 'subdomain'], 'safe'],
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
        $query = ClientModel::find();

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
            'master' => $this->master
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
