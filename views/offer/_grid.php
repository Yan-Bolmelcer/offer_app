<?php

use app\models\Offer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\data\ActiveDataProvider $dataProvider */

echo GridView::widget([
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
]);
