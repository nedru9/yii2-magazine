<?php

namespace app\controllers\menu;

use app\exceptions\ExceptionFactory;
use app\helpers\WebResponse;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use Throwable;
use Yii;
use yii\db\Exception;
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
                ],
            ],
        ];
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
     * @throws \Exception
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

}