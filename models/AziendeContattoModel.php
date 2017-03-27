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

class AziendeContattoModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'aziende_contatto';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            ['idcontatto', 'integer'],
            ['idtipo_azienda', 'integer'],
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

            'idtipo_azienda' => 'Tipo azienda',
            'valore' => 'Valore',
            'idpercentuale' => 'Percentuale di proprietà',

        ], parent::attributeLabels());
    }


    public static function listData(){
        $arr=array();
        $arr =$model = Post::find()->asArray()->all();
        return $arr;
    }


    public function getTipoAzienda()
    {
        return $this->hasOne(TipoAziendaModel::className(), ['idtipo_azienda' => 'idtipo_azienda']);
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