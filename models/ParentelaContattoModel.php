<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\Setup;

/**
 * Class ClientModel
 *
 * @package  app\models;
 */
class ParentelaContattoModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'parentela_contatto';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            ['idcontattop', 'integer'],
            ['idparentela', 'integer'],
            ['acarico', 'integer'],
            ['anni','anniVerifica', 'skipOnEmpty'=>false, 'skipOnError'=>false],
           ], parent::rules());

    }

    public function afterSave( $insert, $changedAttributes){
        $this->contatto->calcoloRischi();
    }

    public function afterDelete(){
        $this->contatto->calcoloRischi();
    }


    public function beforeSave($insert)
    {
        if(is_null($this->anni)){
            $this->anni=0;
        }
        if (parent::beforeSave($insert)) {

            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([
            'idcontattop' => Yii::t('parentelacontatto', 'Contatto'),
            'idparentela' => Yii::t('parentelacontatto', 'Parentela'),
            'anni' => Yii::t('parentelacontatto', 'Età'),
            'acarico' => Yii::t('parentelacontatto', 'Familiare a carico'),

        ], parent::attributeLabels());
    }


    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }

    public function customValidation($attribute , $params)
    {

        $this->addError($attribute,'bla');
    }

    public function anniVerifica($attribute, $params)
    {


        if(empty($this->idcontattop) or is_null($this->idcontattop) or $this->idcontattop==NULL){
            if(is_null($attribute) or $attribute==NULL){
                $this->addError($attribute,'Età obbligatoria in mancanza di un contatto selezionato.');

            }else{

            }
        }
    }



    public function getParentela()
    {
        return $this->hasOne(ParentelaModel::className(), ['idparentela' => 'idparentela']);
    }

    public function getContatto()
    {
        return $this->hasOne(ContactModel::className(), ['id' => 'idcontatto']);
    }

    public function getContattop()
    {
        return $this->hasOne(ContactModel::className(), ['id' => 'idcontattop']);
    }

}

?>