<?php

namespace app\controllers\menu;

use app\entities\Favorite;
use app\exceptions\ExceptionFactory;
use app\helpers\WebResponse;
use app\models\Category;
use app\models\CategoryNews;
use app\models\LoginForm;
use app\models\News;
use app\models\NewsSearch;
use app\models\Product;
use app\models\ProductSearch;
use PHPUnit\Exception;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => [
                            'logout',
                            'say',
                            'index',
                            'shop-detail',
                            'about',
                            'faq',
                            'contact',
                            'blog',
                            'blog-details',
                            'shop',
                            'cart',
                            'checkout',
                            'wishlist',
                            'favorite-product'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
        return $this->render('checkout');
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
     * Отображение страницы с корзиной
     *
     * @return string
     */
    public function actionCart(): string
    {
        return $this->render('cart');
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
            $new = News::findOne(['id' => Yii::$app->request->get('id')]);

            if (empty($new)) {
                throw ExceptionFactory::entityException('Новость не найдена');
            }
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
     * Добавление в избранное
     *
     * @return string
     */
    public function actionFavoriteProduct(): string
    {
        try {
            $product = Product::getProduct(Yii::$app->request->get('id'));
            Favorite::toggleFavorite($product->id, Yii::$app->request);
            $favorites = Favorite::getFavorites(Yii::$app->response);
            $favoritesCount = count($favorites);
        } catch (\Exception $e) {
            return WebResponse::ajaxError($e->getMessage());
        }

        return WebResponse::ajaxSuccess(['favorites' => $favorites, 'favoritesCount' => $favoritesCount]);
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
        } catch (\Exception $e) {
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
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
