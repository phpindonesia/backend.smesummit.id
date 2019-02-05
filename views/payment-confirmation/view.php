<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentConfirmation */

$this->title = isset($model->participant) ? $model->participant->name : $model->phone;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Confirmations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payment-confirmation-view">

    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4 pull-right action-buttons">
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'hAlign' => DetailView::ALIGN_RIGHT,
        'vAlign' => DetailView::ALIGN_MIDDLE,
        'panel' => [
            'type' => DetailView::TYPE_INFO, 
            'heading' => '<i class="glyphicon glyphicon-book"></i>  <strong>Payment Confirmation Details</strong>',
            'footer' => '<div class="text-center text-muted">'. $model->phone . ': ' . number_format($model->total_payment) .'</div>'
        ],
        'buttons1' => '',
        'buttons2' => '',
        'attributes' => [
            [
                'columns' => [
                    [
                        'attribute' => 'email_user_id',
                        'header' => 'Participant Name',
                        'format'=>'raw',
                        'value' => function ($form, $widget) { 
                            $model = $widget->model;
                            $link = null;
                            if (isset($model->participant)) {
                                $link = Html::a($model->participant->name,
                                    Url::to(['/participant/view', 'id'=>$model->participant->id]),
                                    ['class'=>'kv-author-link']
                                );
                            }
                            return $link;
                        },
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'phone',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'payment_type',
                        'format'=>'raw',
                        'value' => function ($form, $widget) { 
                            $model = $widget->model;
                            switch ($model->payment_type) {
                                case 'participant':
                                    return '<span class="label label-info">Participant</span>';
                                case 'sponsor':
                                    return '<span class="label label-success">Payment Confirmation</span>';
                                case 'coacher':
                                    return '<span class="label label-warning">Coacher</span>';
                                default:
                                    return '<span class="label label-default">Unknown</span>';
                            }
                        },
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'total_payment',
                        'format' => ['decimal',2],
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'date_transfer',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'no_ref',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'bank_name',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'bank_username',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'screenshot',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'notes',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'payment_type',
                        'format'=>'raw',
                        'value' => function ($form, $widget) { 
                            $model = $widget->model;
                            switch ($model->status) {
                                case 'pending':
                                    return '<span class="label label-info">Pending</span>';
                                case 'approved':
                                    return '<span class="label label-success">Approved</span>';
                                case 'rejected':
                                    return '<span class="label label-warning">Rejected</span>';
                                default:
                                    return '<span class="label label-default">Unknown</span>';
                            }
                                },
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'created_at',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
        ],
    ]) ?>

</div>
