<?php

namespace app\controllers\menu;

use app\helpers\WebResponse;
use app\models\Category;
use app\models\CategoryNews;
use app\models\News;
use app\models\NewsSearch;
use app\models\Product;
use app\models\ProductSearch;
use Exception;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    public const string LAYOUT_ERROR = 'error';

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
                            'error',
                            'say',
                            'index',
                            'shop-detail',
                            'about',
                            'faq',
                            'contact',
                            'blog',
                            'blog-details',
                            'shop',
                            'checkout',
                        ],
                        'allow' => true,
                    ],
                ],
            ]
        ];
    }

    /**
     * Отображение главной страницы
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $categories = Category::find()->all();
        $news = News::find()->all();

        return $this->render(
            'index',
            [
                'categories' => $categories,
                'news' => $news,
                'products' => Product::find()->all(),
            ]
        );
    }

    /**
     * Отображение страницы ЧЗВ
     *
     * @return string
     */
    public function actionFaq(): string
    {
        return $this->render('faq');
    }

    /**
     * Отображение страницы оформления заказа
     *
     * @return string
     */
    public function actionCheckout(): string
    {
        //тут проверка если корзина пуста то перекидывать на корзину, если не пуста то в оформление заказа
        $cart = Yii::$app->cart->getCart();

        return $this->render('checkout', ['cart' => $cart]);
    }

    /**
     * Отображение страницы контактов
     *
     * @return string
     */
    public function actionContact(): string
    {
        return $this->render('contact');
    }

    /**
     * Отображение страницы блога
     *
     * @return string
     */
    public function actionBlog(): string
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categories = CategoryNews::getList();
        $category = null;
        $categoryId = $searchModel->categoryId;

        if (!empty($categoryId)) {
            $category = CategoryNews::getCategory($categoryId);
        }

        return $this->render('blog', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'category' => $category
        ]);
    }

    /**
     * Отображение детальной новости
     *
     * @return Response|string
     */
    public function actionBlogDetails(): Response|string
    {
        try {
            $new = News::getNew(Yii::$app->request->get('id'));
        } catch (Exception $e) {
            WebResponse::setError('Ошибка: ' . $e->getMessage());

            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('blog-details', ['new' => $new]);
    }

    /**
     * Страница товаров
     *
     * @return string
     */
    public function actionShop(): string
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $category = null;

        if (!empty($searchModel->categoryId)) {
            $category = Category::getCategory($searchModel->categoryId);
        }

        return $this->render('shop', [
            'dataProvider' => $dataProvider,
            'category' => $category,
        ]);
    }

    /**
     * Отображение страницы товара
     *
     * @return Response|string
     */
    public function actionShopDetail(): Response|string
    {
        try {
            $product = Product::getProduct(Yii::$app->request->get('id'));
            $products = Product::findAll(['categoryId' => $product->categoryId]);
        } catch (Exception $e) {
            WebResponse::setError($e->getMessage());

            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('shop-details', ['product' => $product, 'products' => $products]);
    }

    /**
     * Отображение страницы О нас
     *
     * @return Response|string
     */
    public function actionAbout(): Response|string
    {
        return $this->render('about');
    }

    /**
     * Общая страница для ошибки
     *
     * @return string
     */
    public function actionError(): string
    {
        return $this->render('error', [
            'errorHandler' => Yii::$app->errorHandler
        ]);
    }
}
