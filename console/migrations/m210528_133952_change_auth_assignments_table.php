<?php

use yii\db\Migration;

/**
 * Class m210528_133952_change_auth_assignments_table
 */
class m210528_133952_change_auth_assignments_table extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('{{%auth_assignments}}', 'user_id', $this->integer()->notNull());
    }

    public function down()
    {
        $this->alterColumn('{{%auth_assignments}}', 'user_id', $this->string(64)->notNull());
    }
}
