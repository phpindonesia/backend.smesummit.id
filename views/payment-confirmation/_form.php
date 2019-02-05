<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Participant;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentConfirmation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-confirmation-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'email_user_id')->label("Participant Name")
            ->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Participant::find()->all(), 'id', 'description'),
                'options' => [
                    'placeholder' => "Select Participant Name..."
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'payment_type')->dropDownList([ 'participant' => 'Participant', 'sponsor' => 'Sponsor', 'coacher' => 'Coacher', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'total_payment')->textInput([
            'type' => 'number', 
            'step' => '1',
            'placeholder' => "0",
        ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'bank_username')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'date_transfer')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'no_ref')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'screenshot')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <?= $form->field($model, 'status')->dropDownList([ 'pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
