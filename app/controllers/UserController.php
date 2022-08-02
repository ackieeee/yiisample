<?php

namespace app\controllers;

use app\models\CustomUser;
use app\models\db\User;
use app\models\forms\UserForm;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    // ログインしているユーザーのみユーザー一覧を閲覧可能
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function ($rule, $action) {
                    $this->redirect('/auth');
                }
            ]
        ];
    }

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $name = $request->get('name') !== null ? $request->get('name') : '';
        $email = $request->get('email') !== null ? $request->get('email') : '';

        $users = CustomUser::fetchAll($name, $email);
        return $this->render('index', [
            'users' => $users,
        ]);
    }

    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        if ($request->isGet) {
            $user = CustomUser::findIdentity($id);
            return $this->render('update', [
                'user' => $user,
            ]);
        }
        $form = new UserForm();
        $form->attributes = $request->post();
        if ($form->validate()) {
            try {
                $form->updateUser($id);
            } catch (\Exception $e) {
                return $this->redirect('/users', [
                    "failed_flag" => true
                ]);
            }
        }
        return $this->redirect('/users');
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $user = User::findOne($id);
        $transaction = User::getDb()->beginTransaction();
        try {
            $user->delete();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            return $this->redirect('/users');
        }
        return $this->redirect('/users');
    }
}
