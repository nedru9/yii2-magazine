<?php

namespace app\controllers\menu;

use app\helpers\WebResponse;
use app\models\Order;
use app\models\OrderItem;
use app\models\Product;
use Exception;
use Throwable;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class CheckoutController extends Controller
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

                        'actions' => [
                            'index',
                            'success',
                        ],
                        'allow' => true,
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        $cart = Yii::$app->cart->getCart();

        if (!$cart->hasProducts()) {
            return $this->redirect(['/cart']);
        }

        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Устанавливаем сумму заказа
            $model->total = $cart->getTotalSum();

            if ($model->save()) {
                // Сохраняем товары
                foreach ($cart->getProducts() as $item) {
                    $orderItem = new OrderItem([
                        'order_id'   => $model->id,
                        'product_id' => $item['id'],
                        'name'       => $item['name'],
                        'price'      => $item['price'],
                        'count'      => $item['count'],
                        'total'      => $item['total'],
                    ]);
                    $orderItem->save(false);
                }

                // Очищаем корзину
                $cart->clear();

                return $this->redirect(['/checkout/success', 'id' => $model->id]);
            }
        }

        return $this->render('index', [
            'model' => $model,
            'cart' => $cart,
        ]);
    }

    public function actionSuccess(int $id)
    {
        $order = Order::findOne($id);
        return $this->render('success', ['order' => $order]);
    }
}
