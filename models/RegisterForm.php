<?php

namespace app\models;

use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public string $email = '';
    public string $password = '';

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['email', 'password'], 'required'],
        ];
    }
}
