<?php
use yii\helpers\Html;
$this->title = '記事一覧';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article_view">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>記事名</th>
        <th>カテゴリ</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($articles as $article): ?>
        <tr>
          <td><?= $article->id ?></td>
          <td><a href="/article/<?= $article->id ?>"><?= Html::encode($article->title) ?></td>
          <td><?= Html::encode($article->category_name) ?></td>
          <td>
            <button class="btn btn-primary">更新</button>
            <button class="btn btn-danger">削除</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>