<?php

use yii\db\Migration;

/**
 * Class m230218_142750_insert_test_messages
 */
class m230218_142750_insert_test_messages extends Migration
{
    /**
     * Inserting test messages into `message` table
     *
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('message', ['m_uname', 'm_uemail', 'm_uid', 'm_uhomepage', 'm_uagent', 'm_uip', 'm_created_at', 'm_text'], [
            ['Dmitriy Ivanov', 'ivanov@sochismile.ru', 1, 'https://anna34.ru',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-13 21:51:41', 'this is a test message with js alert(\'Bingo!\');. Strip_tags applied.'],
            ['John Smith', 'rgerhebe@ya.ru', 0, '',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0',
                '127.0.0.1', '2023-02-13 22:13:29', 'message 2 alert(\'Bingo!\'); lorem ipsum. Strip tags applied'],
            ['Антон Петров', 'gjkujyg@jhgfjhgjf.yu', 0, '',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-13 22:19:22', 'dgg ehserhse serhshsh sfgsfhs shsrthrthrth dfgserg sgherhe'],
            ['testuser', 'fgdhdf@dhfgh.ru', 0, 'http://dfgdfgdsfg.ru',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-14 11:12:39', 'srhtrt rtuetyue fhgj57 6y tryujtrj hgjrtyujt \"tyty\"'],
            ['jkyfkhjgfk', 'khgjh@hgojh.jh', 0, 'http://jkhgfkhjgkf.ru',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-14 13:09:20', 'liygluiygol iuygouy gouiyg alert(\'tes\'); ouytfkygf uygou'],
            ['John', 'john@silver.com', 2, 'http://silver.com',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-15 17:12:05', 'This is my message. I\'m registererd as John )) edited'],
            ['Boris', 'boris@boris.net', 0, '',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-15 20:16:19', 'dfgse ererhe'],
            ['Mary Poppins', 'mary@poppins.org', 0, 'http://marypoppins.org',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-15 22:23:17', 'checking captcha'],
            ['nick', 'nick@nick.ru', 0, '',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-16 00:22:10', 'uploadng picture'],
            ['dfbfbf', 'fffns@dfgdfhgd.ty', 0, 'http://dgsdasgashh.yu',
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
                '127.0.0.1', '2023-02-16 00:34:38', 'dfg rthrtherth ertueyjtetyje'],
        ])->execute();
    }

    /**
     * Truncates `message` table
     *
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand()->truncateTable('message')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230218_142750_insert_test_messages cannot be reverted.\n";

        return false;
    }
    */
}
