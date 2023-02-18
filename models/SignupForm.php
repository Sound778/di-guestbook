<?php
/**
 * Created by PhpStorm.
 * User: ivanov
 * Date: 14.02.2023
 * Time: 23:10
 */

namespace app\models;

use yii\base\Model;

/**
 * SignupForm is the model behind the signup form.
 */

class SignupForm extends Model
{

    public $username;
    public $password;

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => 'Поле не может быть пустым'],
            [['username', 'password'], 'match', 'pattern' => '/^[1-9a-zA-Z\s]+$/', 'message' => 'Допустимые символы: цифры и буквы латинского алфавита'],
            [['username'], 'string',  'min' => 4, 'max' => 16],
            ['username', 'unique', 'targetClass' => User::class,  'message' => 'Этот логин уже занят'],
            [['password'], 'string',  'min' => 6, 'max' => 16],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
        ];
    }
}
