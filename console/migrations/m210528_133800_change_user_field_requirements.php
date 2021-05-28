<?php

use yii\db\Migration;

/**
 * Class m210528_133800_change_user_field_requirements
 */
class m210528_133800_change_user_field_requirements extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%user}}', 'username', $this->string());
        $this->alterColumn('{{%user}}', 'password_hash', $this->string());
        $this->alterColumn('{{%user}}', 'email', $this->string());
    }

    public function down()
    {
        $this->alterColumn('{{%user}}', 'username', $this->string()->notNull());
        $this->alterColumn('{{%user}}', 'password_hash', $this->string()->notNull());
        $this->alterColumn('{{%user}}', 'email', $this->string()->notNull());
    }
}
