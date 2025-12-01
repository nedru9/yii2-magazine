<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_news}}`.
 */
class m251201_144716_create_category_news_table extends Migration
{
    public const string TABLE_NAME = '{{%category_news}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('Название'),
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
