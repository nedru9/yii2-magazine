<?php

namespace app\models\rbac;

use Throwable;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property int $type
 * @property string|null $description
 * @property string|null $rule_name
 * @property resource|null $data
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren0
 * @property AuthItem[] $children
 * @property AuthItem[] $parents
 */
class AuthItem extends ActiveRecord
{
    public const int TYPE_PERMISSION = 2;
    public const int TYPE_ROLE = 1;
    public const string USER_ROLE = 'user';
    public const string MANAGER_ROLE = 'manager';

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'auth_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [
                ['rule_name'],
                'exist',
                'skipOnError' => true,
                'targetAttribute' => ['rule_name' => 'name']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'name' => 'Наименование',
            'type' => 'Тип',
            'description' => 'Описание',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AuthAssignments]].
     *
     * @return ActiveQuery
     */
    public function getAuthAssignments(): ActiveQuery
    {
        return $this->hasMany(AuthAssignment::class, ['item_name' => 'name']);
    }

    /**
     * Gets query for [[AuthItemChildren]].
     *
     * @return ActiveQuery
     */
    public function getAuthItemChildren(): ActiveQuery
    {
        return $this->hasMany(AuthItemChild::class, ['parent' => 'name']);
    }

    /**
     * Gets query for [[AuthItemChildren0]].
     *
     * @return ActiveQuery
     */
    public function getAuthItemChildren0(): ActiveQuery
    {
        return $this->hasMany(AuthItemChild::class, ['child' => 'name']);
    }

    /**
     * Gets query for [[Children]].
     *
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getChildren(): ActiveQuery
    {
        return $this->hasMany(AuthItem::class, ['name' => 'child'])
            ->viaTable('auth_item_child', ['parent' => 'name']);
    }

    /**
     * Gets query for [[Parents]].
     *
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getParents(): ActiveQuery
    {
        return $this->hasMany(AuthItem::class, ['name' => 'parent'])
            ->viaTable('auth_item_child', ['child' => 'name']);
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->find()
            ->where(['type' => self::TYPE_PERMISSION])
            ->all();
    }

    /**
     * Список разрешений для поиска
     *
     * @return array
     */
    public function getPermissionsList(): array
    {
        $permissionsList = [];
        $permissions = $this->getPermissions();

        /** @var AuthItem $permission */
        foreach ($permissions as $permission) {
            $permissionsList[$permission->name] = ['content' => $permission->description];
        }

        return $permissionsList;
    }

    /**
     * @param string $name
     *
     * @return bool
     *
     * @throws Throwable
     * @throws StaleObjectException
     */
    public static function deleteByName(string $name): bool
    {
        return self::find()
            ->where(['name' => $name])
            ->one()
            ->delete();
    }

    /**
     * @param string $name
     *
     * @return array|ActiveRecord|null
     */
    public static function getByName(string $name): array|ActiveRecord|null
    {
        return self::find()
            ->where(['name' => $name])
            ->one();
    }

    /**
     * Получение списка типов
     *
     * @return string[]
     */
    public static function getList(): array
    {
        return [
            self::TYPE_ROLE => 'Роль',
            self::TYPE_PERMISSION => 'Разрешение',
        ];
    }
}
