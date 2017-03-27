<?php

namespace app\modules\operatore\models\search;

use app\models\ProvinceModel;
use yii\data\ActiveDataProvider;


/**
 * Class UserSearch
 *
 * @package app\modules\admin\models\search
 */
class ProvinceSearch extends ProvinceModel
{
    public $strflt;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            ['descr', 'string'],
            [['sigla',], 'string'],
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

        $query = ProvinceModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => ['descr' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'descr', $this->strflt])
            ->orFilterWhere(['like', 'sigla', $this->strflt]);

        return $dataProvider;
    }
}
