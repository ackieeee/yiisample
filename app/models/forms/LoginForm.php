<?php

namespace app\models\forms;

use app\models\CustomUser;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public string $username = "";
    public string $password = "";
    public $rememberMe;

    private $_user = false;

    public function __construct()
    {
        $this->rememberMe = false;
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword()
    {
        $user = CustomUser::findByUsername($this->username);
        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError('password', 'ユーザー名またはパスワードが違います.');
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = CustomUser::findByUsername($this->username);
        }
        return $this->_user;
    }
}
