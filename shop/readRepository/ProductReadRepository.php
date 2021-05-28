<?php

namespace shop\readRepository;

use shop\entities\Product\Product;

class ProductReadRepository
{
    public function find($id): ? Product
    {
        return Product::findOne($id);
    }

}