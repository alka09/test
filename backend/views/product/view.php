<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\rbac\Item;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $product shop\entities\Product\Product */

$this->title = $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $product->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $product->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $product,
                'attributes' => [
                    [
                        'label' => 'Id',
                        'attribute' => 'id',
                    ],
                    [
                        'label' => 'Name',
                        'attribute' => 'name',
                    ],
                    [
                        'label' => 'Quantity',
                        'attribute' => 'quantity',
                    ],
                    [
                        'label' => 'Price',
                        'attribute' => 'price',
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
