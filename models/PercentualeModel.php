<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 06/03/17
 * Time: 09:36
 */

namespace app\models;


use yii\db\ActiveRecord;

class PercentualeModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'percentuale';
    }




    public static function listData(){
        $arr=array();


        $arr =$model = ParentelaModel::find()->orderBy(['idpercentuale desc' => SORT_DESC])->asArray()->all();

        return $arr;
    }
}