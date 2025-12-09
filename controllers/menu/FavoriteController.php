<?php

namespace app\controllers\menu;

use app\entities\Favorite;
use app\helpers\WebResponse;
use app\models\Product;
use Exception;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class FavoriteController extends Controller
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
                            'wishlist',
                            'favorite-product',
                        ],
                        'allow' => true,
                    ],
                ],
            ]
        ];
    }

    /**
     * Отображение страницы избранного
     *
     * @return string
     */
    public function actionWishlist(): string
    {
        $favorites = Favorite::getFavorites();
        $products = Product::find()->where(['id' => $favorites])->all();

        return $this->render('wishlist', ['products' => $products]);
    }

    /**
     * Добавление в избранное
     *
     * @return string
     */
    public function actionFavoriteProduct(): string
    {
        try {
            $product = Product::getProduct(Yii::$app->request->post('id'));
            Favorite::toggleFavorite($product->id, Yii::$app->request);
            $favorites = Favorite::getFavorites(Yii::$app->response);
            $favoritesCount = count($favorites);
        } catch (Exception $e) {
            return WebResponse::ajaxError($e->getMessage());
        }

        return WebResponse::ajaxSuccess(['favorites' => $favorites, 'favoritesCount' => $favoritesCount]);
    }
}
