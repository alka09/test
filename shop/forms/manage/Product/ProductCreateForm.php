<?php

namespace shop\forms\manage\Product;

use shop\entities\Product\Product;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class ProductCreateForm extends Model
{
    public $name;
    public $quantity;
    public $price;

    public function rules(): array
    {
        return [
            [['name', 'quantity', 'price'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['quantity', 'price'], 'integer'],
        ];
    }

}