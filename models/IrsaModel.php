<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 06/03/17
 * Time: 09:35
 */

namespace app\models;

use app\models\TipoAziendaModel;
use app\models\PercentualeModel;
use app\models\ContactModel;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class IrsaModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'irsaresult';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            ['idcontatto', 'integer'],
            ['jsonresult', 'safe'],
        ], parent::rules());

    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([

            'jsonresult' => '',
        ], parent::attributeLabels());
    }



    public function getArrayResult()
    {
        if(isset($this->jsonresult))
            return json_decode($this->jsonresult, TRUE);
        else
            return array();
    }

}