<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class OfferSearch extends Offer
{
    public function rules()
    {
        return [
            [['name', 'email'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Offer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
