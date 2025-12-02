<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%wishlist}}`.
 */
class m251202_134058_add_userId_column_to_wishlist_table extends Migration
{
    public const string TABLE_NAME = '{{%wishlist}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, 'userId', $this->integer()->notNull()->comment('Id пользователя'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME, 'userId');
    }
}
