<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'SME Summit Backend');
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
                [
                    'attribute' => 'name',
                    'format'=> 'raw',
                    'value' => function ($model, $index, $widget) { 
                        return Html::a($model->name,
                            Url::to(['/participant/view', 'id'=>$model->id]),
                            ['class'=>'kv-author-link']
                        );
                    },
                ],
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
            'dataProvider' => $dataProviderPayment,
            'filterModel' => $searchModelPayment,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_SUCCESS, 
                'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Payment Confirmations List</strong>',
            ],
            'toolbar' =>  [ 
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'New Payment Confirmation'), ['create'], [
                        'data-pjax' => 0, 
                        'class' => 'btn btn-success', 
                        'title' => Yii::t('app', 'New Payment Confirmation')
                    ])
                ],
                '{toggleData}' 
            ],
            'columns' => [
                [
                    'attribute' => 'email_user_id',
                    'header' => 'Participant Name',
                    'value' => function ($model, $index, $widget) { 
                        $link = Html::a($model->participant->name,
                            Url::to(['/payment-confirmation/view', 'id'=>$model->id]),
                            ['class'=>'kv-author-link']
                        );
                        return $link;
                    },
                    'noWrap' => true,
                    'format' => 'raw',
                    'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '20%' ]
                ],
                [
                    'attribute' => 'total_payment',
                    'format' => ['decimal',0],
                    'contentOptions' => [ 'class' => 'kv-align-middle kv-align-right', 'width' => '5%' ]
                ],
                [
                    'attribute' => 'date_transfer',
                    'noWrap' => true,
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
                'type' => GridView::TYPE_INFO, 
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
                [
                    'attribute' => 'name',
                    'format'=> 'raw',
                    'value' => function ($model, $index, $widget) { 
                        return Html::a($model->name,
                            Url::to(['/speaker/view', 'id'=>$model->id]),
                            ['class'=>'kv-author-link']
                        );
                    },
                ],
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
                [
                    'attribute' => 'name',
                    'format'=> 'raw',
                    'value' => function ($model, $index, $widget) { 
                        return Html::a($model->name,
                            Url::to(['/volunteer/view', 'id'=>$model->id]),
                            ['class'=>'kv-author-link']
                        );
                    },
                ],
                'phone',
                'city',
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
                [
                    'attribute' => 'company_name',
                    'format'=> 'raw',
                    'value' => function ($model, $index, $widget) { 
                        return Html::a($model->company_name,
                            Url::to(['/sponsor/view', 'id'=>$model->id]),
                            ['class'=>'kv-author-link']
                        );
                    },
                ],
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
                [
                    'attribute' => 'name',
                    'format'=> 'raw',
                    'value' => function ($model, $index, $widget) { 
                        return Html::a($model->name,
                            Url::to(['/coacher/view', 'id'=>$model->id]),
                            ['class'=>'kv-author-link']
                        );
                    },
                ],
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

