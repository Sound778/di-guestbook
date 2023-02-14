<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Message;

/**
 * MessageSearch represents the model behind the search form of `app\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['m_id', 'm_uid', 'm_status'], 'integer'],
            [['m_uname', 'm_uemail', 'm_uhomepage', 'm_uagent', 'm_uip', 'm_created_at', 'm_text'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Message::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'forcePageParam' => false,
                'pageSizeParam' => false,
                'defaultPageSize' => 4,
                'totalCount' => $query->count(),
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'm_id' => $this->m_id,
            'm_uid' => $this->m_uid,
            'm_created_at' => $this->m_created_at,
            'm_status' => $this->m_status,
        ]);

        $query->andFilterWhere(['like', 'm_uname', $this->m_uname])
            ->andFilterWhere(['like', 'm_uemail', $this->m_uemail])
            ->andFilterWhere(['like', 'm_uhomepage', $this->m_uhomepage])
            ->andFilterWhere(['like', 'm_uagent', $this->m_uagent])
            ->andFilterWhere(['like', 'm_uip', $this->m_uip])
            ->andFilterWhere(['like', 'm_text', $this->m_text]);

        return $dataProvider;
    }
}
