<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m230212_132718_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        $this->createTable('{{%message}}', [
            'm_id' => $this->primaryKey(),
            'm_uname' => $this->string(32)->notNull()->defaultValue(""),
            'm_uemail' => $this->string(64)->notNull()->defaultValue(""),
            'm_uhomepage' => $this->string(64),
            'm_uagent' => $this->string(255)->notNull()->defaultValue(""),
            'm_uip' => $this->string(15)->notNull()->defaultValue(""),
            'm_text' => $this->text(),
            'm_status' => $this->tinyinteger()->notNull()->defaultValue(1),
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
