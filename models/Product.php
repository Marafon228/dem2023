<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $photo
 * @property float $price
 * @property string $timestamp
 * @property string $country_pr
 * @property string $color
 * @property int $quantity
 * @property int $id_category
 *
 * @property Category $category
 * @property ProductsOrder[] $productsOrders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'photo', 'price', 'country_pr', 'color', 'quantity', 'id_category'], 'required', 'message'=>'Поле не должно быть пустым'],
            [['price'], 'number'],
            [['timestamp'], 'safe'],
            [['quantity', 'id_category'], 'integer'],
            [['name', 'photo', 'country_pr', 'color'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'photo' => 'Photo',
            'price' => 'Price',
            'timestamp' => 'Timestamp',
            'country_pr' => 'Country Pr',
            'color' => 'Color',
            'quantity' => 'Quantity',
            'id_category' => 'Id Category',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[ProductsOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrders()
    {
        return $this->hasMany(ProductsOrder::class, ['id_product' => 'id']);
    }
}
