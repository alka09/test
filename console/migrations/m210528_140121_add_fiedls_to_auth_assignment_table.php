<?php

use yii\db\Migration;

/**
 * Class m210528_140121_add_fiedls_to_auth_assignment_table
 */
class m210528_140121_add_fiedls_to_auth_assignment_table extends Migration
{
    public function safeUp()
    {

        $this->addForeignKey('{{%fk-auth_assignments-user_id}}', '{{%auth_assignments}}', 'user_id', '{{%user}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-auth_assignments-user_id}}', '{{%auth_assignments}}');

    }
}
