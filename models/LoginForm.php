<?php

namespace app\models;

use Exception;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    public bool $rememberMe = false;

    private ?User $user;


    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['email', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['email', 'validateUserExist'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Проверка пароля
     *
     * @return void
     *
     * @throws Exception
     */
    public function validatePassword(): void
    {
        if (!$this->hasErrors()) {
            if ($this->user->validatePassword($this->password) === false) {
                $this->addError('email', 'Неверные почта или пароль');
                $this->addError('password', 'Неверные почта или пароль');
            }
        }
    }

    /**
     * Проверка существования пользователя
     *
     * @return void
     */
    public function validateUserExist(): void
    {
        if ($this->user === null) {
            $this->addError('error', "Пользователь $this->email не найден");
        }
    }

    /**
     * @return bool
     *
     * @throws Exception
     */
    public function login(): bool
    {
        $this->searchUser();

        if ($this->validate()) {
            return Yii::$app->user->login(
                $this->user,
                $this->getDuration()
            );
        }

        return false;
    }

    /**
     * @return self
     */
    public function searchUser(): self
    {
        $this->user = User::findByEmail($this->email);

        return $this;
    }

    /**
     * @return int
     */
    private function getDuration(): int
    {
        return $this->rememberMe ? self::rememberTime() : 0;
    }

    /**
     * @param int $hourCount
     *
     * @return int
     */
    public static function rememberTime(int $hourCount = 1): int
    {
        return 60 * 60 * $hourCount;
    }
}
