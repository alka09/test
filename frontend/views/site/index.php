<?php
/* @var $product shop\entities\Product\Product */
/* @var $this yii\web\View */

/* @var $cart shop\cart\Cart */

use shop\entities\Product\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$products = Product::find();

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Продукты</h1>
    </div>

    <div class="body-content">

        <div class=container">
            <div class="products">
                <?php $products = Product::find()->all() ?>
                <?php foreach ($products as $product): ?>

                    <div class="box">
                        <div class="box-body">
                            <?= DetailView::widget([
                                'model' => $product,
                                'attributes' => [
                                    [
                                        'label' => 'Name',
                                        'attribute' => 'name',
                                    ],
                                    [
                                        'label' => 'Price',
                                        'attribute' => 'price',
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <button type="button" href="<?= Url::to(['/cart/add', 'id' => $product->id]) ?>" data-method="post"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
