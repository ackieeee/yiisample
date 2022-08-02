<?php

namespace app\models;
use app\models\db\Article as DbArticle;
use app\models\db\Category;
use app\models\forms\ArticleForm;
use Codeception\Util\HttpCode;
use yii\web\HttpException;

class Article
{
    public string $id;
    public string $title;
    public string $contents;
    public string $category_id;
    public string $category_name;

    public function __construct($article)
    {
        $this->id = $article->id;
        $this->title = $article->title;
        $this->contents = $article->contents;
        $this->category_id = $article->category_id;
        $this->category_name = $article->category->name;
    }

    public static function fetchAll(): array
    {
        $articles = DbArticle::find()->with('category')->all();

        $objs = [];
        foreach ($articles as $article) {
            $objs[] = new self($article);
        }
        return $objs;
    }

    public static function findOne($id)
    {
        $article = DbArticle::findOne($id);
        return $article;
    }

    public static function update(ArticleForm $form)
    {
        if (!$form->validate()) {
            throw new HttpException(400);
        }
        $transaction = DbArticle::getDb()->beginTransaction();
        try {
            $article = DbArticle::findOne($form->id);
            $article->title = $form->title;
            $article->contents = $form->contents;
            $article->save();
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}