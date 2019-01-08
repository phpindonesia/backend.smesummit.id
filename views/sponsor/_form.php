<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sponsor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sponsor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'company_sector')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'email_pic')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'sponsor_type')->dropDownList([ 'platinum' => 'Platinum', 'gold' => 'Gold', 'silver' => 'Silver', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'status')->dropDownList([ 'New Request' => 'New Request', 'Invoice Sent' => 'Invoice Sent', 'Confirmed' => 'Confirmed', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
