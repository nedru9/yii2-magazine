<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m251209_170907_create_order_table extends Migration
{
    public const string TABLE_NAME = '{{%order}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('ФИО'),
            'phone' => $this->string(20)->notNull()->comment('Номер телефона'),
            'email' => $this->string(255)->notNull()->comment('Email'),
            'address' => $this->string()->notNull()->comment('Адрес'),
            'comment' => $this->string()->null()->comment('Комментарий'),
            'total' => $this->double()->notNull()->comment('Сумма'),
            'status' => $this->integer()->notNull()->defaultValue(0)->comment('Статус'),
            'dateCreate' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
