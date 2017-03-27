<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 06/03/17
 * Time: 09:35
 */

namespace app\models;

use app\models\TipoImmobileModel;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use app\models\PercentualeModel;
use app\models\ContactModel;

class ImmobiliContattoModel extends ActiveRecord
{

    public static function tableName()
    {
        return 'immobili_contatto';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            ['idcontatto', 'integer'],
            ['idtipo_immobile', 'integer'],
            ['valore', 'integer'],
            ['valore', 'required'],
            ['idpercentuale', 'integer'],
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

            'idtipo_immobile' => 'Tipo immobile',
            'valore' => 'Valore commerciale',
            'idpercentuale' => 'Percentuale di proprietà',

        ], parent::attributeLabels());
    }


    public static function listData(){
        $arr=array();
        $arr =$model = Post::find()->asArray()->all();
        return $arr;
    }


    public function getTipoImmobile()
    {
        return $this->hasOne(TipoImmobileModel::className(), ['idtipo_immobile' => 'idtipo_immobile']);
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