<?php


namespace backend\forms;


use shop\entities\Product\Product;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;

class ProductSearch extends Model
{
    public $id;
    public $name;
    public $quantity;
    public $price;

    public function rules(): array
    {
        return [
            [['id', 'quantity', 'price'], 'integer'],
            [['name' ], 'safe'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */

    public function search(array $params): ActiveDataProvider
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
             'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'price', $this->price]);

        return $dataProvider;
    }

}