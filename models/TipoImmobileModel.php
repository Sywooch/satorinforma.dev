<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 06/03/17
 * Time: 09:33
 */

namespace app\models;




use yii\db\ActiveRecord;

class TipoImmobileModel extends ActiveRecord
{

    public static function tableName()
    {
        return 'tipo_immobile';
    }




    public static function listData(){
        $arr=array();


        $arr =$model = ParentelaModel::find()->asArray()->all();

        return $arr;
    }
}