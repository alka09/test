<?php

namespace shop\entities\Product;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property integer $quantity
 * @property integer $price
 */

class Product extends ActiveRecord
{
    public static function create($name, $quantity, $price): Product
    {
        $product = new static();
        $product->name = $name;
        $product->quantity = $quantity;
        $product->price = $price;

        return $product;
    }

    public function edit($name, $quantity, $price)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public static function tableName(): string
    {
        return '{{%test_products}}';
    }

}