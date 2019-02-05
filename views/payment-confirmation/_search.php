<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentConfirmationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-confirmation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'email_user_id') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'total_payment') ?>

    <?= $form->field($model, 'payment_type') ?>

    <?php // echo $form->field($model, 'date_transfer') ?>

    <?php // echo $form->field($model, 'no_ref') ?>

    <?php // echo $form->field($model, 'bank_name') ?>

    <?php // echo $form->field($model, 'bank_username') ?>

    <?php // echo $form->field($model, 'screenshot') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
