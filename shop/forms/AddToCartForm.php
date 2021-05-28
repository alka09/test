<?php

namespace shop\forms;

use shop\entities\Product\Product;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class AddToCartForm extends Model
{
    public $modification;
    public $quantity;

    private $_product;

    public function __construct(Product $product, $config = [])
    {
        $this->_product = $product;
        $this->quantity = 1;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return array_filter([
            ['quantity', 'required'],
            ['quantity', 'integer', 'max' => $this->_product->quantity],
        ]);
    }

}