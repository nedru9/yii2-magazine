<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 */
class m251209_171519_create_order_item_table extends Migration
{
    public const string TABLE_NAME = '{{%order_item}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'orderId'   => $this->integer()->notNull()->comment('Id заказа'),
            'productId' => $this->integer()->notNull()->comment('Id товара'),
            'price'     => $this->double()->notNull()->comment('Цена'),
            'count'     => $this->integer()->notNull()->comment('Количество'),
            'total'     => $this->double()->notNull()->comment('Общая сумма'),
        ]);

        $this->createIndex(
            'idx-order_item-orderId',
            'order_item',
            'orderId'
        );

        $this->createIndex(
            'idx-order_item-productId',
            'order_item',
            'productId'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
