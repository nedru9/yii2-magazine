<?php

namespace app\models;

use app\exceptions\ExceptionFactory;
use app\models\rbac\AuthAssignment;
use Exception;
use Yii;
use yii\db\ActiveRecord;
use yii\rbac\Role;
use yii\web\IdentityInterface;


/**
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property int $blocked_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    public string $role = '';
    public array $permissions = [];
    public function rules(): array
    {
        return [
            [['email', 'password_hash'], 'required'],
            [['id', 'blocked_at'], 'integer'],
            [['email'], 'unique'],
            [
                [
                    'email',
                    'auth_key',
                    'password_hash',
                ],
                'string',
                'max' => 255
            ],
            [['auth_key'], 'default', 'value' => 'generateAuthKey'],

        ];
    }

    /**
     * @param $id
     *
     * @return User|IdentityInterface|null
     */
    public static function findIdentity($id): User|IdentityInterface|null
    {
        return static::findOne($id);
    }

    /**
     * @param $token
     * @param $type
     *
     * @return User|IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null): User|IdentityInterface|null
    {
        return self::findOne(['access_token' => $token]);
    }

    /**
     * @param $email
     *
     * @return array|ActiveRecord|null
     */
    public static function findByEmail($email): array|ActiveRecord|null
    {
        return self::find()
            ->where(['email' => $email])
            ->one();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    /**
     * @param $authKey
     *
     * @return bool
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @param string $password
     *
     * @return bool
     */
    public function validatePassword(string $password): bool
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /**
     * @throws Exception
     */
    public function saveRole(): bool
    {
        $userRole = new AuthAssignment()->newUser($this);

        if ($userRole->save() === false) {
            throw ExceptionFactory::entityException('Ошибка сохранения роли');
        }

        return true;
    }

}
