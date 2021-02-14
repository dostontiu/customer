<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `common\models\Customer`.
 */
class CustomerSearch extends Customer
{

    public $fullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'experience', 'user_id'], 'integer'],
            [['fullName', 'first_name', 'last_name', 'middle_name', 'birth_date', 'p_number', 'phone', 'start_time', 'address', 'created_at', 'updated_at'], 'safe'],
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
        $query = Customer::find();
        $query->orderBy(['id' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'gender' => $this->gender,
            'experience' => $this->experience,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'p_number', $this->p_number])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['<=', 'YEAR(`start_time`)', $this->start_time])
            ->andFilterWhere(['like', 'address', $this->address]);

        if ($this->fullName) {
            $query->andWhere("`first_name` LIKE :fullName OR `last_name` LIKE :fullName OR `middle_name` LIKE :fullName", [
                'fullName' => '%'.$this->fullName.'%'
            ]);
        }

        if($this->birth_date){
            $dateBegin = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$3-$2-$1', $this->birth_date);
            $dateEnd = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$6-$5-$4', $this->birth_date);
            $query->andWhere("birth_date BETWEEN :dateBegin AND :dateEnd", [
                'dateBegin' => $dateBegin,
                'dateEnd' => $dateEnd,
            ]);
        }

        return $dataProvider;
    }
}
