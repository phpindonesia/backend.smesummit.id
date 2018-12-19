<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sponsor */

$this->title = Yii::t('app', 'Create Sponsor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sponsors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sponsor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
