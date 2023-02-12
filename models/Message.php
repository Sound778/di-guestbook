<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $m_id
 * @property string $m_uname
 * @property string $m_uemail
 * @property string|null $m_uhomepage
 * @property string $m_uagent
 * @property string $m_uip
 * @property string|null $m_text
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
            [['m_text'], 'string'],
            [['m_status'], 'integer'],
            [['m_uname'], 'string', 'max' => 32],
            [['m_uemail', 'm_uhomepage'], 'string', 'max' => 64],
            [['m_uagent'], 'string', 'max' => 255],
            [['m_uip'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'm_id' => 'M ID',
            'm_uname' => 'User Name',
            'm_uemail' => 'E-mail',
            'm_uhomepage' => 'Homepage',
            'm_uagent' => 'User agent',
            'm_uip' => 'User ip',
            'm_text' => 'Text',
            'm_status' => 'Статус',
        ];
    }
}
