<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '記事更新';
?>

<div class="card">
  <?php
  $form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal'],
  ]) ?>
    <?= $form->field($article, 'title', ['options' => ['class' => 'm-3']]) ?>
    <?= $form->field($article, 'contents', ['options' => ['class' => 'm-3']])->textarea() ?>
    <div class="form-group">
      <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('更新', ['class' => 'btn btn-primary']) ?>
      </div>
    </div>
  <?php ActiveForm::end() ?>
</div>
