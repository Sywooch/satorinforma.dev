<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * Class ClientModel
 *
 * @package  app\models;
 */
class ClientModel extends ActiveRecord
{
   public static function tableName()
       {
           return 'client';
       }

    public static function listData(){
       $arr=array();
       foreach (static::find()->select(['id', 'description'])->all() as $client){
            $arr[$client->id]=$client->description;
       }

       return $arr;
    }

    public static function getDescription($id){

        return (static::findOne(['id' => $id]))->description  ;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['description', 'mailfrom', 'adress' ,'cap' , 'master' ,'comune'], 'required'],
            ['mailfrom', 'unique', 'message' => Yii::t('client', 'This email address has already been taken.')],
            ['mailto', 'unique', 'message' => Yii::t('client', 'This email address has already been taken.')],
            ['subdomain', 'unique', 'message' => Yii::t('client', 'This email address has already been taken.')],
            ['subdomain', 'string', 'min' => 5],
            ['mailto', 'email'],
            ['mailto', 'string', 'max' => 255],
            ['mailfrom', 'email'],
            ['mailfrom', 'string', 'max' => 255],
            ['phone', 'string', 'max' => 50],
            ['cell', 'string', 'max' => 50],
        ], parent::rules());
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([
            'mailfrom' => Yii::t('client', 'Email di invio'),
            'description' => Yii::t('client', 'Ragione sociale/Nome cognome'),
            'adress' => Yii::t('client', 'Indirizzo'),
            'phone' => Yii::t('client', 'Telefono fisso'),
            'cell' => Yii::t('client', 'Telefono cellulare'),
            'pi' => Yii::t('client', 'Partita IVA'),
            'mailto' => Yii::t('client', 'Email di ricezione'),
        ], parent::attributeLabels());
    }

    /**
     * Create user
     *
     * @return UserModel|null the saved model or null if saving fails
     */
    public function createClient()
    {
        if ($this->validate()) {

            return $this->save() ? $this : null;
        }

        return null;
    }
    public function getComunep()
    {
        return $this->hasOne(ComuniModel::className(), [ 'id' => 'comune']);
    }

}

?>