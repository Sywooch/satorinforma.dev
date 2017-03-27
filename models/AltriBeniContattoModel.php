<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 06/03/17
 * Time: 09:35
 */

namespace app\models;

use app\models\PercentualeModel;
use app\models\ContactModel;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class AltriBeniContattoModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'altribeni_contatto';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            ['idcontatto', 'integer'],
            ['descrizione', 'safe'],
            ['valore', 'integer'],

        ], parent::rules());

    }


    public function afterSave( $insert, $changedAttributes){
        $this->contatto->calcoloRischi();
    }

    public function afterDelete(){
        $this->contatto->calcoloRischi();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([

            'descrizione' => 'Descrizione',
            'valore' => 'Valore',


        ], parent::attributeLabels());
    }


    public static function listData(){
        $arr=array();
        $arr =$model = Post::find()->asArray()->all();
        return $arr;
    }


    public function getPercentuale()
    {
        return $this->hasOne(PercentualeModel::className(), ['idpercentuale' => 'idpercentuale']);
    }

    public function getContatto()
    {
        return $this->hasOne(ContactModel::className(), ['id' => 'idcontatto']);
    }

}