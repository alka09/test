<?php

namespace shop\forms\manage\Product;

use shop\entities\Product\Product;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class ProductEditForm extends Model
{
    public $name;
    public $quantity;
    public $price;

    public $_product;

    public function __construct(Product $product, $config = [])
    {
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->_product = $product;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['name', 'quantity', 'price'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['quantity', 'price'], 'integer'],
        ];
    }
}