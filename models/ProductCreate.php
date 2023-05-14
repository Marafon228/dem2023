<?php

namespace app\models;

use Yii;

class ProductCreate extends Product
{

    public function rules()
    {
        return [
            [['name', 'photo', 'price', 'country_pr', 'color', 'quantity', 'id_category'], 'required', 'message'=>'Поле не должно быть пустым'],
            [['price'], 'number'],
            [['timestamp'], 'safe'],
            [['quantity', 'id_category'], 'integer'],
            ['photo', 'file', 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 10 * 1024 * 1024],
            [['name', 'photo', 'country_pr', 'color'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
        ];
    }


}
