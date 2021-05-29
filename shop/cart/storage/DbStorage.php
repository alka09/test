<?php

namespace shop\cart\storage;

use shop\cart\CartItem;
use shop\entities\Product\Product;
use yii\db\Connection;
use yii\db\Query;

class DbStorage implements StorageInterface
{
    private $userId;
    private $db;

    public function __construct($userId, Connection $db)
    {
        $this->userId = $userId;
        $this->db = $db;
    }

    public function load(): array
    {
        $rows = (new Query())
            ->select('*')
            ->from('{{%test_cart_items}}')
            ->where(['user_id' => $this->userId])
            ->orderBy(['product_id' => SORT_ASC])
            ->all($this->db);

        return array_map(function (array $row) {
            /** @var Product $product */
            if ($product = Product::find()->Where(['id' => $row['product_id']])->one()) {
                return new CartItem($product,  $row['quantity']);
            }
            return false;
        }, $rows);
    }

    public function save(array $items): void
    {
        $this->db->createCommand()->delete('{{%test_cart_items}}', [
            'user_id' => $this->userId,
        ])->execute();

        $this->db->createCommand()->batchInsert(
            '{{%test_cart_items}}',
            [
                'user_id',
                'product_id',
                'quantity'
            ],
            array_map(function (CartItem $item) {
                return [
                    'user_id' => $this->userId,
                    'product_id' => $item->getProductId(),
                    'quantity' => $item->getQuantity(),
                ];
            }, $items)
        )->execute();
    }
}
