<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Offer $model */

$this->title = 'Добавление оффера';
$this->params['breadcrumbs'][] = ['label' => 'Офферы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>