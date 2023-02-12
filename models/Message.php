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
 * @property string $m_created_at
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
            [['m_uname', 'm_uemail', 'm_text', 'm_created_at', 'm_uagent', 'm_uip'], 'required'],
            [['m_created_at'], 'safe'],
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
            'm_uname' => 'M Uname',
            'm_uemail' => 'M Uemail',
            'm_uhomepage' => 'M Uhomepage',
            'm_uagent' => 'M Uagent',
            'm_uip' => 'M Uip',
            'm_created_at' => 'M Created At',
            'm_text' => 'M Text',
            'm_status' => 'M Status',
        ];
    }
}
