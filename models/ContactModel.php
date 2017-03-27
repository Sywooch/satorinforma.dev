<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\Setup;
use app\models\ComuniModel;
use yii\helpers\Html;

/**
 * Class ClientModel
 *
 * @package  app\models;
 */
class ContactModel extends ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $image;


    public static function tableName()
       {
           return 'contact';
       }

    public function calcoloRischi($irsaCalcolo=false){
        // $contatto = ContactModel::findOne(['id'=>$id]);
        $contatto=$this;
        /*
        * Inizio con calcoli
        *
        */

        //rischi 0- 5
        /*
        * 0 assente
        * 1 basso
        * 2 medio
        * 3 medio alto
        * 4 alto
        * 5 altissimo
        */
        $riskLevel[1]=0; //PR
        $riskLevel[2]=0; //PP
        $riskLevel[3]=0; //PIR
        $riskLevel[4]=0; //PIS
        $patrimonioStimato=0;

        //Estraggo patrimonio


        $arrimm = $contatto->getImmobili();
        foreach ($arrimm as $immobile){
            $patrimonioStimato += ( $immobile->valore * $immobile->percentuale->percentualecol ) /100 ;
        }

        $arrimm = $contatto->getAziende();
        foreach ($arrimm as $azienda){
            $patrimonioStimato += ( $azienda->valore * $azienda->percentuale->percentualecol ) /100 ;
        }

        $arrimm = $contatto->getVeicoli();
        foreach ($arrimm as $veicolo){
            $patrimonioStimato += ( $veicolo->valore * $veicolo->percentuale->percentualecol ) /100 ;
        }

        $arrimm = $contatto->getAltriBeni();
        foreach ($arrimm as $bene){
            $patrimonioStimato += $bene->valore;
        }


        //Calcolo rischio
        if($contatto->annicontrib <5){
            //Altissimo
            $riskLevel[1]=5;
        }else{
            if($contatto->annicontrib>=6 && $contatto->annicontrib<20){

                $tmpCalcolo = $contatto->getAge() - $contatto->annicontrib;
                if($tmpCalcolo>35){
                    //Altissimo
                    $riskLevel[1]=5;
                }else{
                    if($tmpCalcolo>25 && $tmpCalcolo<=35){
                        //Alto rischio
                        $riskLevel[1]=4;
                    }else{
                        //Medio Alto
                        $riskLevel[1]=3;
                    }
                }
            }else{
                //Medio-Alto
                $riskLevel[1]=3;
            }
        }

        if($riskLevel[1]==3){
            //Diversi da lavoro dip
            //sbalzi reddito
            if($contatto->diversi=='Y'){
                $riskLevel[1]=4;
            }
            if($contatto->sbalzi=='Y'){
                $riskLevel[1]=4;
            }
        }

        if($riskLevel[1]==3){
            if($contatto->redditolordo<15000){
                $riskLevel[1]=4;
            }
            if($contatto->redditolordo>35000){
                $riskLevel[1]=2;
            }
            if($contatto->redditolordo>75000){
                $riskLevel[1]=1;
            }
        }

        //Fisso a altissimo
        $riskLevel[2]=5;

        //Fisso a altissimo => da completare
        $riskLevel[3]=5;



        //Familiari
        $haveChild=false;
        $numChild=0;
        $haveWife=false;
        $fratelli=false;
        $geninonni=false;


        $arrimm = $contatto->getParenti();
        foreach ($arrimm as $familiare){


            if($familiare->idparentela==1){
                //moglie
                $haveWife=true;
            }

            if($familiare->idparentela==3){
                //figli
                $haveChild=true;
                if($familiare->acarico==1){
                    $numChild++;
                }
            }

            if($familiare->idparentela==5){
                //moglie
                $fratelli=true;
            }

            if($familiare->idparentela==6){
                //moglie
                $geninonni=true;
            }

        }


        //Calcolo rischi
        //Rischio successione
        if($contatto->id_civile==1){
            //Se ha figli
            if($haveChild==true){
                $riskLevel[4]=5;
            }else{
                $riskLevel[4]=5;
            }
        }

        if($contatto->id_civile==2){
            //Se ha figli
            if($haveChild==true){
                $riskLevel[4]=3;
            }else{
                $riskLevel[4]=4;
            }
        }


        if($contatto->id_civile==3){
            //Se ha figli
            if($haveChild==true){
                $riskLevel[4]=3;
            }else{
                $riskLevel[4]=0;
            }
        }


        if($contatto->id_civile==4){
            //Se ha figli
            if($haveChild==true){
                $riskLevel[4]=3;
            }else{
                $riskLevel[4]=0;
            }
        }


        if($contatto->id_civile==5){
            //Se ha figli
            if($haveChild==true){
                $riskLevel[4]=5;
            }else{
                $riskLevel[4]=5;
            }
        }


        if($contatto->id_civile==6){
            //Se ha figli
            if($haveChild==true){
                $riskLevel[4]=3;
            }else{
                $riskLevel[4]=0;
            }
        }

        //debiti > liquidità
        if($contatto->debiti>=$contatto->liquidita){
            $riskLevel[4]=$riskLevel[4]+1;
            if($riskLevel[4]>5) $riskLevel[4]=5;
        }

        $scopeInv = array(0=>1, 1=>1 , 2=>	1 , 3=>	1, 4=>	1 , 5=>	0.93 ,6=>	0.92 ,7=>	0.91 ,8=>	0.9  ,9=>	0.88 ,10=>	0.86 ,11=>	0.85  ,12=>	0.83 ,13=>	0.81 ,14=>	0.8  ,15=>	0.79 ,16=>	0.78  ,17=>	0.77  ,18=>	0.75  ,19=>	0.73  ,20=>	0.72  ,21=>	0.7   ,22=>	0.68  ,23=>	0.66  ,24=>	0.65  ,25=>	0.64  ,26=>	0.63  ,27=>	0.61  ,28=>	0.6   ,29=>	0.58  ,30=>	0.57  ,31=>	0.56  ,32=>	0.55  ,33=>	0.53  ,34=>	0.52  ,35=>	0.5   ,36=>	0.47  ,37=>	0.45  ,38=>	0.43  ,39=>	0.41  ,40=>	0.38  ,41=>	0.34  ,42=>	0.3   ,43=>	0.26  ,44=>	0.22  ,45=>	0.19);
        $redditoFuturo=( $contatto->redditolordo * 0.62 );

        if($contatto->annicontrib>45) $contatto->annicontrib=45;
        if($contatto->annicontrib==null) $contatto->annicontrib=0;
        $redditoInvalidita=($contatto->redditolordo * (1 - $scopeInv[$contatto->annicontrib] ));
        if($haveWife==true){
            if($numChild==0){
                $redditoSuperstiti=( $redditoInvalidita * 60 ) / 100;
            }
            if($numChild==1){
                $redditoSuperstiti=( $redditoInvalidita * 80 ) / 100;
            }

            if($numChild>=2){
                $redditoSuperstiti= $redditoInvalidita ;
            }
        }else{
            if($numChild==0){
                $redditoSuperstiti=0;
            }
            if($numChild==1){
                $redditoSuperstiti=( $redditoInvalidita * 60 ) / 100;
            }

            if($numChild==2){
                $redditoSuperstiti=( $redditoInvalidita * 80 ) / 100;
            }
            if($numChild>=3){
                $redditoSuperstiti= $redditoInvalidita ;
            }
        }

        //Tabelle successione

        $patrimonioStimato+=$contatto->liquidita;
        $patrimonioStimato+=$contatto->tfrmat;
        $patrimonioStimato-=$contatto->debiti;

        $sategoriaSuccessione=0;

        if($haveWife==true){
            if($numChild==0){
                if($fratelli=='N'){
                    if($geninonni=='N'){
                        //Categoria 1
                        $categoriaSuccessione=1;
                        //Sategoria 1
                        $sategoriaSuccessione=1;
                    }else{
                        //Categoria 4
                        $categoriaSuccessione=4;
                        //Sategoria 4
                        $sategoriaSuccessione=4;
                    }

                }else{
                    if($geninonni=='N'){
                        //Categoria 5
                        $categoriaSuccessione=5;
                        //Sategoria 1
                        $sategoriaSuccessione=1;
                    }else{
                        //Categoria 6
                        $categoriaSuccessione=6;
                        //Sategoria 4
                        $sategoriaSuccessione=4;
                    }
                }
            }else{
                if($numChild==1){
                    //Categoria 2
                    $categoriaSuccessione=2;
                    //Sategoria 2
                    $sategoriaSuccessione=2;
                }else{
                    //Categoria 3
                    $categoriaSuccessione=3;
                    //Sategoria 3
                    $sategoriaSuccessione=3;
                }
            }

        }else{
            if($numChild==0){
                if($fratelli=='N'){
                    if($geninonni=='N'){
                        //Categoria 11
                        $categoriaSuccessione=11;
                        //Sategoria 8
                        $sategoriaSuccessione=8;
                    }else{
                        //Categoria 8
                        $categoriaSuccessione=8;
                        //Sategoria 7
                        $sategoriaSuccessione=7;
                    }

                }else{
                    if($geninonni=='N'){
                        //Categoria 9
                        $categoriaSuccessione=9;
                        //Sategoria 8
                        $sategoriaSuccessione=8;
                    }else{
                        //Categoria 10
                        $categoriaSuccessione=10;
                        //Sategoria 7
                        $sategoriaSuccessione=7;
                    }
                }
            }else{
                //Categoria 7
                $categoriaSuccessione=7;
                if($numChild==1){
                    //Sategoria 5
                    $sategoriaSuccessione=5;
                }else{
                    //Sategoria 6
                    $sategoriaSuccessione=6;
                }

            }

        }

        //Operazioni finali
        $contatto->risk1 =  $riskLevel[1];
        $contatto->risk2 =  $riskLevel[2];
        $contatto->risk3 =  $riskLevel[3];
        $contatto->risk4 =  $riskLevel[4];

        $contatto->sategoriasuccessione=$sategoriaSuccessione;
        $contatto->categoriasuccessione=$categoriaSuccessione;
        $contatto->fratelli=$fratelli;
        $contatto->geninonni=$geninonni;
        $contatto->wife=$haveWife;
        $contatto->numchild=$numChild;
        $contatto->redditofuturo=$redditoFuturo;
        $contatto->redditoinvalidita=$redditoInvalidita;
        $contatto->redditosupersiti=$redditoSuperstiti;
        $contatto->patrimoniostimato=$patrimonioStimato;

        //Chiamo IRSA
        if($irsaCalcolo){
            $curl = curl_init();
            $haveWifeSN="N";
            if($haveWife) $haveWifeSN="S";
            $from=\DateTime::createFromFormat('d/m/Y',$this->datanascita);

            $data="inputJson={
            \"DATANASC\": \"".$from->format('d-m-Y')."\",
            \"SESSO\": \"".$contatto->sesso."\",
            \"CONIUGATO\": \"".$haveWifeSN."\",
            \"ANNIDICONTRIBUZIONE_br1\": \"".$contatto->annicontrib."\",
            \"NUMEROFONDO_br1\": \"".$contatto->id_lavoro."\",
            \"ULTIMOREDDITO_br1\": \"".$contatto->redditolordo."\",
            \"TASSOREDDITI\": \"0\"
            }";

            $url="http://irsa1.irsa.it/IrsaAF/webresources/CalcolaPubblica";

            curl_setopt($curl, CURLOPT_POST, 1);

            if($data !== null) {
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data))
                );
            }
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $irsa = IrsaModel::findOne(['idcontatto' => $contatto->id]);
            if($irsa==null){
                $irsa=new IrsaModel();
            }
            $irsa->idcontatto = $contatto->id;
            $irsa->jsonresult=$result;
            $irsa->paramet=$data;
            $irsa->save(false);

        }

        $contatto->update(false);

    }

    public function curlToRestApi($method, $url, $data = null)
    {
        $curl = curl_init();

        // switch $method
        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);

                if($data !== null) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            // logic for other methods of interest
            // .
            // .
            // .

            default:
                if ($data !== null){
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        // Authentication [Optional]
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    public function upload()
    {

    //    echo "<br>Entra qui<br>";
    //    if ($this->validate()) {
     //       $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
     //       return true;
      //  } else {
      //      return false;
       // }
    }


    public static function listData(){
       $arr=array();


       $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }

    public function afterFind()
    {
        //PHP dates are displayed as dd/mm/yyyy
        //MYSQL dates are stored as yyyy-mm-dd

        if($this->datanascita!=""){
            $from=\DateTime::createFromFormat('Y-m-d',$this->datanascita);
            //print_r(\DateTime::getLastErrors());
            $this->datanascita=$from->format('d/m/Y');
        }


        parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['nome', 'cognome', 'email' , 'datanascita','comune_id', 'id_lavoro','sesso','id_civile','indirizzo', 'cf' , 'cap','phone','cell'], 'required'],
            ['email', 'email'],
            [['email'],'unique'],
           // [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['image'], 'safe'],
            [['diversi' , 'sbalzi'], 'safe'],
            [['annicontrib', 'redditolordo', 'liquidita', 'debiti' , 'tfrmat'], 'number'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['datanascita'], 'date', 'format' => 'php:d/m/Y'],
            //['datanascita', 'validateDateOfBirth'],
         ], parent::rules());
    }

    public function beforeSave($insert){
        $this->datanascita = \app\models\Setup::convert($this->datanascita,'date','d/m/Y');
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes){
        $from=\DateTime::createFromFormat('Y-m-d',$this->datanascita);

        $this->datanascita=$from->format('d/m/Y');
        return parent::afterSave($insert, $changedAttributes);

    }
    /*public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {
            echo $this->datanascita;

            $this->datanascita = \app\models\Setup::convert($this->datanascita,'date','d/m/Y');
            //return false;
            return true;
        } else {
            return false;
        }
        //$this->datanascita = Yii::$app->formatter->asDate($this->datanascita, 'yyyy-MM-dd');



    }*/

    public function validateDateOfBirth($attribute)
    {
        $dateTime = \DateTime::createFromFormat('d/m/Y', $this->$attribute);

        $errors = \DateTime::getLastErrors();
        if (!empty($errors['warning_count'])) {
            $this->addError($attribute, 'Data non valida');
        }else{
            print($dateTime);
            if($dateTime>=new \DateTime("NOW")){
                $this->addError($attribute, 'Data non valida');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([
            'mailfrom' => Yii::t('client', 'Email di invio'),
            'mailto' => Yii::t('client', 'Email di ricezione'),
            'image' => Yii::t('client', 'Immagine profilo'),
            'id_lavoro'=>Yii::t('client', 'Tipo lavoratore'),
            'indirizzo'=>Yii::t('client', 'Indirizzo residenza'),
            'id_civile'=>Yii::t('client', 'Stato civile'),
            'cell' => Yii::t('client', 'Cellulare'),
            'cf' => Yii::t('client', 'Codice fiscale'),
            'phone' => Yii::t('client', 'Telefono'),
            'annicontrib' => Yii::t('client', 'Anni contribuzione'),
            'diversi' => Yii::t('client', 'Lavori diversi dall\'attuale'),
            'redditolordo' => Yii::t('client', 'Reddito lordo annuo'),
            'sbalzi' => Yii::t('client', 'Sbalzi di reddito'),
            'liquidita' => Yii::t('client', 'Liquidità (in conto corrente o investimenti)'),
            'debiti' => Yii::t('client', 'Debiti (mutui/finanziamenti/residui/ecc...)'),
            'tfrmat' => Yii::t('client', 'TFR maturato in azienda (solo se privato)'),
            'comune_id' => Yii::t('client', 'Comune residenza'),
            'datanascita' => Yii::t('client', 'Data di nascita'),
        ], parent::attributeLabels());
    }

    /**
     * Create user
     *
     * @return UserModel|null the saved model or null if saving fails
     */
    public function createContact()
    {


        if ($this->validate()) {

           // $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $this->save() ? $this : null;
        }

        return null;
    }

    public function haveActivePolizza(){
        $count = PolizzaContattoModel::find()
            ->where(['date_to' => null, 'idContatto'=>$this->id])
            ->count();
        if($count>0) return true;
        return false;
    }

    public function getActivePolizza(){
        return PolizzaContattoModel::findOne(['date_to' => null, 'idContatto'=>$this->id]);
            //->where();
    }

    /**
     * Create user
     *
     * @return UserModel|null the saved model or null if saving fails
     */
    public function updateContact()
    {


        if ($this->validate()) {

            // $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $this->update() ? $this : null;
        }

        return null;
    }

    public function getComune()
    {
        return $this->hasOne(ComuniModel::className(), ['id' => 'comune_id']);
    }

    public function getLavoro()
    {
        return $this->hasOne(LavoroModel::className(), ['idtipolavoro' => 'id_lavoro']);
    }

    public function getParenti()
    {
       return $this->hasMany(ParentelaContattoModel::className(), ['idcontatto' => 'id'])->all();
    }

    public function getImmobili()
    {
        return $this->hasMany(ImmobiliContattoModel::className(), ['idcontatto' => 'id'])->all();
    }

    public function getAziende()
    {
        return $this->hasMany(AziendeContattoModel::className(), ['idcontatto' => 'id'])->all();
    }

    public function getVeicoli()
    {
        return $this->hasMany(VeicoliContattoModel::className(), ['idcontatto' => 'id'])->all();
    }

    public function getAltriBeni()
    {
        return $this->hasMany(AltriBeniContattoModel::className(), ['idcontatto' => 'id'])->all();
    }

    public function getAttivita()
    {
        return $this->hasMany(AttivitaContattoModel::className(), ['idcontatto' => 'id'])->all();
    }

    public function getReport()
    {
        return $this->hasMany(ReportContattoModel::className(), ['idcontatto' => 'id'])->all();
    }

    public function getStatoCivile()
    {
        return $this->hasOne(StatoCivileModel::className(), ['idstatocivile' => 'id_civile']);
    }

    public function getAvatar()
    {
        return $this->hasOne(FileContainerModel::className(), [ 'idfile_container' => 'avatarid']);
    }

    public function getIrsa()
    {
        return $this->hasOne(IrsaModel::className(), ['idcontatto' => 'id']);
    }

    public function getUserinserimento()
    {
        return $this->hasOne(UserModel::className(), [ 'id' => 'utente_inserimento']);
    }

    public function getUsermodifica()
    {
        return $this->hasOne(UserModel::className(), [ 'id' => 'utente_modifica']);
    }

    public function getClient()
    {
        return $this->hasOne(ClientModel::className(), [ 'id' => 'client_id']);
    }

    public function getFormattedDataNascita()
    {
        return $this->datanascita;//\DateTime::createFromFormat('Y-m-d', $this->datanascita)->format('d/m/Y');
    }
    public function getFormattedDataNascitaIRSA()
    {
        return \DateTime::createFromFormat('Y-m-d', $this->datanascita)->format('d-m-Y');
    }

    public function getFormattedDataCreazione()
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $this->data_creazione)->format('d/m/Y H:i:s');
    }

    public function getFormattedDataModifica()
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $this->data_modifica)->format('d/m/Y H:i:s');
    }

    public function getImageTag(){
        if($this->avatar!=null) {
            $img="data:image/jpeg;base64,".base64_encode($this->avatar->file);
            echo Html::img($img, ['alt'=>'some', 'class'=>'img-responsive avatar-view']);
        }
    }

    public function getImageTagSmall(){
        if($this->avatar!=null) {
            $img="data:image/jpeg;base64,".base64_encode($this->avatar->file);
            echo Html::img($img, ['alt'=>'some', 'class'=>'avatar']);
        }
    }

    public function getAge(){
        $tz  = new \DateTimeZone('Europe/Rome');

        $tmpOra= \DateTime::createFromFormat('d/m/Y', $this->datanascita);

        $now=new \DateTime('now', $tz);

        $diff= $tmpOra->diff($now);
        return $diff->y;

    }

}

?>