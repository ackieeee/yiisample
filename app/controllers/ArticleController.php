<?php

namespace app\controllers;

use app\models\Article;
use app\models\forms\ArticleForm;
use Yii;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $articles = Article::fetchAll();
        return $this->render('index', [
            'articles' => $articles
        ]);
    }

    public function actionView()
    {
        $article = Article::findOne(Yii::$app->request->get('id'));
        return $this->render('view', [
            'article' => $article,
        ]);
    }

    public function actionUpdate()
    {
        $request = Yii::$app->request;
        if ($request->isGet) {
            $article = Article::findOne($request->get('id'));
            return $this->render('edit', [
                'article' => $article,
            ]);
        }

        $form = new ArticleForm();
        $form->attributes = $request->post('Article');
        $form->id = $request->get('id');
        try {
            Article::update($form);
            return $this->redirect('/article');
        } catch (\Exception $e) {
            return $this->redirect('/article');
        }
    }
}
