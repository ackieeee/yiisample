<?php

namespace app\models\db;

use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
    public function rules()
    {
        return [
        ];
    }

    public static function tableName(): string
    {
        return 'articles';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}

