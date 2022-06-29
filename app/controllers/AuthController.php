<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
  public function actionIndex()
  {
    $form = new LoginForm();
    return $this->render('login.tpl', [
      'form' => $form,
    ]);
  }

  public function actionLogin()
  {
    $form = new LoginForm();
    if (!Yii::$app->request->isPost) {
      return $this->render('../hello/hello.tpl');
    }
    $form->attributes = Yii::$app->request->post();
    // var_dump(Yii::$app->request->post());
    // var_dump($form);
    // exit(1);
    if ($form->login()) {
      return $this->render('success.tpl');
    }
    return $this->render('failed.tpl');
  }
}
