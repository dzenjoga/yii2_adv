<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */


use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<?php
$form = ActiveForm::begin([
    'id' => 'create twit form',
    'options' => ['class' => 'form-horizontal'],    
        ]);
?>

    <?= $form->field($model, 'image') ?>
    <?= $form->field($model, 'text') ?>

    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

<?php
ActiveForm::end();
?>