<?php
namespace backend\models\search;

use backend\models\Patient;
use yii\data\ActiveDataProvider;

class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'string'],
            [['gender'], 'in', 'range' => [self::GENDER_MALE, self::GENDER_FEMALE], 'skipOnEmpty' => true],
            [['nationality_id'], 'exist', 'targetRelation' => 'nationality'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function search($params = [])
    {
        $query = static::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort = [
            'defaultOrder' => [
                'id' => SORT_DESC,
            ],
        ];
        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }
        $query->andWhere(['like', 'first_name', $this->first_name]);
        $query->andWhere(['like', 'last_name', $this->last_name]);
        $query->andFilterWhere([
            'gender' => $this->gender,
            'nationality_id' => $this->nationality_id,
        ]);
        return $dataProvider;
    }
}
