<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'city_id', 'currency_id', 'sex_id', 'cart_id', 'favourite_id', 'orders_id'], 'integer'],
            [['mail', 'phone', 'login', 'password', 'photo_url', 'date_of_birth', 'first_name', 'last_name'], 'safe'],
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
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'role_id' => $this->role_id,
            'city_id' => $this->city_id,
            'currency_id' => $this->currency_id,
            'sex_id' => $this->sex_id,
            'date_of_birth' => $this->date_of_birth,
            'cart_id' => $this->cart_id,
            'favourite_id' => $this->favourite_id,
            'orders_id' => $this->orders_id,
        ]);

        $query->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'photo_url', $this->photo_url])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name]);

        return $dataProvider;
    }
}
