<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Volunteer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Volunteers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="volunteer-view">

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
            'heading' => '<i class="glyphicon glyphicon-book"></i>  <strong>Volunteer Details</strong>',
            'footer' => '<div class="text-center text-muted">'. $model->name .'</div>'
        ],
        'buttons1' => '',
        'buttons2' => '',
        'attributes' => [
            // 'id',
            [
                'columns' => [
                    [
                        'attribute' => 'name',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'phone',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'city',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                    [
                        'attribute' => 'email',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:30%' ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'why_you_apply_desc',
                        'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
                        'valueColOptions' => [ 'style'=>'width:80%' ],
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
