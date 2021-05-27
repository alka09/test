<?php
namespace shop\forms\auth;

use yii\base\Model;

class ResetPasswordForm extends Model
{
    public $password;

    public function rules(): array
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
}
