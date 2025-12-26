<?php

namespace app\controllers\menu;

use app\exceptions\ExceptionFactory;
use app\helpers\WebResponse;
use app\models\Category;
use Throwable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;


class CategoriesController extends Controller
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
        $query = Category::find()->orderBy(['id' => SORT_DESC]);
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
     * Создание категории
     *
     * @return string|Response
     */
    public function actionCreate(): string|Response
    {
        try {
            $category = Yii::$app->request->get('id') === null ? new Category() :
                Category::findOne(Yii::$app->request->get('id'));

            if (Yii::$app->request->isPost) {
                if (!$category->load(Yii::$app->request->post()) || !$category->save()) {
                    throw ExceptionFactory::entityException('Ошибка сохранения');
                }

                $category->imageFile = UploadedFile::getInstance($category, 'imageFile');

                if ($category->imageFile) {
                    $category->uploadImage();
                    $category->save(false);
                }

                WebResponse::setSuccess('Категория успешно создана!');

                return $this->redirect(['index']);
            }

            return $this->render('create', ['category' => $category]);
        } catch (Throwable $e) {
            WebResponse::setError('Ошибка: ' . $e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Удаление категории
     *
     * @return string|Response
     *
     * @throws Throwable
     */
    public function actionDelete(): string|Response
    {
        try {
            $category = Category::getCategory(Yii::$app->request->get('id'));
            $category->delete();
        } catch (Throwable $e) {
            WebResponse::setError('Ошибка: ' . $e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}
