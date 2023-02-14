<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $m_id
 * @property string $m_uname
 * @property string $m_uemail
 * @property int $m_uid
 * @property string|null $m_uhomepage
 * @property string $m_uagent
 * @property string $m_uip
 * @property string $m_created_at
 * @property string $m_text
 * @property int $m_status
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['m_uid', 'm_status'], 'integer'],
            ['m_uname', 'required', 'message' => 'Допустимые символы: цифры и буквы латинского алфавита'],
            ['m_uemail', 'required', 'message' => 'Некорректный формат e-mail'],
            ['m_text', 'required', 'message' => 'Сообщение не может быть пустым'],
            [['m_created_at', 'm_uagent', 'm_uip'], 'required'],
            [['m_created_at'], 'safe'],
            [['m_text'], 'string'],
            [['m_uname'], 'string', 'max' => 32],
            [['m_uname'], 'match', 'pattern' => '/^[1-9a-zA-Z\s]+$/'],
            [['m_uemail', 'm_uhomepage'], 'string', 'max' => 64],
            [['m_uagent'], 'string', 'max' => 255],
            [['m_uip'], 'string', 'max' => 15], // для IPv4
            [['m_uemail'], 'email'],
            [['m_uname', 'm_uemail', 'm_uhomepage', 'm_text'], 'trim'],
            [['m_uhomepage'], 'url', 'defaultScheme' => 'http', 'message' => 'Некорректный формат URL'],
            [['m_text'], 'filter', 'filter' => 'strip_tags'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'm_id' => 'Message id',
            'm_uname' => 'Пользователь',
            'm_uemail' => 'E-mail',
            'm_uid' => 'User id',
            'm_uhomepage' => 'Homepage',
            'm_uagent' => 'UserAgent',
            'm_uip' => 'User IP',
            'm_created_at' => 'Дата создания',
            'm_text' => 'Сообщение',
            'm_status' => 'Статус сообщения',
        ];
    }
}
