<?php

namespace app\models;

use app\models\db\User;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

class CustomUser extends BaseObject implements IdentityInterface
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $authKey;
    public $accessToken;
    public $created_at;
    public $updated_at;

    public static function fetchAll(string $name, string $email)
    {
        $users = User::find()
            ->where(['like', 'name', $name])
            ->andWhere(['like', 'email', $email])
            ->all();

        $result = [];
        foreach ($users as $user) {
            $result[] = new static($user);
        }
        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = User::findOne($id);
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    public static function findByUsername($username)
    {
        $user = User::findOne([
            'name' => $username,
        ]);
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
