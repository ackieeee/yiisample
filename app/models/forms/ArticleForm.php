<?php
namespace app\models\forms;

use yii\base\Model;

class ArticleForm extends Model
{
    public $id;
    public $title;
    public $contents;

    public function rules()
    {
        return [
            [['title', 'contents'], 'required'],
        ];
    }
}