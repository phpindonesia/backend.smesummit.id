<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Speaker */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Speakers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="speaker-view">

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
            'heading' => '<i class="glyphicon glyphicon-book"></i>  <strong>Coacher Details</strong>',
            'footer' => '<div class="text-center text-muted">'. $model->name . ': ' . $model->company_name .'</div>'
        ],
        'buttons1' => '',
        'buttons2' => '',
        'attributes' => [
            // 'id',
            'name',
            'position',
            'company_name',
            'company_sector',
            'phone',
            'email:email',
            // 'photo',
            'last_education',
            'experience:ntext',
            'topic',
            // 'created_at',
        ],
    ]) ?>

</div>
