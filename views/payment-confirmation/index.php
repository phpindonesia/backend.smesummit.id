<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentConfirmationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Payment Confirmations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-confirmation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_INFO, 
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Payment Confirmations List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create New Payment Confirmation'), ['create'], [
                    'data-pjax' => 0, 
                    'class' => 'btn btn-success', 
                    'title' => Yii::t('app', 'Create New Payment Confirmation')
                ])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'email_user_id',
                'header' => 'Participant Name',
                'value' => function ($model, $index, $widget) { 
                    $link = null;
                    if (isset($model->participant)) {
                        $link = Html::a($model->participant->name,
                            Url::to(['/participant/view', 'id'=>$model->participant->id]),
                            ['class'=>'kv-author-link']
                        );
                    }
                    return $link;
                },
                'noWrap' => true,
                'format' => 'raw',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '20%' ]
            ],
            [
                'attribute' => 'phone',
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-left', 'width' => '5%' ]
            ],
            [
                'attribute' => 'total_payment',
                'format' => ['decimal',0],
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-right', 'width' => '5%' ]
            ],
            [
                'attribute' => 'payment_type',
                'format'=>'raw',
                'value' => function ($model, $index, $widget) { 
                    switch ($model->payment_type) {
                        case 'participant':
                            return '<span class="label label-info">Participant</span>';
                        case 'sponsor':
                            return '<span class="label label-success">Sponsor</span>';
                        case 'coacher':
                            return '<span class="label label-warning">Coacher</span>';
                        default:
                            return '<span class="label label-default">Unknown</span>';
                    }
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => [ 
                    'participant' => 'Participant', 
                    'sponsor' => 'Sponsor', 
                    'coacher' => 'Coacher', 
                ],
                'filterWidgetOptions' => [
                    'pluginOptions' => [ 'allowClear' => true ],
                ],
                'filterInputOptions' => [ 'placeholder' => '*All*' ],
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '15%' ]
            ],
            [
                'attribute' => 'date_transfer',
                'noWrap' => true,
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-left', 'width' => '5%' ]
            ],
            [
                'attribute' => 'bank_name',
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-left', 'width' => '5%' ]
            ],
            [
                'attribute' => 'status',
                'format'=>'raw',
                'value' => function ($model, $index, $widget) { 
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
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => [ 
                    'Active' => 'Active', 
                    'Redeemed' => 'Redeemed', 
                    'Inactive' => 'Inactive', 
                ],
                'filterWidgetOptions' => [
                    'pluginOptions' => [ 'allowClear' => true ],
                ],
                'filterInputOptions' => [ 'placeholder' => '*All*' ],
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '20%' ]
            ],
            // 'no_ref',
            // 'bank_username',
            // 'screenshot:ntext',
            // 'notes:ntext',
            // 'created_at',

            [
                'class' => 'kartik\grid\ActionColumn',
                'noWrap' => true,
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
