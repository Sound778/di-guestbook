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
            'userrole' => $this->string(24)->notNull()->defaultValue('user'),
            'userstatus' =>$this->tinyInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->insert('people', [
            'username' => 'admin1',
            'password' => '$2y$13$ki0tFA7Hz8gaG25do4ODqu4nGL47HlFQNb4SXLq6eXhAk5BftDKqW',
            'userrole' => 'admin',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%people}}');
    }
}
