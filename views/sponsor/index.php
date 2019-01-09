<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SponsorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sponsors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sponsor-index">

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
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Sponsors List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create New Sponsor'), ['create'], [
                    'data-pjax' => 0, 
                    'class' => 'btn btn-success', 
                    'title' => Yii::t('app', 'Create New Sponsor')
                ])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'company_name',
            'company_sector',
            // 'email_pic:email',
            'phone',
            [
                'attribute' => 'sponsor_type',
                'format'=>'raw',
                'value' => function ($model, $index, $widget) { 
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
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '10%' ]
            ],
            [
                'attribute' => 'status',
                'format'=>'raw',
                'value' => function ($model, $index, $widget) { 
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
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => [ 
                    'New Request' => 'New Request', 
                    'Invoice Sent' => 'Invoice Sent', 
                    'Confirmed' => 'Confirmed', 
                    'Canceled' => 'Canceled', 
                    'Rejected' => 'Rejected', 
                ],
                'filterWidgetOptions' => [
                    'pluginOptions' => [ 'allowClear' => true ],
                ],
                'filterInputOptions' => [ 'placeholder' => '*All*' ],
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '12%' ]
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
