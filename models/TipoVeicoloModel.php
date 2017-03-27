<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 06/03/17
 * Time: 09:34
 */

namespace app\models;


use yii\db\ActiveRecord;

class TipoVeicoloModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tipo_veicolo';
    }




    public static function listData(){
        $arr=array();


        $arr =$model = ParentelaModel::find()->asArray()->all();

        return $arr;
    }
}