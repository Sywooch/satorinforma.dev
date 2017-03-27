<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii2mod\user\models\UserModel as UM;
use yii\helpers\Html;
/**
 * Class UserModel
 *
 * @package app\models
 */
class UserModel extends UM
{
    /**
     * @var string newPassword - for creation user and changing password
     */
    public $newPassword;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['username', 'email', 'idclient'], 'required'],
            ['email', 'unique', 'message' => Yii::t('user', 'Indirizzo email già utilizzato.')],
            ['username', 'unique', 'message' => Yii::t('user', 'Username già in uso.')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['newPassword', 'string', 'min' => 6],
            ['newPassword', 'required', 'on' => 'createUser'],
        ], parent::rules());
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([
            'username' => Yii::t('user', 'Cognome Nome'),
            'idclient' => Yii::t('user', 'Cliente'),
            'email' => Yii::t('user', 'Email'),
            'createdAt' => Yii::t('user', 'Data creazione'),
            'newPassword' => $this->isNewRecord ? Yii::t('user', 'Password') : Yii::t('user', 'Nuova Password'),
        ],[]);
    }

    /**
     * Create user
     *
     * @return UserModel|null the saved model or null if saving fails
     */
    public function createUser()
    {

        //auth_assignment
        if ($this->validate()) {
            $this->setPassword($this->newPassword);
            $this->generateAuthKey();

            if($this->save()){
              //Creo record per abilitazione user
                $auth=new AuthModel();
                $auth->user_id=$this->id;
                $auth->item_name='user';
                $auth->save(false);
            }else{
                return null;
            }
            //return $this->save() ? $this : null;
        }else{

        }

        return null;
    }


    public function getImageTag(){
        if($this->avatar!=null) {
            $img="data:image/jpeg;base64,".base64_encode($this->avatar->file);
            echo Html::img($img, ['alt'=>'some', 'class'=>'img-circle profile_img']);
        }
    }


    public function getImageTagSmall(){
        if($this->avatar!=null) {
            $img="data:image/jpeg;base64,".base64_encode($this->avatar->file);
            echo Html::img($img, ['alt'=>'Immagine profilo', 'class'=>'']);
        }
    }

    public function getClient()
    {
        return $this->hasOne(ClientModel::className(), [ 'id' => 'idclient']);
    }

    public function getAuth()
    {
        return $this->hasOne(AuthModel::className(), [ 'user_id' => 'id']);
    }

    public function getAvatar()
    {
        return $this->hasOne(FileContainerModel::className(), [ 'idfile_container' => 'avatarid']);
    }


}
