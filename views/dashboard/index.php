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
            ],
        ]); ?>
    </div>
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderVolunteer,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_INFO, 
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
                'email:email',
            ],
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderSponsor,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_INFO, 
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
                'phone',
            ],
        ]); ?>
    </div>    
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderCoacher,
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => GridView::TYPE_INFO, 
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
            ],
        ]); ?>
    </div>    
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <?= GridView::widget([
            'dataProvider' => $dataProviderSpeaker,
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
                'name',
                'phone',
            ],
        ]); ?>
    </div>    

    <div class="col-sm-12 col-md-6">
    </div>    
</div>

