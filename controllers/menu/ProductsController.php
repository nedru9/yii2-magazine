<?php

namespace app\controllers\menu;

use app\exceptions\ExceptionFactory;
use app\helpers\WebResponse;
use app\models\Product;
use Throwable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;


class ProductsController extends Controller
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
                        'actions' => ['create', 'index', 'delete'],
                        'allow' => true,
                        'roles' => ['manager'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Отображение списка товаров
     *
     * @return Response|string
     */
    public function actionIndex(): Response|string
    {
        $query = Product::find()->orderBy(['id' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'totalCount' => $query->count(),
                'pageSize' => 12,
                'pageSizeLimit' => [1, 100],
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * Создание товара
     *
     * @return string|Response
     */
    public function actionCreate(): string|Response
    {
        try {
            $product = Yii::$app->request->get('id') === null ? new Product() :
                Product::findOne(Yii::$app->request->get('id'));

            if (Yii::$app->request->isPost) {
                if (!$product->load(Yii::$app->request->post()) || !$product->save()) {
                    throw ExceptionFactory::entityException('Ошибка сохранения');
                }

                $product->imageFile = UploadedFile::getInstance($product, 'imageFile');

                if ($product->imageFile) {
                    $product->uploadImage();
                    $product->save(false);
                }

                WebResponse::setSuccess('Товар успешно создан!');

                return $this->redirect(['index']);
            }

            return $this->render('create', ['product' => $product]);
        } catch (Exception $e) {
            WebResponse::setError($e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Удаление товара
     *
     * @return string|Response
     *
     * @throws Throwable
     */
    public function actionDelete(): string|Response
    {
        try {
            $product = Product::getProduct(Yii::$app->request->get('id'));
            $product->delete();
        } catch (Throwable $e) {
            WebResponse::setError($e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}
