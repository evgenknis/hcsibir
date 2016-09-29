<?php

namespace app\models\Calendar;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calendar\CalendarEvent;

/**
 * CalendarEventSearch represents the model behind the search form about `app\models\Calendar\CalendarEvent`.
 */
class CalendarEventSearch extends CalendarEvent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'groups', 'place'], 'integer'],
            [['date', 'start_time', 'end_time', 'name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = CalendarEvent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'groups' => $this->groups,
            'place' => $this->place,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
