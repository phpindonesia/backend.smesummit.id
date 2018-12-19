<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>For Internal</h1>

        <p class="lead">Backend Management for www.smesummit.id</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']) ?>">Login</a></p>
    </div>

    <div class="body-content">

    </div>
</div>
