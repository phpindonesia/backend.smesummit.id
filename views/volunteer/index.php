<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VolunteerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Volunteers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="volunteer-index">

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
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Volunteers List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create New Volunteer'), ['create'], [
                    'data-pjax' => 0, 
                    'class' => 'btn btn-success', 
                    'title' => Yii::t('app', 'Create New Volunteer')
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
                'attribute' => 'city',
                'contentOptions' => [ 'class' => 'kv-align-middle', 'width' => '10%' ]
            ],
            // 'email:email',
            'phone',
            'why_you_apply_desc:ntext',
            // 'created_at',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'noWrap' => true,
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

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
