<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coacher */

$this->title = Yii::t('app', 'Create Coacher');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Coachers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
