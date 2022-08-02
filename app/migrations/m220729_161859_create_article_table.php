<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m220729_161859_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'category_id' => $this->integer()->defaultValue(1),
        ]);

        $this->createIndex(
            'idx-articles-category_id',
            'articles',
            'category_id'
        );

        $this->addForeignKey(
            'fk-articles-category_id',
            'articles',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-articles-category_id',
            'articles'
        );

        $this->dropIndex(
            'idx-articles-category_id',
            'articles'
        );

        $this->dropTable('articles');
    }
}
