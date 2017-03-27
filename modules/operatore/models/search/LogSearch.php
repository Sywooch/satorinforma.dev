<?php

namespace app\modules\operatore\models\search;

use app\models\LogContattoModel;
use app\modules\operatore\controllers\LogController;
use yii\data\ActiveDataProvider;
use app\models\ContactModel;
use app\models\ClientModel;
use yii;

/**
 * Class UserSearch
 *
 * @package app\modules\admin\models\search
 */
class LogSearch extends LogContattoModel
{
    public $strflt='';

    public function rules()
    {
        return [
            [['idcontatto'], 'required'],
            ['strflt', 'string'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public function search($id, $params)
    {
        /*
         * Condizioni di filtro per admin
         */


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

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

      /*  $query->andFilterWhere([
            'idlogtype' => $this->idlogtype,
            'iduser' => $this->iduser,
            'operazione' => $this->operazione,
        ]);*/

        /*$query->orFilterWhere(['like', 'nome', $this->strflt])
            ->orFilterWhere(['like', 'cognome', $this->strflt])
            ->orFilterWhere(['like', 'email', $this->strflt]);*/

        return $dataProvider;
    }
}
