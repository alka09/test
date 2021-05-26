<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_products}}`.
 */
class m210526_151420_create_test_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('{{%test_products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'quantity' => $this->integer(),
            'price' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_products}}');
    }
}
