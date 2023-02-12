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
        $this->addColumn('message', 'm_uid', $this->integer()->unsigned()->notNull()->defaultValue(0)->after('m_uemail'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m230212_182020_chanhe_message_table cannot be reverted.\n";

        return false;
        */
        $this->dropColumn('message', 'm_uid');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230212_182020_chanhe_message_table cannot be reverted.\n";

        return false;
    }
    */
}
