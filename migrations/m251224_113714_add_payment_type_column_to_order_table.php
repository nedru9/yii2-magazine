<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%order}}`.
 */
class m251224_113714_add_payment_type_column_to_order_table extends Migration
{
    public const string TABLE_NAME = '{{%order}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, 'paymentType', $this->integer()->comment('Тип оплаты'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME, 'paymentType');
    }
}
