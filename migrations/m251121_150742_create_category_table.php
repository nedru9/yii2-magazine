<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m251121_150742_create_category_table extends Migration
{
    public const string TABLE_NAME = '{{%category}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'parentId' => $this->integer()->defaultValue(null)->comment('id категории (для подкатегорий)'),
            'title' => $this->string(255)->notNull()->comment('Название'),
            'description' => $this->text()->comment('Описание'),
            'status' => $this->boolean()->defaultValue(true)->comment('Статус'),
        ]);

        $this->createIndex('parentId_index', self::TABLE_NAME, [
            'parentId',
        ]);

        $this->addForeignKey(
            'fk_category_parent',
            '{{%category}}',
            'parentId',
            '{{%category}}',
            'id',
            'SET NULL',
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
