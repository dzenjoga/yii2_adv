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
     <?= $form->field($model, 'category_id')->dropDownList(common\models\Twits::$categories, ['prompt' => common\models\Twits::NO_CAT]) ?>
    <?= $form->field($model, 'text')->textarea() ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>

<?php
ActiveForm::end();
?>