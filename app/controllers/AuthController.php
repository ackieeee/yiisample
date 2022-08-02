<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionIndex()
    {
        $model = new LoginForm();
        return $this->render('login', [
          'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        $form = new LoginForm();
        $request = Yii::$app->request;
        if (!$request->isPost) {
          return $this->render('failed');
        }

        $form->attributes = $request->post('LoginForm');
        if ($form->login()) {
          return $this->render('success');
        }
        return $this->render('failed');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
