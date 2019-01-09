<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
?>

<h1>For Internal Use Only</h1>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderParticipant,
            'filterModel' => $searchModelParticipant,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_INFO, 
                'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Participants List</strong>',
            ],
            'toolbar' =>  [ 
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'New Participant'), ['create'], [
                        'data-pjax' => 0, 
                        'class' => 'btn btn-success', 
                        'title' => Yii::t('app', 'New Participant')
                    ])
                ],
                '{toggleData}' 
            ],
            'columns' => [
                'name',
                'company_name',
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
            ],
        ]); ?>
    </div>
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderVolunteer,
            'filterModel' => $searchModelVolunteer,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_SUCCESS, 
                'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Volunteers List</strong>',
            ],
            'toolbar' =>  [ 
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'New Volunteer'), ['create'], [
                        'data-pjax' => 0, 
                        'class' => 'btn btn-success', 
                        'title' => Yii::t('app', 'New Volunteer')
                    ])
                ],
                '{toggleData}' 
            ],
            'columns' => [
                'name',
                'phone',
                [
                    'attribute' => 'status',
                    'format'=>'raw',
                    'value' => function ($model, $index, $widget) { 
                        switch ($model->status) {
                            case 'New Request':
                                return '<span class="label label-default">New Request</span>';
                            case 'Follow Up':
                                return '<span class="label label-info">Follow Up</span>';
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
                        'Follow Up' => 'Follow Up', 
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
            ],
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderSponsor,
            'filterModel' => $searchModelSponsor,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_DANGER, 
                'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Sponsors List</strong>',
            ],
            'toolbar' =>  [ 
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'New Sponsor'), ['create'], [
                        'data-pjax' => 0, 
                        'class' => 'btn btn-success', 
                        'title' => Yii::t('app', 'New Sponsor')
                    ])
                ],
                '{toggleData}' 
            ],
            'columns' => [
                'company_name',
                'company_sector',
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
            ],
        ]); ?>
    </div>    
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderCoacher,
            'filterModel' => $searchModelCoacher,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_WARNING, 
                'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Coachers List</strong>',
            ],
            'toolbar' =>  [ 
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'New Coacher'), ['create'], [
                        'data-pjax' => 0, 
                        'class' => 'btn btn-success', 
                        'title' => Yii::t('app', 'New Coacher')
                    ])
                ],
                '{toggleData}' 
            ],
            'columns' => [
                'name',
                'company_name',
                'topic',
                [
                    'attribute' => 'status',
                    'format'=>'raw',
                    'value' => function ($model, $index, $widget) { 
                        switch ($model->status) {
                            case 'New Request':
                                return '<span class="label label-default">New Request</span>';
                            case 'Follow Up':
                                return '<span class="label label-info">Follow Up</span>';
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
                        'Follow Up' => 'Follow Up', 
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
            ],
        ]); ?>
    </div>    
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderSpeaker,
            'filterModel' => $searchModelSpeaker,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_DEFAULT, 
                'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Speakers List</strong>',
            ],
            'toolbar' =>  [ 
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'New Speaker'), ['create'], [
                        'data-pjax' => 0, 
                        'class' => 'btn btn-success', 
                        'title' => Yii::t('app', 'New Speaker')
                    ])
                ],
                '{toggleData}' 
            ],
            'columns' => [
                'name',
                'company_name',
                'phone',
                [
                    'attribute' => 'status',
                    'format'=>'raw',
                    'value' => function ($model, $index, $widget) { 
                        switch ($model->status) {
                            case 'New Request':
                                return '<span class="label label-default">New Request</span>';
                            case 'Follow Up':
                                return '<span class="label label-info">Follow Up</span>';
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
                        'Follow Up' => 'Follow Up', 
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
            ],
        ]); ?>
    </div>    

    <div class="col-sm-12 col-md-6">
    </div>    
</div>

