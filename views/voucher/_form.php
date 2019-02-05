<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Voucher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="voucher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'discount_percent')->textInput([
            'type' => 'number', 
            'step' => '1',
            'placeholder' => "0",
        ]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'discount_amount')->textInput([
            'type' => 'number', 
            'step' => '1',
            'placeholder' => "0",
        ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'partner_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'partner_email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'referral_percent')->textInput([
            'type' => 'number', 
            'step' => '1',
            'placeholder' => "0",
        ]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'referral_amount')->textInput([
            'type' => 'number', 
            'step' => '1',
            'placeholder' => "0",
        ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Redeemed' => 'Redeemed', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'redeem_limit')->textInput([
            'type' => 'number', 
            'step' => '1',
            'placeholder' => "0",
        ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
