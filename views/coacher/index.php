<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Coachers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coacher-index">

    <h1><?= Html::encode($this->title) ?><br></h1>
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
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>   <strong>Coachers List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create New Coacher'), ['create'], [
                    'data-pjax' => 0, 
                    'class' => 'btn btn-success', 
                    'title' => Yii::t('app', 'Create New Coacher')
                ])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'name',
            'company_name',
            'position',
            // 'email:email',
            // 'photo',
            // 'last_education',
            // 'experience:ntext',
            'phone',
            // 'company_sector',
            'topic',
            // 'created_at',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
