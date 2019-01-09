<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Participants');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-index">

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
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Participants List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create New Participant'), ['create'], [
                    'data-pjax' => 0, 
                    'class' => 'btn btn-success', 
                    'title' => Yii::t('app', 'Create New Participant')
                ])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'name',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '15%' ]
            ],
            [
                'attribute' => 'company_name',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '20%' ]
            ],
            [
                'attribute' => 'position',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '15%' ]
            ],
            [
                'attribute' => 'sector_to_be_coached',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '20%' ]
            ],
            [
                'attribute' => 'phone',
                'noWrap' => true,
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '5%' ]
            ],
            // 'problem_desc:ntext',
            // 'created_at',
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
