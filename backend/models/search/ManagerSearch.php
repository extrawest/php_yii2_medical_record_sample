<?php
namespace backend\models\search;

use backend\models\Manager;
use yii\data\ActiveDataProvider;

class ManagerSearch extends Manager
{
    public function rules()
    {
        return [
            [['login'], 'string'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params = [])
    {
        $query = Manager::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort = [
            'defaultOrder' => [
                'login' => SORT_ASC,
            ],
        ];
        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }
        $query->andWhere(['like', 'login', $this->login]);
        return $dataProvider;
    }
}
