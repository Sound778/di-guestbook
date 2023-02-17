<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m230212_165319_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        $this->createTable('{{%message}}', [
            'm_id' => $this->primaryKey(),
            'm_uname' => $this->string(32)->notNull(),
            'm_uemail' => $this->string(64)->notNull(),
            'm_uhomepage' => $this->string(64),
            'm_uagent' => $this->string(255)->notNull(),
            'm_uip' => $this->string(15)->notNull(),
            'm_created_at' => $this->dateTime()->notNull(),
            'm_text' => $this->text(),
            'm_status' => $this->tinyInteger()->defaultValue(1),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%message}}');
    }
}
