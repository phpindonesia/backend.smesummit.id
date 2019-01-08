<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sponsor */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sponsors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sponsor-view">

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
            'footer' => '<div class="text-center text-muted">'. $model->company_name . ': ' . $model->company_sector .'</div>'
        ],
        'buttons1' => '',
        'buttons2' => '',
        'attributes' => [
            // 'id',
            [
                'columns' => [
                    [
                        'attribute' => 'company_name',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'company_sector',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'phone',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'email_pic',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'sponsor_type',
                        'format'=>'raw',
                        'value' => function ($form, $widget) { 
                            $model = $widget->model;
                            switch ($model->sponsor_type) {
                                case 'silver':
                                    return '<span class="label label-default">Silver</span>';
                                case 'gold':
                                    return '<span class="label label-warning">Gold</span>';
                                case 'platinum':
                                    return '<span class="label label-primary">Platinum</span>';
                                default:
                                    return '<span class="label label-danger">Unknown</span>';
                            }
                        },
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'status',
                        'format'=>'raw',
                        'value' => function ($form, $widget) { 
                            $model = $widget->model;
                            switch ($model->status) {
                                case 'New Request':
                                    return '<span class="label label-default">New Request</span>';
                                case 'Invoice Sent':
                                    return '<span class="label label-info">Invoice Sent</span>';
                                case 'Confirmed':
                                    return '<span class="label label-success">Confirmed</span>';
                                case 'Canceled':
                                    return '<span class="label label-warning">Canceled</span>';
                                case 'Rejected':
                                    return '<span class="label label-danger">Rejected</span>';
                                default:
                                    return '<span class="label label-default">New Request</span>';
                            }
                        },
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
                        'valueColOptions' => [ 'style'=>'width:80%' ],
                    ],
                ],
            ],
        ],
    ]) ?>

</div>
