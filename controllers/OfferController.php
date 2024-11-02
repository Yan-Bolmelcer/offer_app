<?php

namespace app\controllers;

use Yii;
use app\models\Offer;
use app\models\OfferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OfferController реализует действия CRUD для модели Offer
 */
class OfferController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Отображение списка
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OfferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('_grid', [
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }



    /**
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException
     */

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */

    //Создание оффера
    public function actionCreate()
    {
        $model = new Offer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Возврат JSON для AJAX с уведомлением
            if (Yii::$app->request->isAjax) {
                return $this->asJson(['success' => true, 'message' => 'Оффер успешно создан.']);
            }

            Yii::$app->session->setFlash('success', 'Оффер успешно создан.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */

    //Изменение оффера
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Оффер успешно обновлён.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param int $id 
     * @return \yii\web\Response
     * @throws NotFoundHttpException 
     */

    //Удаление оффера
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Оффер успешно удалён.');

        if (Yii::$app->request->isAjax) {
            // Возврат JSON для AJAX
            return $this->asJson(['success' => true, 'redirect' => ['index']]);
        }

        // Обычное перенаправление для не AJAX-запросов
        return $this->redirect(['index']);
    }

    /**
     * @param int $id 
     * @return Offer
     * @throws NotFoundHttpException 
     */
    protected function findModel($id)
    {
        if (($model = Offer::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
