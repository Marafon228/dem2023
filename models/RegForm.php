<?php
namespace app\models;
class RegForm extends User
{
    public $password_confirm;
    public $rules;
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'login', 'email', 'password','password_confirm','rules'], 'required','message'=> 'Поле обязательное для заполнения'],
            [['name', 'surname', 'patronymic'], 'match','pattern'=>'/^[А-Яа-я\s\-]{1,}$/u', 'message'=>'Только кириллица тире и пробел'],
            [['login'], 'match', 'pattern'=>'/^[A-Za-z]{4,}$/u'],
            ['password_confirm', 'compare','compareAttribute'=>'password','message'=>'Пароли должны совпадать'],
            ['rules','boolean'],
            ['rules', 'compare', 'compareValue'=>true, 'message'=>'Необходимо согласиться'],
            [['id_role'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password', 'password_confirm'], 'string', 'max' => 255],
            [['login'], 'unique', 'message'=>'Логин занят'],
            [['email'], 'unique', 'message'=>'Email занят'],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_role' => 'id']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Пароль',
            'password_confirm' => 'Подтверждение пароля',
            'rules'=>'Даю согласие на обработку данных',
            'id_role' => 'Id Role',
        ];
    }
}