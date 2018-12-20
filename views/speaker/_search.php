<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpeakerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speaker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'position') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'last_education') ?>

    <?php // echo $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'company_sector') ?>

    <?php // echo $form->field($model, 'topic') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
