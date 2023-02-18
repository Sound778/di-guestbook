<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%people}}`.
 */
class m230215_132458_create_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        $this->createTable('{{%people}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32)->notNull()->unique(),
            'password' => $this->string(64)->notNull(),
            'userrole' => $this->string(24)->defaultValue('user'),
            'userstatus' =>$this->tinyInteger()->defaultValue(1),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%people}}');
    }
}
