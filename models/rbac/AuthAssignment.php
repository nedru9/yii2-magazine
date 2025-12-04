<?php

namespace app\models\rbac;

use app\models\User;
use Throwable;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [
                ['item_name'],
                'exist',
                'skipOnError' => true,
                'targetClass' => AuthItem::class,
                'targetAttribute' => ['item_name' => 'name']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ItemName]].
     *
     * @return ActiveQuery
     */
    public function getItemName(): ActiveQuery
    {
        return $this->hasOne(AuthItem::class, ['name' => 'item_name']);
    }

    /**
     * Обновление роли у пользователя
     *
     * @param int $userId
     * @param string $roleName
     *
     * @return bool
     *
     * @throws Throwable
     * @throws StaleObjectException
     */
    public static function updateRole(int $userId, string $roleName): bool
    {
        $userRole = self::find()
            ->where(['user_id' => $userId])
            ->one();

        $userRole->item_name = $roleName;

        return $userRole->update();
    }

    /**
     * @param User $userModel
     *
     * @return $this
     */
    public function newUser(User $userModel): self
    {
        $this->user_id = (string)$userModel->id;
        $this->item_name = 'user';

        return $this;
    }

    /**
     * @return bool
     *
     * @throws StaleObjectException
     * @throws Throwable
     * @throws Exception
     */
    public function updateByUser(): bool
    {
        $oldRole = self::find()->where(['user_id' => $this->user_id])->one();

        return $oldRole->delete() && $this->save();
    }
}
