<?php

namespace app\models;

use app\exceptions\ExceptionFactory;
use app\models\rbac\AuthAssignment;
use Exception;
use Yii;
use yii\db\ActiveRecord;
use yii\rbac\Permission;
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
    /**
     * @var Permission[]
     */
    private array $userPermissions;

    public string $role = '';
    public array $permissions = [];
    public string $newPassword = '';

    public function rules(): array
    {
        return [
            [['email', 'password_hash'], 'required'],
            [['id', 'blocked_at'], 'integer'],
            [['role'], 'string'],
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

    /**
     * Получение роли
     *
     * @return Role|null
     */
    public function getRoleForUser(): Role|null
    {
        $role = array_values(Yii::$app->authManager->getRolesByUser($this->id));

        return !empty($role[0]) ? $role[0] : null;
    }

    /**
     * @param string $permissionName
     * @param array $params
     * @param bool $allowCaching
     *
     * @return bool
     */
    public function can(string $permissionName, array $params = [], bool $allowCaching = true): bool
    {
        return isset($this->getUserPermissions()[$permissionName]);
    }

    /**
     * @return Permission[]
     */
    public function getUserPermissions(): array
    {
        if (isset($this->userPermissions) === false) {
            $this->userPermissions = Yii::$app->authManager->getPermissionsByUser($this->id);
        }

        return $this->userPermissions;
    }

    /**
     * Поиск пользователя по Id
     *
     * @param int $id
     *
     * @return self
     */
    public static function getUser(int $id): self
    {
        $user = self::findOne($id);

        if (empty($user)) {
            throw ExceptionFactory::entityException('Пользователь не найден');
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'role' => 'Роль',
            'newPassword' => 'Новый пароль',
        ];
    }

    /**
     * @param $password
     *
     * @return void
     *
     * @throws \yii\base\Exception
     */
    public function setPassword($password): void
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Загрузка роли пользователя
     *
     * @return void
     */
    public function loadUserRole(): void
    {
        $authManager = Yii::$app->authManager;
        $userRole = $authManager->getRolesByUser($this->id);

        if (!empty($userRole)) {
            $this->role = key($userRole);
        }
    }
}
