<?php

namespace app\controllers\menu;

use app\models\Product;
use Yii;
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
                        'actions' => ['create', 'index'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * Отображение списка товаров
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $products = Product::find()->all();

        return $this->render('index', ['products' => $products]);
    }

    /**
     * Создание товара
     *
     * @return string|Response
     */
    public function actionCreate(): string|Response
    {
        try {
            $product = new Product();

            if (Yii::$app->request->isPost) {
                if (!$product->load(Yii::$app->request->post()) && !$product->save()) {
                    throw new Exception('Ошибка');
                }

                $product->imageFile = UploadedFile::getInstance($product, 'imageFile');
                $product->uploadImage();
                $product->save(false);
                Yii::$app->session->setFlash('success', 'Товар успешно создан!');

                return $this->redirect(['index']);
            }

            return $this->render('create', ['product' => $product]);
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', 'Ошибка: ' . $e->getMessage());
        }

        return $this->redirect(['index']);
    }
}
