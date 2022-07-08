<?php

namespace app\models\forms;

use app\models\CustomUser;
use app\models\db\User;
use yii\base\Model;


class UserForm extends Model
{
    public string $name = "";
    public string $email = "";

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['name', 'string'],
            ['email', 'email'],
        ];
    }

    public function updateUser(int $id) {
        $user = User::findOne($id);
        $transaction = User::getDb()->beginTransaction();
        try {
            $user->name = $this->name;
            $user->email = $this->email;
            $user->save();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}