<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VoucherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vouchers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voucher-index">

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
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Vouchers List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create New Voucher'), ['create'], [
                    'data-pjax' => 0, 
                    'class' => 'btn btn-success', 
                    'title' => Yii::t('app', 'Create New Voucher')
                ])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'code',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '10%' ]
            ],
            [
                'attribute' => 'discount_percent',
                'format' => ['decimal',2],
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-right', 'width' => '5%' ]
            ],
            [
                'attribute' => 'discount_amount',
                'format' => ['decimal',0],
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-right', 'width' => '5%' ]
            ],
            [
                'attribute' => 'status',
                'format'=>'raw',
                'value' => function ($model, $index, $widget) { 
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
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '10%' ]
            ],
            [
                'attribute' => 'referral_percent',
                'format' => ['decimal',2],
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-right', 'width' => '5%' ]
            ],
            [
                'attribute' => 'referral_amount',
                'format' => ['decimal',0],
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-right', 'width' => '5%' ]
            ],
            [
                'attribute' => 'redeem_limit',
                'format' => ['decimal',0],
                'contentOptions' => [ 'class' => 'kv-align-middle kv-align-right', 'width' => '5%' ]
            ],
            [
                'attribute' => 'partner_name',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '25%' ]
            ],

            // 'created_at',
            // 'updated_at',

            [
                'class' => 'kartik\grid\ActionColumn',
                'noWrap' => true,
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
