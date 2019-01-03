<?php

use kartik\grid\GridView;
?>

<div class="row">
    <div class="col-md-4">
    <h4>Participant</h4>


        <?= GridView::widget([
            'dataProvider' => $dataProviderParticipant,
            'bordered' => true,
            'striped' => true,
            'condensed' => false,
            'responsive' => true,
            'columns' => [
                //['class' => 'kartik\grid\SerialColumn'],

                // 'id',
                'name',
                'company_name',
                //'position',
                // 'company_sector',
                // 'email:email',
                //'phone',
                //'sector_to_be_coached',
                // 'problem_desc:ntext',
                // 'created_at',

                //['class' => 'kartik\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

    <div class="col-md-4">
    <h4>Coacher</h4>


        <?= GridView::widget([
            'dataProvider' => $dataProviderCoacher,
            'bordered' => true,
            'striped' => true,
            'condensed' => false,
            'responsive' => true,
            'hover' => true,
            'columns' => [
                //['class' => 'kartik\grid\SerialColumn'],

                // 'id',
                'name',
                'company_name',
                //'position',
                // 'email:email',
                // 'photo',
                // 'last_education',
                // 'experience:ntext',
                //'phone',
                // 'sector',
                //'topic',
                // 'created_at',
            ],
        ]); ?>

    </div>    

    <div class="col-md-4">
    <h4>Sponsor</h4>


        <?= GridView::widget([
            'dataProvider' => $dataProviderSponsor,
            'bordered' => true,
            'striped' => true,
            'condensed' => false,
            'responsive' => true,
            'columns' => [
                //['class' => 'kartik\grid\SerialColumn'],

                // 'id',
                'company_name',
                'company_sector',
                // 'email_pic:email',
                'phone',
                //'sponsor_type',
                // 'created_at',

                //['class' => 'kartik\grid\ActionColumn'],
            ],
        ]); ?>
    </div>    
</div>

<div class="row">
    <div class="col-md-4">
    <h4>Volunteer</h4>


        <?= GridView::widget([
            'dataProvider' => $dataProviderVolunteer,
            'bordered' => true,
            'striped' => true,
            'condensed' => false,
            'responsive' => true,
            'columns' => [
                //['class' => 'kartik\grid\SerialColumn'],

                // 'id',
                'name',
                'email:email',
                //'phone',
                //'why_you_apply_desc:ntext',
                // 'created_at',

                //['class' => 'kartik\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

    <div class="col-md-4">
    <h4>Speaker</h4>


        <?= GridView::widget([
            'dataProvider' => $dataProviderSpeaker,
            'bordered' => true,
            'striped' => true,
            'condensed' => false,
            'responsive' => true,
            'columns' => [
                //['class' => 'kartik\grid\SerialColumn'],

                // 'id',
                'name',
                // 'email:email',
                // 'photo',
                // 'last_education',
                // 'experience:ntext',
                'phone',
                //'topic',
                //'company_name',
                //'position',
                // 'sector',
                // 'created_at',

                //['class' => 'kartik\grid\ActionColumn'],
            ],
        ]); ?>

    </div>    

    <div class="col-md-4">

    </div>    
</div>

