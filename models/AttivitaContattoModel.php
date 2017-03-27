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
use app\models\LogContattoModel;

class AttivitaContattoModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'attivita_contatto';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            ['idcontatto', 'integer'],
            ['idattivita', 'integer'],

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

            'idattivita' => 'Attivita',
        ], parent::attributeLabels());
    }


    public static function listData(){
        $arr=array();
        $arr =$model = Post::find()->asArray()->all();
        return $arr;
    }


    public function getAttivita()
    {
        return $this->hasOne(AttivitaModel::className(), ['idattivita' => 'idattivita']);
    }

    public function getContatto()
    {
        return $this->hasOne(ContactModel::className(), ['id' => 'idcontatto']);
    }

}