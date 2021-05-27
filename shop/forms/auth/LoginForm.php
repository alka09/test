<?php
namespace shop\forms\auth;

use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    public function rules(): array
    {
        return [
            ['username', 'required', 'message' => ''],
            ['password', 'required', 'message' => ''],
//            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
        ];
    }
}
