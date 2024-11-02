<?php

use app\models\Offer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
$this->title = 'Офферы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить оффер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Форма для фильтрации -->
    <div class="filter-form">
        <?php $form = ActiveForm::begin([
            'id' => 'filter-form',
            'action' => ['index'],
            'method' => 'get',
            'options' => ['data-pjax' => true],
        ]); ?>

        <?= $form->field($searchModel, 'name')->textInput(['placeholder' => 'Поиск по названию оффера'])->label(false) ?>
        <?= $form->field($searchModel, 'email')->textInput(['placeholder' => 'Поиск по Email'])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div id="grid-container">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name',
                'email:email',
                'phone',
                'created_at',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'delete' => function ($url, Offer $model) {
                            return Html::button('<i class="fa fa-trash"></i> Удалить', [
                                'class' => 'btn btn-danger btn-delete',
                                'data-url' => $url,
                                'data-toggle' => 'modal',
                                'data-target' => '#deleteModal',
                                'aria-label' => 'Удалить',
                            ]);
                        },
                        'view' => function ($url, Offer $model) {
                            return Html::a('<i class="fa fa-eye"></i>', $url, [
                                'class' => 'btn btn-info',
                                'title' => 'Просмотреть',
                                'aria-label' => 'Просмотреть',
                            ]);
                        },
                        'update' => function ($url, Offer $model) {
                            return Html::a('<i class="fa fa-pencil-alt"></i>', $url, [
                                'class' => 'btn btn-warning',
                                'title' => 'Редактировать',
                                'aria-label' => 'Редактировать',
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, Offer $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
            'pager' => [
                'class' => \yii\widgets\LinkPager::class,
                'pagination' => $dataProvider->pagination,
            ],
        ]); ?>
    </div>
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
                <button type="button" class="btn btn-danger" id="confirmDelete">Удалить</button>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<<JS
$(document).ready(function() {
    var deleteUrl;

    // Устанавливаем URL для удаления, когда пользователь нажимает на кнопку удаления
    $('.btn-delete').on('click', function() {
        deleteUrl = $(this).data('url'); // Получаем URL из атрибута data-url
        $('#deleteModal').modal('show'); // Показываем модальное окно
    });

    // Обработчик для кнопки подтверждения удаления
    $('#confirmDelete').on('click', function() {
        $.ajax({
            url: deleteUrl,
            type: 'POST',
            success: function(result) {
                if (result.success) {
                    location.reload();
                } else {
                    alert(result.message || 'Ошибка при удалении оффера.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Ошибка при удалении оффера:', textStatus, errorThrown);
            }
        });
    });

    // Закрываем модальное окно при нажатии на кнопку "Отмена" или вне модального окна
    $('.btn-secondary, .close').on('click', function () {
        $('#deleteModal').modal('hide');
        deleteUrl = undefined; // Сбрасываем URL удаления
    });

   // Уведомлениe
    $(document).ready(function() {
        var flashMessage = $('#w4-success-0');

        if (flashMessage.length) {
            flashMessage.hide().fadeIn(500);
            setTimeout(function() {
                flashMessage.fadeOut(500, function() {
                    $(this).remove();
                });
            }, 3000);
        }
    });

    // AJAX для фильтрации
    $('#filter-form').on('beforeSubmit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (data) {
                $('#grid-container').html(data);
            }
        });
        return false;
    });
});
JS;
$this->registerJs($script);
?>