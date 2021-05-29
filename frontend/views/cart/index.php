<?php
/* @var $this yii\web\View */
/* @var $cart shop\cart\Cart */

use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="cabinet-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td class="text-left">Наименование продукта</td>
                <td class="text-left">Количество</td>
                <td class="text-right">Цена за единицу</td>
                <td class="text-right">Общая стоимость</td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($cart->getItems() as $item): ?>
                <?php
                $product = $item->getProduct();
                ?>
                <tr>
                    <td class="text-left">
                        <a href=""><?= Html::encode($product->name) ?></a>
                    </td>
                    <td class="text-left"><?= Html::encode($item->getQuantity()) ?></td>
                    <td class="text-right"><?= Html::encode($item->getPrice()) ?></td>
                    <td class="text-right"><?= Html::encode($item->getCost()) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

