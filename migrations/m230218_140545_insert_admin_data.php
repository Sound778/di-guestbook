<?php

use yii\db\Migration;

/**
 * Class m230218_140545_insert_admin_data
 */
class m230218_140545_insert_admin_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
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
        $this->delete('people', ['id' => 1]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230218_140545_insert_admin_data cannot be reverted.\n";

        return false;
    }
    */
}
