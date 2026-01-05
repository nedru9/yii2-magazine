<?php

namespace app\controllers\menu;

use app\exceptions\ExceptionFactory;
use app\helpers\WebResponse;
use app\models\LoginForm;
use app\models\Order;
use app\models\rbac\AuthItem;
use app\models\RegisterForm;
use app\models\User;
use Exception;
use Throwable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'login', 'register'],
                'rules' => [
                    [
                        'actions' => ['login', 'register'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['cabinet'],
                        'allow' => true,
                        'roles' => [AuthItem::USER_ROLE],
                    ],
                    [
                        'actions' => ['index', 'delete', 'edit'],
                        'allow' => true,
                        'roles' => [AuthItem::MANAGER_ROLE],
                    ],
                ],
            ],
        ];
    }

    /**
     * Список пользователей
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $query = User::find();
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
     * Регистрация
     *
     * @return Response|string
     */
    public function actionRegister(): Response|string
    {
        $registerForm = new RegisterForm();

        try {
            $registerForm->load(Yii::$app->request->post());
            $user = new User();
            $user->email = $registerForm->email;
            $user->password_hash = Yii::$app->security->generatePasswordHash($registerForm->password);

            if ($user->save() === false) {
                throw ExceptionFactory::entityException('Ошибка сохранения пользователя');
            }

            $user->saveRole();
            Yii::$app->user->login($user);

            return $this->redirect(['/']);
        } catch (Throwable $e) {
            WebResponse::setError($e->getMessage());
            return $this->render('register', ['registerForm' => $registerForm]);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     * @throws Exception
     */
    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginForm = new LoginForm();

        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->login()) {
            return $this->goBack();
        }

        $loginForm->password = '';

        return $this->render('login', [
            'model' => $loginForm,
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

    /**
     * Кабинет пользователя
     *
     * @return string
     */
    public function actionCabinet(): string
    {
        $query = Order::find()->where(['email' => Yii::$app->user->identity->email])->orderBy(['id' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'totalCount' => $query->count(),
                'pageSize' => 12,
                'pageSizeLimit' => [1, 100],
            ],
        ]);

        return $this->render('cabinet', ['dataProvider' => $dataProvider]);
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
            $user = User::getUser(Yii::$app->request->get('id'));
            $user->delete();
        } catch (Throwable $e) {
            WebResponse::setError($e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Редактирование пользователя
     *
     * @return string|Response
     *
     * @throws Throwable
     */
    public function actionEdit(): string|Response
    {
        try {
            $user = User::getUser(Yii::$app->request->get('id'));
            $roles = Yii::$app->authManager->getRoles();

            if (Yii::$app->request->isPost) {
                if (!$user->load(Yii::$app->request->post()) || !$user->save()) {
                    throw ExceptionFactory::entityException('Ошибка сохранения');
                }

                $selectedRole = $user->role;

                if (!empty($selectedRole)) {
                    $authManager = Yii::$app->authManager;
                    $authManager->revokeAll($user->id);
                    $role = $authManager->getRole($selectedRole);
                    $authManager->assign($role, $user->id);
                }

                WebResponse::setSuccess('Пользователь успешно сохранен!');

                return $this->redirect(['index']);
            }

            return $this->render('edit', ['user' => $user, 'roles' => $roles]);
        } catch (Throwable $e) {
            WebResponse::setError($e->getMessage());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}