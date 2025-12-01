<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m251121_151235_create_product_table extends Migration
{
    public const string TABLE_NAME = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'categoryId' => $this->integer()->defaultValue(null)->comment('Id категории'),
            'title' => $this->string(255)->notNull()->comment('Название'),
            'price' => $this->double()->notNull()->comment('Цена'),
            'description' => $this->text()->comment('Описание'),
            'image' => $this->string(255)->comment('Изображение'),
            'status' => $this->boolean()->defaultValue(true)->comment('Статус'),
        ]);

        $this->createIndex('categoryId_index', self::TABLE_NAME, [
            'categoryId',
        ]);

        $this->addForeignKey(
            'fk_product_category',
            '{{%product}}',
            'categoryId',
            '{{%category}}',
            'id',
            'CASCADE'
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
