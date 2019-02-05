<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentConfirmation */

$this->title = Yii::t('app', 'Create Payment Confirmation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Confirmations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-confirmation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
