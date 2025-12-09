<?php

namespace app\controllers\menu;

use app\helpers\WebResponse;
use app\models\Product;
use Exception;
use Throwable;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class CartController extends Controller
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
                            'add',
                            'remove',
                            'cart',
                            'update',
                            'main-cart'
                        ],
                        'allow' => true,
                    ],
                ],
            ]
        ];
    }

    /**
     * Добавление товара
     *
     * @return false|string
     */
    public function actionAdd(): false|string
    {
        try {
            $productId = Yii::$app->request->post('id');
            $count = Yii::$app->request->post('count', 1);
            $product = Product::getProduct($productId);
            Yii::$app->cart->add($product, $count);

            return WebResponse::ajaxSuccess(['cartCount' => Yii::$app->cart->getTotalCount()]);
        } catch (Exception $e) {
            return WebResponse::ajaxError($e->getMessage());
        }
    }

    /**
     * Удаление товара
     *
     * @return string
     */
    public function actionRemove(): string
    {
        try {
            $productId = Yii::$app->request->post('id');
            Yii::$app->cart->remove($productId);

            return WebResponse::ajaxSuccess(
                ['cartCount' => Yii::$app->cart->getTotalCount(), 'total' => Yii::$app->cart->getTotalSum(),]
            );
        } catch (Exception $e) {
            return WebResponse::ajaxError($e->getMessage());
        }
    }

    /**
     * Отображение страницы с корзиной
     *
     * @return string
     */
    public function actionCart(): string
    {
        return $this->render('cart');
    }

    /**
     * Обновление количества товара
     *
     * @return false|string
     */
    public function actionUpdate(): false|string
    {
        try {
            $productId = Yii::$app->request->post('id');
            $count = (int)Yii::$app->request->post('count', 1);
            $product = Product::getProduct($productId);
            $available = $product->count;

            if ($available <= 0) {
                Yii::$app->cart->remove($productId);

                return WebResponse::ajaxSuccess([
                    'removed' => true,
                    'cartCount' => Yii::$app->cart->getTotalCount(),
                    'total' => Yii::$app->cart->getTotalSum(),
                ]);
            }

            if ($count < 1) {
                $count = 1;
            }

            if ($count > $available) {
                $count = $available;
            }

            Yii::$app->cart->updateCount($productId, $count);

            return WebResponse::ajaxSuccess([
                'removed' => false,
                'max' => $available,
                'count' => $count,
                'itemTotal' => $count * $product->price,
                'cartCount' => Yii::$app->cart->getTotalCount(),
                'total' => Yii::$app->cart->getTotalSum(),
            ]);
        } catch (Throwable $e) {
            return WebResponse::ajaxError($e->getMessage());
        }
    }

    public function actionMainCart(): string
    {
        return $this->renderPartial('_main', [
            'cart' => Yii::$app->cart->getCart()
        ]);
    }
}
