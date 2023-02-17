<?php

use yii\db\Migration;

/**
 * Class m230212_182020_change_message_table
 */
class m230212_182020_change_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('message', 'm_text', $this->text()->notNull());
        $this->addColumn('message', 'm_uid', $this->integer()->unsigned()->defaultValue(0)->after('m_uemail'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('message', 'm_text', $this->text()->null());
        $this->dropColumn('message', 'm_uid');
    }

    /*
    // Use up()/down() to run migration code without a transaction.

    public function up()
    {

    }

    public function down()
    {

    }
    */
}
