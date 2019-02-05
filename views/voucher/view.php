<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Voucher */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vouchers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="voucher-view">

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
            'heading' => '<i class="glyphicon glyphicon-book"></i>  <strong>Sponsor Details</strong>',
            'footer' => '<div class="text-center text-muted">'. $model->code . ': ' . $model->status .'</div>'
        ],
        'buttons1' => '',
        'buttons2' => '',
        'attributes' => [
            // 'id',
            [
                'columns' => [
                    [
                        'attribute' => 'code',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:80%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'status',
                        'format'=>'raw',
                        'value' => function ($form, $widget) { 
                            $model = $widget->model;
                            switch ($model->status) {
                                case 'Active':
                                    return '<span class="label label-info">Active</span>';
                                case 'Redeemed':
                                    return '<span class="label label-success">Redeemed</span>';
                                case 'Inactive':
                                    return '<span class="label label-warning">Inactive</span>';
                                default:
                                    return '<span class="label label-default">Unknown</span>';
                            }
                        },
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'redeem_limit',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'discount_percent',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'discount_amount',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'partner_name',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'partner_email',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'referral_percent',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'referral_amount',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'created_at',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'updated_at',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
        ],
    ]) ?>

</div>
