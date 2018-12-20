<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>For Internal</h1>
        <p class="lead">Backend Management for www.smesummit.id</p>
        <?php if (Yii::$app->user->isGuest): ?>
            <p>
                <a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']) ?>">Login</a>
            </p>
        <?php else: ?>
            <p>
                <a class="btn btn-lg btn-primary" href="<?= Url::to(['participant/index']) ?>">Participants</a>
                <a class="btn btn-lg btn-success" href="<?= Url::to(['sponsor/index']) ?>">Sponsors</a>
                <a class="btn btn-lg btn-info" href="<?= Url::to(['speaker/index']) ?>">Speakers</a>
                <a class="btn btn-lg btn-warning" href="<?= Url::to(['coacher/index']) ?>">Coachers</a>
                <a class="btn btn-lg btn-danger" href="<?= Url::to(['volunteer/index']) ?>">Volunteers</a>
            </p>
        <?php endif; ?>
    </div>

    <div class="body-content">
    </div>
</div>
