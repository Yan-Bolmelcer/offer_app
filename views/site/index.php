<?php

/** @var yii\web\View $this */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Мини-приложение "Offers"</h1>

        <p class="lead">Перейти к списку офферов можно по кнопке ниже.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['offer/index']) ?>">Офферы</a></p>

    </div>
</div>

