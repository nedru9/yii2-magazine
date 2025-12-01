<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m251201_145019_create_news_table extends Migration
{
    public const string TABLE_NAME = '{{%news}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('Название'),
            'content' => $this->text()->notNull()->comment('Описание'),
            'status' => $this->boolean()->notNull()->defaultValue(true)->comment('Статус'),
            'categoryId' => $this->integer()->notNull()->comment('Id категории'),
        ]);

        $this->createIndex('categoryId_index', self::TABLE_NAME, [
            'categoryId',
        ]);

        $this->addForeignKey(
            'fk_news_category',
            '{{%news}}',
            'categoryId',
            '{{%category_news}}',
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
