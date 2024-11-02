<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Offer $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="offer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-delete',
            'data-url' => Url::to(['delete', 'id' => $model->id]),
            'data-toggle' => 'modal',
            'data-target' => '#deleteModal',
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'phone',
            'created_at',
        ],
    ]) ?>

</div>
<!-- Модальное окно -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить этот оффер?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-danger" id="confirmDelete2">Удалить</button>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<<JS
$(document).ready(function() {
    var deleteUrl;

    // Устанавливаем URL для удаления, когда пользователь нажимает на кнопку удаления
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        deleteUrl = $(this).data('url');
        $('#deleteModal').modal('show');
    });

    // Обработчик для кнопки подтверждения удаления
    $('#confirmDelete2').on('click', function() {
        $.ajax({
            url: deleteUrl,
            type: 'POST',
            success: function(result) {
                if (result.success) {
                    window.location.href = '/web/offers'; 
                } else {
                    alert(result.message || 'Ошибка при удалении оффера.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Ошибка при удалении оффера:', textStatus, errorThrown);
                alert('Ошибка при удалении оффера. Проверьте консоль для подробностей.');
            }
        });
    });

    $('.btn-secondary, .close').on('click', function () {
        $('#deleteModal').modal('hide');
        deleteUrl = undefined;
    });
});

JS;

$this->registerJs($script);
?>
