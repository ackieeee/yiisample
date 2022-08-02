<?php
$this->title = '記事詳細';
?>

<div class="card">
  <div class="card-body">
    <div class="card-title"><?= $article->title ?></div>
    <div class="card-text"><?= $article->contents ?></div>
    <button onclick="location.href='/article/<?= $article->id ?>/update'" class="btn btn-primary mt-3">編集</button>
  </div>
</div>
