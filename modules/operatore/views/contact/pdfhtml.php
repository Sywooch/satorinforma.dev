<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$pages = array();
$pages[1]=true;
$pages[2]=true;
$pages[3]=true;
$pages[4]=true;
$pages[5]=true;
$pages[6]=true;
$pages[7]=true;
$pages[8]=true;
$pages[9]=true;
$pages[10]=true;
$pages[11]=true;
$pages[12]=true;
$pages[13]=true;
$pages[14]=true;

$url = Url::home(true);
setlocale(LC_MONETARY, 'it_IT');

?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
    <style>

    </style>
</head>
<body style="font-family: 'catamaran';">

<!-- Prima pagina -->
<?php if($pages[1]==true){ ?>
    <div style="background-color: #94f100; height:100%; font-family: 'catamaran';">
        <table style="width: 100%; height: 100%; text-align: center;" valign="middle">
            <tr>
                <td style="text-align : center;">

                    <table style="margin-top: 50px; text-align: center ; width: 80%; background-color: white; ">
                        <tr>
                            <td>
                                <p style="font-size: 18px; margin: 50px;">
                                    <b>Sator Informa :</b><br/>
                                    <?= Yii::$app->user->identity->client->description; ?><br/>
                                    <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?><br/>
                                    tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?><br/>
                                    email. <?= Yii::$app->user->identity->client->mailfrom; ?> <br/></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align : center;">
                    <p style="color: white; font-size: 30px; padding: 30px;">
                        <br/><br/><b>Chi sta</b><br/>
                        proteggendo finanziariamente <br/>
                        te e le persone che ami?</p>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo Html::img($url.'images/superhero.png', ['alt' => 'My logo', 'height' => '600', 'width' => '600']) ?>
                </td>
            </tr>
            <tr>
                <td style="text-align : center;">
                    <p style="color: white; font-size: 16px; padding: 30px; line-height: 18px">
                        <br/><span style="font-size:22px;">Q</span>UESTO REPORT CONTIENE TUTTE LE INFORMAZIONI PER<br/>
                        <span style="font-size:24px;">NON RIMANERE</span> <span style="font-size:28px;"><b>MAI</b></span>
                        <span style="font-size:24px;">SENZA SOLDI</span></p>
                </td>
            </tr>

        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Seconda pagina Benvenuto -->
<?php if($pages[2]==true){ ?>
    <div style="background-color: #94f100; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Benvenuto!</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                    Alcune cose che devi sapere su Sator Informa prima di accedere al tuo report personale
                    </span>

                </td>
            </tr>
        </table>
    </div>
    <br/>
    <div style="text-align:center;">
        <p style="color:#95c123; font-size:18px;">UN SERVIZIO INFORMATIVO PER LA TUA CONSAPEVOLEZZA</p>
    </div>
    <table width="100%" style="font-size: 18px; margin-left:20px; margin-right: 20px;" cellpadding="20">
        <tr>
            <td width="50%">
                <div style=" text-align: justify;"><p><span style="font-size:20px"><b>Sator Informa</b></span> è
                        un servizio informativo che ha l’unico scopo di <b>rendere i lavoratori
                            maggiormente consapevoli</b> di quali sono oggi le minacce che possono distruggere la loro
                        sicurezza economica e quella della loro famiglia.<br/><br/>È uno
                        <b>strumento di comunicazione tra l’intermediario assicurativo e il cliente.</b> Esso non
                        produce analisi di</p></div>
            </td>
            <td width="50%">
                <div style=" text-align: justify;"><p>sorta e non svolge alcuna prestazione a carattere
                        assicurativo/finanziario soggetta a regolamentazione o licenza o autorizzazione regolamentata da
                        IVASS o CONSOB.<br/><br/>
                        L’analisi e la proposta di soluzioni spetta esclusivamente agli intermediari regolarmente
                        iscritti al RUI e ai promotori finanziari regolarmente iscritti all’albo.</p></div>

            </td>
        </tr>
    </table>
    <!-- Indice -->
    <br/>
    <div style="background-color: #94f100; color: black ; width: 200px; text-align:right; ">
        <h1 style="padding-right: 20px;">Indice</h1>
    </div>
    <div>
        <ul style="list-style-type: none; font-size: 32px;">
            <li>
                <b style="color: #94f100; text-align:left;">3&nbsp;</b> Riepilogo dati inseriti
            </li>
            <li>
                <b style="color: #94f100; text-align:left;">4&nbsp;</b> Indici di rischio
            </li>
            <li>
                <b style="color: #94f100; text-align:left;">5&nbsp;</b> Protezione reddito
            </li>
            <li>
                <b style="color: #94f100; text-align:left;">7&nbsp;</b> Protezione patrimonio
            </li>
            <li>
                <b style="color: #94f100; text-align:left;">9&nbsp;</b> Pianificazione del risparmio
            </li>
            <li>
                <b style="color: #94f100; text-align:left;">11</b> Pianificazione della successione
            </li>
            <li>
                <b style="color: #94f100; text-align:left;">13</b> Note conclusive
            </li>
        </ul>
    </div>

    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Terza pagina Quanto sei esposto -->
<?php if($pages[3]==true){ ?>
   <div style="background-color: #D35A15; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/warning-sign.png', ['alt' => 'My logo', 'height' => '100', 'align' => 'left', 'margin' => '10']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Quanto sei esposto?</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                    Questi sono i fattori della tua vita personale e professionale che possono essere aggrediti dall’esterno in assenza di una protezione adeguata.
                    </span>

                </td>
            </tr>
        </table>
    </div>
    <br/>
    <div style="margin: 20px;">
        <table cellspacing="10">
            <tr>
                <td valign="middle">
                    <?php echo Html::img($url.'images/omino.png', ['alt' => 'My logo', 'height' => '60px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td>
                    <div>
                        <span style="color: #D35A15; font-family: 'catamaran'; ">CHI SEI:</span>
                        <ul>
                            <li><?php if(isset($model->lavoro)){ echo Html::encode(ucfirst(strtolower($model->lavoro->descrizione))); } ?> di <?= $model->getAge(); ?>  <?php if(isset($model->id_civile)){ echo Html::encode((strtolower($model->statoCivile->descrizione))); } ?> con <?php echo $model->annicontrib; ?> anni di contribuzione da lavoratore
                                dipendente
                            </li>
                            <?php if($model->fratelli){ echo "<li>Ha fratelli/sorelle</li>"; } ?>
                            <?php if($model->geninonni){ echo "<li>Ha genitori/nonni in vita</li>"; } ?>

                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle">
                    <?php echo Html::img($url.'images/mani.png', ['alt' => 'My logo', 'height' => '60px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td>
                    <div>
                        <span style="color: #D35A15; font-family: 'catamaran'; ">IL TUO NUCLEO FAMILIARE:</span>
                        <ul>
                        <?php

                        $arrimm = $model->getParenti();
                        foreach ($arrimm as $familiare){
                            echo "<li>";
                            echo Html::encode(ucfirst(strtolower($familiare->parentela->descrizione)))." di ".$familiare->anni;
                            if($familiare->acarico) echo " a carico."; else echo " non a carico.";
                            echo "</li>";
                        }
                        ?>


                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle">
                    <?php echo Html::img($url.'images/situazione finanziaria.png', ['alt' => 'My logo', 'height' => '60px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td>
                    <div>
                            <span
                                style="color: #D35A15; font-family: 'catamaran'; ">LA TUA SITUAZIONE FINANZIARIA:</span>
                        <ul>
                            <li>Reddito lordo: <?=  number_format($model->redditolordo, 2, ',', '.'); ?> &euro; <?php if($model->sbalzi=="S") echo " con "; else " senze "; ?> sbalzi di reddito negli anni passati</li>
                            <li>Liquidità : <?= number_format($model->liquidita, 2, ',', '.'); ?> &euro;</li>
                            <li>Mutui/finanziamenti/ecc. : <?= number_format($model->debiti, 2, ',', '.'); ?> &euro;</li>
                            <li>Tfr maturato in azienda : <?= number_format($model->tfrmat, 2, ',', '.'); ?> &euro;</li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle">
                    <?php echo Html::img($url.'images/icon.png', ['alt' => 'My logo', 'height' => '60px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td>
                    <div>
                        <span style="color: #D35A15; font-family: 'catamaran'; ">I TUOI BENI:</span>
                        <ul>
                            <?php
                            $arrimm = $model->getImmobili();
                            foreach ($arrimm as $immobile){
                                echo "<li>";
                                echo "Immobile ".Html::encode(ucfirst(strtolower($immobile->tipoImmobile->descrizione)));
                                echo " del valore commerciale pari a ".number_format($immobile->valore, 2, ',', '.'). " &euro; ";
                                echo "posseduta al ".($immobile->percentuale)->percentualecol."%";
                                echo "</li>";
                            }
                            ?>
                            <?php
                            $arrimm = $model->getAziende();
                            foreach ($arrimm as $azienda){
                                echo "<li>";
                                echo "Azienda ".Html::encode(ucfirst(strtolower($azienda->tipoAzienda->descrizione)));
                                echo " del valore pari a ".number_format($azienda->valore, 2, ',', '.'). " &euro; ";
                                echo "posseduta al ".($azienda->percentuale)->percentualecol."%";
                                echo "</li>";
                            }
                            ?>
                            <?php
                            $arrimm = $model->getVeicoli();
                            foreach ($arrimm as $veicolo){
                                echo "<li>";
                                echo "Veicolo ".Html::encode(ucfirst(strtolower($veicolo->tipoVeicolo->descrizione)));
                                echo " del valore pari a ".number_format($veicolo->valore, 2, ',', '.'). " &euro; ";
                                echo "posseduta al ".($veicolo->percentuale)->percentualecol."%";
                                echo "</li>";
                            }
                            ?>
                            <?php
                            $arrimm = $model->getAltriBeni();
                            foreach ($arrimm as $bene){
                                echo "<li>";
                                echo Html::encode(ucfirst(strtolower($bene->descrizione)));
                                echo " del valore pari a ".number_format($bene->valore, 2, ',', '.'). " &euro; ";
                                echo "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle">
                    <?php echo Html::img($url.'images/famiglia.png', ['alt' => 'My logo', 'height' => '60px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td>
                    <div>
                        <span style="color: #D35A15; font-family: 'catamaran'; ">LE TUE ABITUDINI:</span>
                        <ul>
                            <?php
                            $arrimm = $model->getAttivita();
                            foreach ($arrimm as $attivita){
                                echo "<li>";
                                echo Html::encode(ucfirst(strtolower($attivita->attivita->descrizione)));
                                echo "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
         <table style="padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Quarta pagina Indici di rischio -->
<?php if($pages[4]==true){ ?>
    <div style="background-color: #D42417; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/dynamite.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Indici di rischio</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                    I 4 problemi che devi di risolvere al più presto per costruire fondamenta solide e in grado sostenere la tua famiglia in caso di gravi imprevisti
                    </span>

                </td>
            </tr>
        </table>
    </div>
    <br/>
    <div style="margin: 0px;">
        <table style="width:100%; text-align: center;">
            <tr>
                <td colspan="3">
                    <span style="font-family: 'catamaran'; font-size: 20px; ">PROTEZIONE REDDITO</span>
                </td>
            </tr>
            <tr>
                <td WIDTH="20%" style="background-color: #E8ECC0;" valign="middle">
                    <?php echo Html::img($url.'images/coins.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td WIDTH="80%">
                    <div>

                        <?php echo Html::img($url.'images/'.$model->risk1.'.png', ['alt' => 'My logo', 'height' => '210px', 'align' => 'left', 'margin' => '10px']) ?>
                    </div>
                </td>
                <td WIDTH="20%" style="background-color: #E8ECC0;">
                    <?php echo Html::img($url.'images/angolo.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
            </tr>
        </table>
        <table style="width:100%; text-align: center;">
            <tr>
                <td colspan="3">
                    <span style="font-family: 'catamaran'; font-size: 20px; ">PROTEZIONE PATRIMONIO</span>
                </td>
            </tr>
            <tr>
                <td WIDTH="20%" style="background-color: #E8ECC0;" valign="middle">
                    <?php echo Html::img($url.'images/automobile-salesman.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td WIDTH="80%">
                    <div>

                        <?php echo Html::img($url.'images/'.$model->risk2.'.png', ['alt' => 'My logo', 'height' => '210px', 'align' => 'left', 'margin' => '10px']) ?>
                    </div>
                </td>
                <td WIDTH="20%" style="background-color: #E8ECC0;">
                    <?php echo Html::img($url.'images/angolo.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
            </tr>
        </table>
        <table style="width:100%; text-align: center;">
            <tr>
                <td colspan="3">
                    <span style="font-family: 'catamaran'; font-size: 20px; ">PIANIFICAZIONE RISPARMIO</span>
                </td>
            </tr>
            <tr>
                <td WIDTH="20%" style="background-color: #E8ECC0;" valign="middle">
                    <?php echo Html::img($url.'images/money1.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td WIDTH="80%">
                    <div>

                        <?php echo Html::img($url.'images/'.$model->risk3.'.png', ['alt' => 'My logo', 'height' => '210px', 'align' => 'left', 'margin' => '10px']) ?>
                    </div>
                </td>
                <td WIDTH="20%" style="background-color: #E8ECC0;">
                    <?php echo Html::img($url.'images/angolo.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
            </tr>
        </table>
        <table style="width:100%; text-align: center;">
            <tr>
                <td colspan="3">
                    <span style="font-family: 'catamaran'; font-size: 20px; ">PIANIFICAZIONE SUCCESSIONE</span>
                </td>
            </tr>
            <tr>
                <td WIDTH="20%" style="background-color: #E8ECC0;" valign="middle">
                    <?php echo Html::img($url.'images/give-money.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td WIDTH="80%">
                    <div>

                        <?php echo Html::img($url.'images/'.$model->risk4.'.png', ['alt' => 'My logo', 'height' => '210px', 'align' => 'left', 'margin' => '10px']) ?>
                    </div>
                </td>
                <td WIDTH="20%" style="background-color: #E8ECC0;">
                    <?php echo Html::img($url.'images/angolo.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
            </tr>
        </table>
    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Quinta pagina Protezione Reddito -->
<?php if($pages[5]==true){ ?>
    <div style="background-color: #95C123; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/health-insurance.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Protezione Reddito</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                   Le persone hanno bisogno di proteggere il reddito, ovvero le entrate che permettono loro di pagare il mutuo o l’affitto, fare la spesa, crescere i figli, divertirsi e accantonare risparmi per il futuro.                    </span>
                </td>
            </tr>
        </table>
    </div>
    <br/>
    <table>
        <tr>
            <td valign="middle">
                <?php echo Html::img($url.'images/shutterstock_193994486.png', ['alt' => 'My logo', 'width' => '280px', 'align' => '', 'margin' => '30px']) ?>
            </td>
            <td style="padding-left:25px; font-family: 'catamaran'; font-size: 16px; ">
                <span style="color: #053529; font-size: 18px;">La storia di Alberto e Marta</span><br/><br/>
                Alberto è sposato con Marta.<br/>
                Hanno due bei bambini – Leonardo e Giulia – di 5 e 8 anni.<br/><br/>
                <span style="color: #053529; font-size: 18px;"><b>Alberto</b> è il principale portatore di reddito</span>
                all’interno del nucleo familiare. Ha 35 anni e lavora come impiegato in un'azienda che produce materiali
                plastici.<br/>
                <span style="color: #053529; font-size: 18px;"><b>Marta</b>, invece, lavora part-time in un negozio di estetista.</span>
                È appena tornata al lavoro dopo i periodi di maternità trascorsi a casa per crescere i bambini.<br/>
                <br/>
                Gli imprevisti in grado di ridurre drasticamente - se non eliminare del tutto - le entrate di una famiglia
                come quella di Alberto sono tre:
                <br/>
                <b>
                    <ul>
                        <li>il decesso</li>
                        <li>una grave invalidità</li>
                        <li>una pensione di vecchiaia troppo bassa</li>
                    </ul>
                </b>
            </td>
        </tr>
    </table>
    <br/>
    <table width="100%"
           style="text-align:center; color:white; background-color:#CD171A; font-family: 'catamaran'; font-size: 16px; ">
        <tr>
            <td valign="middle" height="100px">
                COSA ACCADREBBE SE ALBERTO NON FOSSE PIU' IN GRADO DI PORTARE A CASA UNO STIPENDIO OGNI MESE A CAUSA DI UN
                <b>EVENTO GRAVE?</b>
            </td>
        </tr>
    </table>
    <br/>
    <div style="text-align:center; font-family: 'catamaran'; font-size: 16px; ">
        <b>Un vero e proprio terremoto si abbatterebbe su tutta la famiglia.</b><br/>
        Il misero stipendio da part-time non consentirebbe a Marta di mantenere due bambini piccoli.<br/>
        Lo scudo di sicurezza finanziaria si scioglierebbe come gelato a ferragosto.<br/>
        <br/>
        La domanda da porsi per proteggere adeguatamente il reddito è:
    </div>
    <br/><br/>
    <table width="100%"
           style="text-align:center; background-color:#CD171A; color:white; font-family: 'catamaran'; font-size: 16px; ">
        <tr>
            <td valign="middle" height="100px">
                QUALI SONO GLI IMPREVISTI CHE POSSONO ABBASSARE O ELIMINARE LE ENTRATE DELLA TUA FAMIGLIA?
            </td>
        </tr>
    </table>

    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Sesta pagina Vulnerabilità del tuo reddito -->
<?php if($pages[6]==true){ ?>
    <div style="background-color: #FDC300; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/stethoscope.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Vulnerabilità del tuo Reddito</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                   Questa analisi ti può dare un’idea immediata di quanto sia attaccabile dall’esterno il tuo reddito.
                        </span>
                </td>
            </tr>
        </table>
    </div>
    <br/><br/>
    <span style="color: #053529; font-size: 18px; margin-left: 25px;"><b>QUANTO E' VULNERABILE IL TUO REDDITO?</b></span>
    <br/><br/>
    <table cellpadding="20" width="100%" style="font-size: 18px;">
        <tr>
            <td style="background-color:#ebefc2;" width="70%">
                Il tuo reddito annuo è &euro; <?=  number_format($model->redditolordo, 2, ',', '.'); ?> lordi, che corrispondono a &euro; <?=  number_format(($model->redditolordo / 12), 2, ',', '.'); ?>/MESE, con <?=  $model->annicontrib; ?> anni di
                contributi versati finora:
            </td>
            <td style="padding-left:25px; font-family: 'catamaran'; font-size: 16px; " width="10%">
                &nbsp;
            </td>
            <td style="background-color:#ebefc2; text-align: center; padding-top: 20px;" valign="middle" width="20%">
                IL TUO REDDITO
            </td>
        </tr>
        <tr>
            <td style="" width="70%">
                Quando andrai in pensione, l’INPS probabilmente ti verserà ogni mese dai <b>€ <?php if($model->irsa!=null and isset($model->irsa->getArrayResult()['outputJson'])) echo  number_format($model->irsa->getArrayResult()['outputJson']['SVILIMPPEN'][0] /12 , 2, ',', '.'); ?> ai € <?php if($model->irsa!=null and isset($model->irsa->getArrayResult()['outputJson'])) echo  number_format($model->irsa->getArrayResult()['outputJson']['SVILIMPPEN'][count($model->irsa->getArrayResult()['outputJson']['SVILIMPPEN'])-1] /12 , 2, ',', '.'); ?></b>
                lordi.<br/>
                Avrai ricevuto la busta arancione con il calcolo della pensione futura, ma ti devo confidare una cosa: ci
                sono 3 opzioni di grande impatto che potrebbero modificare di molto la tua pensione:
                <br/>
                <b>
                    <ul>
                        <li>I tuoi redditi futuri</li>
                        <li>La crescita del PIL, perchè i contributi si rivalutano sulla base di questo parametro</li>
                        <li>Le aspettative future di vita delle persone</li>
                    </ul>
                </b>

            </td>
            <td style="padding-left:25px; font-family: 'catamaran'; font-size: 16px; " width="10%">
                &nbsp;
            </td>
            <td style="background-color:#ebefc2; text-align: center; padding-top: 20px;" valign="middle" width="20%">
                LA TUA PENSIONE<BR/><em>di vecchiaia lorda</em>
            </td>
        </tr>
        <tr>
            <td style="background-color:#ebefc2;" width="70%">
                Questa è solo una previsione a condizione che quando tu sarai in pensione, <span style="color:red;">ci siano abbastanza lavoratori a versare i contributi</span>
                per le pensioni future.
            </td>
            <td style="padding-left:25px; font-family: 'catamaran'; text-align: center; background-color:red; font-size: 16px; "
                width="10%">
                <?php echo Html::img($url.'images/warning-sign.png', ['alt' => 'My logo', 'height' => '100px', 'align' => '', 'margin' => '10px']) ?>
            </td>
            <td style="background-color:#ebefc2; text-align: center; padding-top: 20px;" valign="middle" width="20%">
                <span style="color: red;"><b>ATTENZIONE!</b></span>
            </td>
        </tr>

        <tr>
            <td style="" width="70%">
                Ma passiamo alle certezze: in caso di <span style="color: red;">gravi imprevisti</span> ecco cosa
                succederebbe:
                <br/>
                Quanto percepiresti mensilmente se tu dovessi rimanere invalido per infortunio o malattia ( dato non
                riportato all'interno della busta arancione ) :<br/>
                <br/><span style="text-align:center;"><b>&euro; <?php if($model->irsa!=null and isset($model->irsa->getArrayResult()['outputJson'])) echo  number_format($model->irsa->getArrayResult()['outputJson']['IMPINVALIDITA'] /12 , 2, ',', '.'); ?>/MESE</b></span>
            </td>
            <td style="padding-left:25px; font-family: 'catamaran'; font-size: 16px; " width="10%">
                &nbsp;
            </td>
            <td style="background-color:#ebefc2; text-align: center; padding-top: 20px;" valign="middle" width="20%">
                LA TUA PENSIONE<BR/>in caso di invalidità
            </td>
        </tr>
        <tr>
            <td style="" width="70%">
                Se invece dovessi venire a mancare, il tuo partner non riceverebbe nulla, mentre tuo figlio riceverebbe una
                pensione superstiti ( dato non riportato all'interno della busta arancione ) :<br/>
                <br/><span style="text-align:center;"><b>&euro; <?php if($model->irsa!=null and isset($model->irsa->getArrayResult()['outputJson'])) echo number_format($model->irsa->getArrayResult()['outputJson']['IMPINDIRETTA'] /12 , 2, ',', '.'); ?>/MESE</b></span>
            </td>
            <td style="padding-left:25px; font-family: 'catamaran'; font-size: 16px; " width="10%">
                &nbsp;
            </td>
            <td style="background-color:#ebefc2; text-align: center; padding-top: 20px;" valign="middle" width="20%">
                LA TUA PENSIONE<BR/>superstiti
            </td>
        </tr>
    </table>

    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Settima pagina Protezione patrimonio -->
<?php if($pages[7]==true){ ?>
    <div style="background-color: #005A9D; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/umbrella.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Protezione Patrimonio</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                  Una volta protetto il reddito è fondamentale proteggere il proprio patrimonio, i propri beni. L’obiettivo è quello di <b>NON</b> perdere quanto di buono hai messo da parte lavorando per una vita intera.
                        </span>
                </td>
            </tr>
        </table>
    </div>
    <br/>
    <div style="text-align: center">
        <div style="font-size: 20px;">
            Anche in questo caso, una soluzione progettata al millimetro, e sulla base delle esigenze della tua famiglia,
            può aiutarti a scongiurare enormi perdite di denaro.
        </div>
        <br/>
        <div style="font-size: 16px;">
            Una <span style="color:red;">copertura approssimativa</span>, invece, può rovesciare le carte in tavola a tuo
            svantaggio e mettere i tuoi cari in serio pericolo finanziario.
        </div>
        <br/><br/>
        <div style="font-size: 16px;">
            Basta pensare alle cifre che vengono chieste in risarcimento quando si arreca un danno ad altre persone o ai
            loro beni. Una famiglia con un patrimonio medio può perderlo dalla mattina alla sera se non è assicurata nel
            modo adeguato e per le cifre corrette.
        </div>
        <br/><br/>
        <div style="font-size: 16px;">
            Anche nella costruzione di questo <span style="color:green;">pezzo di fondamenta della protezione</span> devi
            rispondere a dei quesiti ben precisi.
        </div>
        <br/>
        <ul>
            <li>Quali sono gli imprevisti che possono spazzare via il tuo patrimonio?</li>
            <li>Quali sono le tue proprietà?</li>
            <li>Hai steso un elenco dei pericoli e delle attività che svolgi nella vita quotidiana e professionale?</li>
            <li>Quali responsabilità hai nell'esercizio di queste attività</li>
        </ul>
        <br/>
        <table width="100%"
               style="border: 10px solid white; text-align:center;  background-color:#ebefc2; font-family: 'catamaran'; font-size: 20px; ">
            <tr>
                <td colspan="4" valign="middle" height="100px">
                    Abbiamo individuato le <span style="color:red;"><b>4 aree di rischio</b></span> che possono portare via
                    tutto il tuo patrimonio presente e futuro:
                </td>
            </tr>
        </table>
        <table width="100%" CELLSPACING="20px" style="text-align:center;  font-family: 'catamaran'; font-size: 24px; ">

            <tr>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Beni</b></td>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Veicoli</b></td>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Attività</b></td>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Animali</b></td>
            </tr>

            <tr>
                <td width="20%"
                    style="background-color: #ebefc2;"><?php echo Html::img($url.'images/icon.png', ['alt' => 'My logo', 'height' => '100px', 'align' => '', 'margin' => '10px']) ?></td>
                <td width="20%"
                    style="background-color: #ebefc2;"><?php echo Html::img($url.'images/sports-car.png', ['alt' => 'My logo', 'height' => '100px', 'align' => '', 'margin' => '10px']) ?></td>
                <td width="20%"
                    style="background-color: #ebefc2;"><?php echo Html::img($url.'images/family-group-of-.png', ['alt' => 'My logo', 'height' => '100px', 'align' => '', 'margin' => '10px']) ?></td>
                <td width="20%"
                    style="background-color: #ebefc2;"><?php echo Html::img($url.'images/dog-paw (1).png', ['alt' => 'My logo', 'height' => '100px', 'align' => '', 'margin' => '10px']) ?></td>
            </tr>
        </table>

    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Ottava pagina Protezione patrimonio -->
<?php if($pages[8]==true){ ?>
    <div style="background-color: #005A9D; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/umbrella.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Protezione Patrimonio</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                  Una volta protetto il reddito è fondamentale proteggere il proprio patrimonio, i propri beni. L’obiettivo è quello di <b>NON</b> perdere quanto di buono hai messo da parte lavorando per una vita intera.
                        </span>
                </td>
            </tr>
        </table>
    </div>
    <br/>
    <div style="text-align: center">
        <div style="font-size: 20px;">
            Nel tuo caso specifico:
        </div>
        <br/>
        <table width="100%" CELLSPACING="20px" style="text-align:center;  font-family: 'catamaran'; font-size: 24px; ">

            <tr>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Beni</b></td>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Veicoli</b></td>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Attività</b></td>
                <td width="20%" style="color:#A0C123; background-color:white;"><b>Animali</b></td>
            </tr>

            <tr>
                <td width="20%" style="background-color: #ebefc2; font-size: 16px;">
                    <ul>
                        <?php
                        $arrimm = $model->getImmobili();
                        foreach ($arrimm as $immobile){
                            echo "<li>";
                            echo "Immobile ".Html::encode(ucfirst(strtolower($immobile->tipoImmobile->descrizione)));
                            echo " del valore commerciale pari a ".number_format($immobile->valore, 2, ',', '.'). " &euro; ";
                            echo "posseduta al ".($immobile->percentuale)->percentualecol."%";
                            echo "</li>";
                        }
                        ?>
                        <?php
                        $arrimm = $model->getAziende();
                        foreach ($arrimm as $azienda){
                            echo "<li>";
                            echo "Azienda ".Html::encode(ucfirst(strtolower($azienda->tipoAzienda->descrizione)));
                            echo " del valore pari a ".number_format($azienda->valore, 2, ',', '.'). " &euro; ";
                            echo "posseduta al ".($azienda->percentuale)->percentualecol."%";
                            echo "</li>";
                        }
                        ?>

                        <?php
                        $arrimm = $model->getAltriBeni();
                        foreach ($arrimm as $bene){
                            echo "<li>";
                            echo Html::encode(ucfirst(strtolower($bene->descrizione)));
                            echo " del valore pari a ".number_format($bene->valore, 2, ',', '.'). " &euro; ";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </td>
                <td width="20%" style="background-color: #ebefc2; font-size: 16px;">
                    <ul>
                        <?php
                        $arrimm = $model->getVeicoli();
                        foreach ($arrimm as $veicolo){
                            echo "<li>";
                            echo "Veicolo ".Html::encode(ucfirst(strtolower($veicolo->tipoVeicolo->descrizione)));
                            echo " del valore pari a ".number_format($veicolo->valore, 2, ',', '.'). " &euro; ";
                            echo "posseduta al ".($veicolo->percentuale)->percentualecol."%";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </td>
                <td width="20%" style="background-color: #ebefc2; font-size: 16px;">
                    Attività praticate da te o dalla tua famiglia
                    <ul>
                        <?php
                        $arrimm = $model->getAttivita();
                        foreach ($arrimm as $attivita){
                            if($attivita->idattivita!=4) {
                                echo "<li>";
                                echo Html::encode(ucfirst(strtolower($attivita->attivita->descrizione)));
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </td>
                <td width="20%" style="background-color: #ebefc2; font-size: 16px;">
                    <?php
                    $arrimm = $model->getAttivita();
                    foreach ($arrimm as $attivita){
                        if($attivita->idattivita==4) {
                            echo "Possiedi animali";
                        }
                    }
                    ?>

                </td>
            </tr>
        </table>
        <br/>
        <div style="font-size: 20px; color: #A0C123;">
            <b>Questi sono i passaggi da fare in ordine di importanza:</b>
        </div>
        <br/>
        <div style="padding:25px; font-size: 18px; text-align: left;">
            <p><span style="color:green; font-size: 20px;"><b>1)</b></span> Trasferire con massimali elevati le
                responsabilità derivanti dalle categorie sopraelencate</p>
            <p><span style="color:green; font-size: 20px;"><b>2)</b></span> Trasferire i maggiorni rischi che possono
                portare via la tua casa come l'incendio, il terromoto, un grave evento atmosferico</p>
            <p><span style="color:green; font-size: 20px;"><b>3)</b></span> Solo dopo aver completato i primi due passaggi
                puoi trasferire i rischi a maggior frequenza, ma minor impatto.</p>
        </div>
    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Nona pagina Pianificazione risparmio -->
<?php if($pages[9]==true){ ?>
    <div style="background-color: #005A9D; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/piggydd-bank.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Pianificazione Risparmio</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                  Solo dopo aver protetto il reddito e il patrimonio puoi pensare al tuo risparmio.
                        </span>
                </td>
            </tr>
        </table>
    </div>
    <br/>
    <div style="text-align: center">
        <div style="font-size: 20px; color:green;">
            A questo punto avrai già raggiunto due obbiettivi:
        </div>
        <br/>
        <div style="font-size: 16px;">
            Non solo <span style="color:green;">hai messo al sicuro</span> te e la tua famiglia dagli imprevisti che possono minacciare la tua serenità, ma inoltre
            <span style="color:green;">hai liberato i tuoi soldi</span>
            dalla "trappola della liquidità" e ora possono essere utilizzati per investimenti più redditizi nel tempo.
        </div>
        <br/>
        <?php echo Html::img($url.'images/PIRAMIDE.png', ['alt' => 'My logo', 'height' => '400px', 'margin' => '10px']) ?>
        <br/>
        <div style="font-size: 16px;">
            Ti spiego meglio cosa significa tutto questo e quali <span style="color:green;">enormi conseguenze positive</span> ha per te.
        </div>
        <br/>
        <div style="font-size: 16px;">
            Se non sei assicurato per bene, sei portato a tenere gran parte del proprio denaro "liquido" ( intendo proprio sul conto corrente o in qualche conto deposito ) per tutelarsi dagli imprevisti.
        </div>
        <br/>
        <br/>
        <div style="color:red; font-size: 16px;">
            <b>Non investi e tieni il denaro sempre disponibile, a vista, perchè "non si sa mai".</b>
        </div>
        <br/>
        <br/>
        <div style="font-size: 16px;">
            Questo è un atteggiamento prudente <span style="color:red;">per chi non è assicurato</span> per bene, mentre diventa un atteggiamento assolutamente <span style="color:red;">poco lungimirante</span> per chi si è tutelato in modo completo dal rischio di imprevisti.
        </div>

    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Decima pagina Cosa fare quindi dei tuoi risparmi? -->
<?php if($pages[10]==true){ ?>
    <div style="background-color: #2CB8E3; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/ecological-invesment.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Cosa fare quindi dei tuoi risparmi?</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                  Tre consigli pratici, con l'intento di approfondire nel dettaglio con una consulenza specifica e non lasciarti attrarre dal fai-da-te.
                        </span>
                </td>
            </tr>
        </table>
    </div>
    <table width="100%"
           style="text-align:center; margin:0px; color:white; background-color:#95C123; font-family: 'catamaran'; font-size: 18px; ">
        <tr>
            <td valign="middle" height="60px">
                <span style="font-size:18px"><b>Consiglio n° 1:</b></span><br/>
                Dividi il tuo patrimonio liquido per progetti di investimento e stabilisci un orizzonte temporale
            </td>
        </tr>
    </table>
    <table width="100%" CELLSPACING="5px" style="margin-top:20px; text-align:center;  font-family: 'catamaran'; font-size: 16px; ">

        <tr>
            <td width="20%"><?php echo Html::img($url.'images/departures.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
            <td width="20%"><?php echo Html::img($url.'images/car.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
            <td width="20%"><?php echo Html::img($url.'images/abc.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
            <td width="20%"><?php echo Html::img($url.'images/diagram.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
        </tr>
        <tr>
            <td width="20%" style="color:black; background-color:white; text-align: center;"><b>Viaggi e Hobby</b><br/><span style="color: #95C123;">...%</span></td>
            <td width="20%" style="color:black; background-color:white; text-align: center;"><b>Aquisto auto</b><br/><span style="color: #95C123;">...%</span></td>
            <td width="20%" style="color:black; background-color:white; text-align: center;"><b>Istruzione figli</b><br/><span style="color: #95C123;">...%</span></td>
            <td width="20%" style="color:black; background-color:white; text-align: center;"><b>Crescita capitale</b><br/><span style="color: #95C123;">...%</span></td>
        </tr>
        <tr>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Orizzonte temporale<br/><span style="color: #95C123;"><b>3</b></span> ANNI</td>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Orizzonte temporale<br/><span style="color: #95C123;"><b>5</b></span> ANNI</td>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Orizzonte temporale<br/><span style="color: #95C123;"><b>7</b></span> ANNI</td>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Orizzonte temporale<br/><span style="color: #95C123;"><b>10</b></span> ANNI</td>
        </tr>
    </table>
    <table width="100%"
           style="text-align:center; margin:0px; color:white; background-color:#95C123; font-family: 'catamaran'; font-size: 18px; ">
        <tr>
            <td valign="middle" height="60px">
                <span style="font-size:18px"><b>Consiglio n° 2:</b></span><br/>
                Stabilisci il tuo obiettivo di rendimento ( sostenibile ) per ogni progetto di investimento
            </td>
        </tr>
    </table>
    <table width="100%" CELLSPACING="5px" style="margin-top:20px; text-align:center;  font-family: 'catamaran'; font-size: 16px; ">

        <tr>
            <td width="20%"><?php echo Html::img($url.'images/departures.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
            <td width="20%"><?php echo Html::img($url.'images/car.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
            <td width="20%"><?php echo Html::img($url.'images/abc.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
            <td width="20%"><?php echo Html::img($url.'images/diagram.png', ['alt' => 'My logo', 'height' => '80px', 'align' => '', 'margin' => '10px']) ?></td>
        </tr>
        <tr>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Obiettivo di rendimento<br/><span style="color: #95C123;"><b>...%</b></span> ANNUO</td>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Obiettivo di rendimento<br/><span style="color: #95C123;"><b>...%</b></span> ANNUO</td>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Obiettivo di rendimento<br/><span style="color: #95C123;"><b>...%</b></span> ANNUO</td>
            <td width="20%" style="color:black; background-color:white; text-align: center;">Obiettivo di rendimento<br/><span style="color: #95C123;"><b>...%</b></span> ANNUO</td>
        </tr>
    </table>

    <table width="100%"
           style="text-align:center; margin:0px; color:white; background-color:#95C123; font-family: 'catamaran'; font-size: 18px; ">
        <tr>
            <td valign="middle" height="60px">
                <span style="font-size:18px"><b>Consiglio n° 3:</b></span><br/>
                Conosci e comprendi le basi dell'investimento di valore
            </td>
        </tr>
    </table>
    <div style="margin: 30px">
        <table>
            <tr>
                <td>
                    <?php echo Html::img($url.'images/coins.png', ['alt' => 'My logo', 'height' => '20px', 'align' => '', 'margin' => '10px']) ?>
                </td>
                <td>
                    <span style="color : #95C123;"><b>Investire</b></span> non signifca speculare per investire con successo e con soddisfazione occorre stabilire il giusto tempo a disposizione.
                </td>
            </tr>
        </table>
    </div>
    <ul style="list-style-type: none;">
        <li>
        <span style="color : #95C123;"><?php echo Html::img($url.'images/coins.png', ['alt' => 'My logo', 'height' => '20px', 'align' => '', 'margin' => '10px']) ?>
            <b>Diversifica</b></span> è altamente sconsigliato investire in azioni e obbligazioni. Corri il rischio che qualcosa possa andare storto, e non ne vale la pena.
        </li>
        <li>
        <span style="color : #95C123;"><?php echo Html::img($url.'images/coins.png', ['alt' => 'My logo', 'height' => '20px', 'align' => '', 'margin' => '10px']) ?>
            <b>Resisti alle Sirene</b></span> non farti sedurre da offerte mirabolanti di rendimenti stellari. Ti assicuro che c'è sempre la fregaura sotto.
        </li>
        <li>
        <span style="color : #95C123;"><?php echo Html::img($url.'images/coins.png', ['alt' => 'My logo', 'height' => '20px', 'align' => '', 'margin' => '10px']) ?>
            <b>Lascia pedere i telegiornali e le notizie dei mercati</b></span> l'informazione finanziaria, se eccessiva, ha come unico risultato quello di confonderti le idee e terrorizzarti.
        </li>
    </ul>
    <div style="color:#95C123; text-align:center; font-size: 16px;">
        Per ora, va bene così.<br/>
        L'ultimo consiglio che posso darti è quello di identificare un valido partner<br/>
        finanziario, assicurandoti che i tuoi interessi siano i tuoi interessi.
    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>
<!-- Undicesima pagina Pianificazione Successione -->
<?php if($pages[11]==true){ ?>
    <div style="background-color: #B7DDF6; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/family-group-of-three.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Pianificazione Successione</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">
                  I padri e le madri di famiglia vogliono lasciare quanto di buono hanno costruito nella loro vita alle persone care - senza intoppi, liti ed erosioni di patrimonio.
                        </span>
                </td>
            </tr>
        </table>
    </div>
    <?php echo Html::img($url.'images/shutterstock_113563573.jpg', ['alt' => 'My logo', 'height' => '100%', 'align' => 'center']) ?>

    <div style="text-align: center">
        <div style="font-size: 18px;">
            Come si può pianificare una successione <span style="color:green;">sicura</span> e <span style="color:green;">tranquilla</span>?
        </div>
        <br/>
        <div style="font-size: 16px;">
            Magari anche tu conosci <span style="color:red;">storie di famiglie distrutte</span> a causa di eredità gestite male, testamenti<br/>
            impugnati e patrimoni smembrati in parti piccolissime.<br/>
            Se tieni alla serenità e alla protezione della tua famiglia non puoi lasciare aperta la questione<br/>
            della successione.
        </div>
        <br/>
        <div style="font-size: 20px; color: green;">
            Il tuo patrimonio stimato è di <?php echo number_format($model->patrimoniostimato, 2, ',', '.'); ?> &euro;
        </div>
        <br/>
        <?php \app\modules\operatore\controllers\ContactController::tabellaSuccessione($model); ?>

    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>

<!-- Dodicesima pagina Riepilogando -->
<?php if($pages[12]==true){ ?>
    <div style="background-color: #053529; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/shield.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Riepilogando</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;"></span>
                </td>
            </tr>
        </table>
    </div>
    <br/><br/><br/>
    <div style="text-align: center">
        <table  CELLSPACING="15px" width ="100%" style="text-align: center; font-family: 'catamaran'; font-size:16px; color: white;">
            <tr>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/doctor.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>In caso di gravi invalidità, potresti vivere con una rendita di qualche centinaia di euro al mese?
                </td>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/tombstone-with-cross.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>In caso di morte, tua moglie e i tuoi figli riuscirebbero a pagare il mutuo o l'affitto e vivere con una pensione irrilevante?
                </td>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/get-money.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>Quando andrai in pensione, ce la farai a vivere con la pensione di vecchiaia erogata dallo Stato?
                </td>
            </tr>
            <tr>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/line-chart.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>I tuoi figli riuscirebbero a mantenerti se tu avessi la fortuna di vivere a lungo e la sfortuna di passare l'ultima parte della vita non autosufficiente?
                </td>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/checklist-on-a-paper-with-a-pencil.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>Hai fatto l'elenco delle tue attività quelle dei tuoi familiari e di tutti i tuoi beni? E' giusto essere preparati ad ogni evenienza.
                </td>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/fender-bender.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>Nel caso in cui causassero un danno ad altri, vorresti avere un assicurazione che garantisce per te, come la tua polizza auto?
                </td>
            </tr>
            <tr>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/warning.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>Vuoi garantire i tuoi beni solo per gli eventi che potrebbero portarteli via realmente e risparmiare sulle coperture inutili?
                </td>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/piggy-bank.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>Ti piacerebbe avere i tuoi risparmi sempre al sicuro e sempre disponibili per le lievi e grandi esigenze della vita?
                </td>
                <td height="180px" valign="middle" width="33%" style="padding: 15px; background-color: #95C123;">
                    <div><?php echo Html::img($url.'images/italy.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?></div>
                    <br/>Tutti passeremo a miglior vita, vuoi decidere tu come trasferire ai tuoi eredi quanto di buono hai costruito? O vuoi lasciare che decida lo Stato?
                </td>
            </tr>
        </table>

    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>

<!-- Tredicesima pagina Conclusioni -->
<?php if($pages[13]==true){ ?>
    <div style="background-color: #ABCBED; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/summary.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Conclusioni</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">Ora conosci quale è la tua situazione.</span>
                </td>
            </tr>
        </table>
    </div>
    <br/><br/>
    <div style="text-align:center;">
        <p style="color:red; font-size:18px;">ALLA LUCE DEI RISULTATI DEL TUO TEST, HAI <B>3</B> POSSIBILITA'
    </div>
    <br/><br/>
    <table  CELLSPACING="15px" width ="100%" style=" font-family: 'catamaran'; font-size:18px; color: white;">
        <tr>
            <td height="80px" valign="bottom" width="33%" style="padding: 15px; background-color: #CD171A; color:white">
                <b><span style="font-size: 22px;">1</span> NON fai nulla</b>
            </td>
            <td height="80px" valign="bottom" width="33%" style="padding: 15px; background-color: #FDC300; color:white">
                <b><span style="font-size: 22px;">2</span> Ti fidi dell'impiegato</b>
            </td>
            <td height="80px" valign="bottom" width="33%" style="padding: 15px; background-color: #95C123; color:white">
                <b><span style="font-size: 22px;">3</span> Scegli gli specialisti</b>
            </td>
        </tr>
        <tr>
            <td width="33%" valign="top" style="padding: 5px; color:black;">Ebbene sì, sei consapevole dei rischi che stai correndo e che stai facendo correre ai tuoi cari.<br/>
                Tuttavia - per una serie di motivi - non hai intenzione di porre rimedio e sei perfettamente a posto con l'idea di giocare alla roulette russa con la sicurezza dei tuoi cari.<br/>
                <span style="color:#CD171A;">La scelta è tua.</span>
            </td>
            <td width="33%" valign="top" style="padding: 5px; color:black;">Affidare la tua protezione al portale assicurativo online o all'impiegato della banca e della posta, personaggi che NON hanno mai studiato la materia in modo approfondito
                - e che quindi potrebbero provocare gravissimi danni alla tua sicurezza economica.<br/>
                Rischi di ritrovarti con un piano di protezione perfetto…per un single!<br/>
                <span style="color:#FDC300;">E magari tu sei sposato e con figli.</span>
            </td>
            <td width="33%" valign="top" style="padding: 5px; color:black;">L'ultima opzione che hai è rivolgerti agli specialisti della protezione.<br/>
                <span style="color:#95C123;">Sator Informa</span> ha sviluppato un sistema d'informazione che ti permette di arrivare diritto al punto, facendo emergere i problemi che devi risolvere SUBITO
                – se vuoi garantire la tranquillità della tua famiglia.
            </td>
        </tr>
    </table>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
    <pagebreak></pagebreak>
<?php } ?>

<!-- Quattordicesima pagina Ora sta a te decidere-->
<?php if($pages[14]==true){ ?>
    <div style="background-color: #94f100; font-family: 'catamaran'; ">
        <table style=" padding-top:20px; margin-bottom: 20px; margin-left: 20px;">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '100px', 'align' => 'left', 'margin' => '10px']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <span style="color: white; font-size: 28px;">
                    <b>Ora sta a te decidere</b>
                    </span><br/>
                    <span style="color: white; font-size: 18px;">

                    </span>

                </td>
            </tr>
        </table>
    </div>
    <table width="100%" style="font-size: 18px; margin-left:20px; margin-right: 20px;" cellpadding="20">
        <tr>
            <td width="50%">
                <div style=" text-align: justify;"><?php echo Html::img($url.'images/PIRAMIDE.png', ['alt' => 'My logo', 'height' => '400px', 'margin' => '10px']) ?></div>
            </td>
            <td width="50%">
                <div style=" text-align: justify;">
                    <div style="font-size: 22px; color: green;">
                        <b>Questa piramide indica il livello di protezione.</b>
                    </div>
                    <br/>
                    <div style="font-size: 22px; color: black;">
                        <b>Se tutti i gradini sono <span style="color: green;">verdi</span></b>, tu e la tua famiglia siete al sicuro e puoi dormire sogni tranquilli.
                    </div>
                    <br/>
                    <div style="font-size: 22px; color: black;">
                        <b>Se anche solo un gradino è rimasto bianco</b>, devi subito correre ai ripari pianificando la protezione dei tuoi cari.
                    </div>
                </div>

            </td>
        </tr>
    </table>
    <table width="100%" style="text-align:center; font-size: 24px; padding: 20px;">
        <tr>
            <td>
                Se vuoi pianificare la protezione della tua famiglia, grazie a un'analisi fatta al 100% su misura per la tua situazione specifica allora la consulenza di
                <span style="color: green;">Sator Informa</span> è il supporto che finora ti è sempre mancato!
            </td>
        </tr>
    </table>
    <div style="text-align: center">
        <div style="font-size: 18px;">
            Con la consulenza di <span style="color: green;"><b>Sator Informa</b></span> otterrai:
        </div>
        <br/>
        <div style="font-size: 18px; color:green;">
            MAGGIORE SICUREZZA ECONOMICA
        </div>
        <div style="font-size: 18px;">
            Potrai dormire sonni tranquilli, sapendo di avere le spalle coperte per tutti gli eventi più gravi, quelli che possono spazzare via le tue entrate economiche da un momento all'altro.
        </div>
        <br/>
        <div style="font-size: 18px; color:green;">
            RISPARMIO SULLE ASSICURAZIONI INUTILI
        </div>
        <div style="font-size: 18px;">
            Potrai eliminare tutte le polize che ti coprono per eventi NON gravi, smettendo di buttare nel cestino centinaia di soldi all'anno per coperture ridicole.
        </div>
        <br/>
        <div style="font-size: 18px; color:green;">
            RISPARMIO SULLE TASSE
        </div>
        <div style="font-size: 18px;">
            Capirai come pianificare la protezione della tua famiglia e ottenere anche grandi agevolazioni fiscali.
        </div>

    </div>
    <div style="background-color:#ebefc2; position: fixed; bottom: 0; width: 100%;">
        <table style=" padding:10px; ">
            <tr>
                <td>
                    <?php echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '40px', 'align' => 'left']) ?>
                </td>
                <td style="vertical-align:middle;">
                    <?= Yii::$app->user->identity->client->description; ?> <?= Yii::$app->user->identity->client->adress; ?> , <?= Yii::$app->user->identity->client->cap; ?> - <?= Yii::$app->user->identity->client->comunep->name; ?>  tel. <?= Yii::$app->user->identity->client->phone; ?> cell. <?= Yii::$app->user->identity->client->cell; ?>
                    email. <?= Yii::$app->user->identity->client->mailfrom; ?>
                </td>
            </tr>
        </table>
    </div>
<?php } ?>
</body>
</html>