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
 * @property AuthRule $ruleName
 */
class AuthItem extends ActiveRecord
{
    public const int TYPE_PERMISSION = 2;
    public const int TYPE_ROLE = 1;

    public const string RULE_BASE = 'user';
    public const string RULE_API = 'view_api';
    public const string RULE_EDIT_REGION = 'region_edit';
    public const string RULE_MORTGAGE_ALL = 'mortgage_view_all';
    public const string RULE_MORTGAGE_VIEW_POINTS = 'mortgage_view_points';
    public const string RULE_MORTGAGE_TARIFFS = 'mortgage_tariffs';
    public const string RULE_MORTGAGE_LIST = 'mortgage_list';
    public const string RULE_MORTGAGE_TARIFF_EDIT = 'mortgage_edit_tariff';
    public const string RULE_MORTGAGE_EDIT_ALL = 'mortgage_edit_all';
    public const string RULE_MORTGAGE_EDIT_PAYED = 'mortgage_edit_payed';
    public const string RULE_COMPLIANCE = 'compliance';
    public const string RULE_AGENTS = 'agents';
    public const string RULE_INSUREDS = 'insured_view';
    public const string RULE_INSUREDS_ALL = 'insured_list';
    public const string RULE_INSUREDS_EDIT = 'insured_edit';
    public const string RULE_DFM_FINAL_CREATE = 'dfm_final_create';
    public const string RULE_DMS_PARAMS = 'dms_params';
    public const string RULE_DMS = 'dms';
    public const string RULE_ADMIN_USERS = 'admin_users';
    public const string RULE_ADMIN_ROLES = 'admin_roles';
    public const string RULE_ADMIN_PAYMENTS = 'admin_payments';
    public const string RULE_ADMIN = 'admin_panel';
    public const string RULE_ADMIN_CFO = 'admin_cfo';
    public const string RULE_ADMIN_LOGS = 'admin_logs';
    public const string RULE_ADMIN_PERIOD = 'admin_period';
    public const string RULE_ADMIN_EDIT_AGREEMENTS = 'admin_edit_agreements';
    public const string RULE_EXHIBITION = 'exhibition';
    public const string RULE_FZ = 'view_fz';
    public const string ONLY_VIEW = 'only_view';
    public const string RULE_LEADS = 'leads';
    public const string RULE_CRM = 'crm';
    public const string RULE_IFL_LIST = 'ifl_list';
    public const string RULE_IFL_ALL = 'ifl_view_all';
    public const string RULE_IFL_TARIFFS = 'ifl_tariffs';
    public const string RULE_IFL_TARIFF_EDIT = 'ifl_edit_tariff';
    public const string RULE_IFL_EDIT_ALL = 'ifl_edit_all';
    public const string RULE_AGENT = 'rules_agent';
    public const string RULE_CARGO = 'cargo';
    public const string RULE_CARGO_LOSS = 'cargo_loss';
    public const string RULE_AGENT_IFL_MORTGAGE = 'agent_ifl_mortgage';
    public const string RULE_EDIT_ALL = 'edit_all';

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
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthRule::class,
                'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
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
     * Gets query for [[RuleName]].
     *
     * @return ActiveQuery
     */
    public function getRuleName(): ActiveQuery
    {
        return $this->hasOne(AuthRule::class, ['name' => 'rule_name']);
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
    public function deleteByName(string $name): bool
    {
        return $this->find()
            ->where(['name' => $name])
            ->one()
            ->delete();
    }
}
