<?php

namespace app\controllers\menu;

use app\exceptions\ExceptionFactory;
use app\helpers\WebResponse;
use app\models\Order;
use Throwable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;


class OrdersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'delete', 'edit'],
                        'allow' => true,
                        'roles' => ['manager'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Отображение списка заказов
     *
     * @return Response|string
     */
    public function actionIndex(): Response|string
    {
        $query = Order::find()->orderBy(['id' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'totalCount' => $query->count(),
                'pageSize' => 12,
                'pageSizeLimit' => [1, 100],
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider,]);
    }

    /**
     * Удаление заказа
     *
     * @return string|Response
     *
     * @throws Throwable
     */
    public function actionDelete(): string|Response
    {
        try {
            $order = Order::getOrder(Yii::$app->request->get('id'));
            $order->delete();
        } catch (Throwable $e) {
            WebResponse::setError($e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Редактирование заказа
     *
     * @return string|Response
     *
     * @throws Throwable
     */
    public function actionEdit(): string|Response
    {
        try {
            $order = Order::getOrder(Yii::$app->request->get('id'));

            if (Yii::$app->request->isPost) {
                if (!$order->load(Yii::$app->request->post()) || !$order->save()) {
                    throw ExceptionFactory::entityException('Ошибка сохранения');
                }

                WebResponse::setSuccess('Заказ успешно сохранен!');

                return $this->redirect(['index']);
            }

            return $this->render('edit', ['order' => $order]);
        } catch (Throwable $e) {
            WebResponse::setError($e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}
