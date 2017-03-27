<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \yii2mod\user\models\LoginForm */
\app\assets\MyAsset::register($this);

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content="Indosat - IP Allocation & Booking Management" />
        <?= Html::csrfMetaTags() ?>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title & Rest -->
        <title><?= Html::encode($this->title); ?></title>
        <?php $this->head() ?>

    </head>
    <body class="login">
    <?php $this->beginBody() ?>
    <div>


        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php echo $content; ?>
                </section>
            </div>


        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>