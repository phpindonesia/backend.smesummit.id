<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Voucher */

$this->title = Yii::t('app', 'Create Voucher');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vouchers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voucher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
