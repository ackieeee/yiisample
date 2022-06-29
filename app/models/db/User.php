<?php

namespace app\models\db;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
  public static function tableName()
  {
    return 'users';
  }
}
