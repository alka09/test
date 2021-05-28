<?php
/* @var $product shop\entities\Product\Product*/
/* @var $this yii\web\View */

use shop\entities\Product\Product;
use yii\helpers\Html;
use yii\helpers\Url;

$products = Product::find();

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Продукты</h1>
    </div>

    <div class="body-content">

        <div class=container">
            <div class="cart">
                <h2>Heading</h2>
                <?php foreach ($products as $product): ?>
                <div class="name"><?= Html::encode($product->name) ?></div>
                <div class="price"><?= Html::encode($product->price) ?></div>
                    <button class="box_products_output_one_cart btn-success btnHide button cartProductsBoxPriceButton"
                            data-url="<?= Url::to(['/shop/cart/add', 'id' => $product->id]) ?>" data-method="post">
                        В КОРЗИНУ
                    </button>
                <?php endforeach;?>

            </div>

        </div>

    </div>
</div>
