<?php

namespace app\controllers\menu;

use app\exceptions\ExceptionFactory;
use app\helpers\WebResponse;
use app\models\rbac\AuthItem;
use Throwable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class RolesController extends Controller
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
                        'actions' => ['index', 'delete', 'create'],
                        'allow' => true,
                        'roles' => [AuthItem::MANAGER_ROLE],
                    ],
                ],
            ],
        ];
    }

    /**
     * Список ролей
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $query = AuthItem::find();
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
     * Удаление пользователя
     *
     * @return string|Response
     *
     * @throws Throwable
     */
    public function actionDelete(): string|Response
    {
        try {
            AuthItem::deleteByName(Yii::$app->request->get('id'));
        } catch (Throwable $e) {
            WebResponse::setError($e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Создание роли
     *
     * @return string|Response
     */
    public function actionCreate(): string|Response
    {
        try {
            $role = Yii::$app->request->get('id') === null ? new AuthItem() :
                AuthItem::findOne(['name' => Yii::$app->request->get('id')]);

            if (Yii::$app->request->isPost) {
                if (!$role->load(Yii::$app->request->post()) || !$role->save()) {
                    throw ExceptionFactory::entityException('Ошибка сохранения');
                }

                WebResponse::setSuccess('Роль успешно создана!');

                return $this->redirect(['index']);
            }

            return $this->render('create', ['role' => $role]);
        } catch (Throwable $e) {
            WebResponse::setError('Ошибка: ' . $e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}
