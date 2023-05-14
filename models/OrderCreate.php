<?php
namespace app\models;
use Yii;
class OrderCreate extends Order
{
   public $password_confirm;

    public function rules()
    {
        return [
            [['fio_kl', 'id_user','password_confirm'], 'required'],
            [['timestamp'], 'safe'],
            [['dismiss'], 'string'],
            ['password_confirm','compare', 'compareValue'=>  Yii::$app->user->identity->password, 'message'=>'Неверный пароль'],
            [['id_user', 'id_status'], 'integer'],
            [['fio_kl','password_confirm'], 'string', 'max' => 255],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['id_status' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio_kl' => 'Fio Kl',
            'timestamp' => 'Timestamp',
            'dismiss' => 'Dismiss',
            'id_user' => 'Id User',
            'id_status' => 'Id Status',
            'password_confirm' => 'Пароль',
        ];
    }
}
