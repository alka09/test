<?php

namespace backend\forms;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use shop\entities\User\User;
use yii\helpers\ArrayHelper;

class UserSearch extends Model
{
    public $id;
    public $created_at;
    public $username;
    public $email;
    public $status;
    public $role;

    public function rules(): array
    {
        return [
            [['id', 'status', 'created_at'], 'integer'],
            [['username', 'email', 'role'], 'safe'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = User::find()->alias('u');

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'u.id' => $this->id,
            'u.status' => $this->status,
        ]);

        if (!empty($this->role)) {
            $query->innerJoin('{{%auth_assignments}} a', 'a.user_id = u.id');
            $query->andWhere(['a.item_name' => $this->role]);
        }

        $query
            ->andFilterWhere(['like', 'u.username', $this->username])
            ->andFilterWhere(['like', 'u.email', $this->email]);

        return $dataProvider;
    }

    public function rolesList(): array
    {
        return ArrayHelper::map(\Yii::$app->authManager->getRoles(), 'name', 'description');
    }

}