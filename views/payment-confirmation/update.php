<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentConfirmation */

$name = isset($model->participant) ? $model->participant->name : $model->phone;
$this->title = Yii::t('app', 'Update Payment Confirmation: {name}', [
    'name' => $name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Confirmations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="payment-confirmation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
