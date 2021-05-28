<?php

namespace shop\services\manage;


use shop\forms\manage\Product\ProductEditForm;
use shop\repositories\ProductRepository;
use shop\entities\Product\Product;
use shop\forms\manage\Product\ProductCreateForm;

class ProductManageService
{
    private $products;

    public function __construct(ProductRepository $product)
    {
        $this->products = $product;
    }

    public function create(ProductCreateForm $form): Product
    {
        $product = Product::create(
            $form->name,
            $form->quantity,
            $form->price
        );

        $this->products->save($product);
        return $product;
    }

    public function edit($id, ProductEditForm $form): void
    {
        $product = $this->products->get($id);
        $product->edit(
            $form->name,
            $form->quantity,
            $form->price
        );
        $this->products->save($product);
    }

    public function remove($id): void
    {
        $new = $this->products->get($id);
        $this->products->remove($id);
    }

}