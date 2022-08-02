<?php

namespace app\models\db;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'categories';
    }
}