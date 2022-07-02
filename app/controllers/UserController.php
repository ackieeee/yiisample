<?php

namespace app\controllers;

use app\models\CustomUser;
use yii\web\Controller;

class UserController extends Controller
{
  public function actionIndex()
  {
    $users = CustomUser::fetchAll();
    return $this->render('list.tpl', [
      'users' => $users,
    ]);
  }
}
