<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_cart_items}}`.
 */
class m210528_230326_create_test_cart_items_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%test_cart_items}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-test_cart_items-user_id}}', '{{%test_cart_items}}', 'user_id');
        $this->createIndex('{{%idx-test_cart_items-product_id}}', '{{%test_cart_items}}', 'product_id');

        $this->addForeignKey('{{%fk-test_cart_items-user_id}}', '{{%test_cart_items}}', 'user_id', '{{%user}}', 'id', 'CASCADE');
        $this->addForeignKey('{{%fk-test_cart_items-product_id}}', '{{%test_cart_items}}', 'product_id', '{{%test_products}}', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%test_cart_items}}');
    }
}
