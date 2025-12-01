<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class NewsSearch extends Model
{
    public mixed $categoryId = null;
    public mixed $sort = null;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['categoryId'], 'safe'],
        ];
    }

    /**
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public function search($params): ActiveDataProvider
    {
        $query = News::find()->where(['status' => 1]);
        $this->load($params, '');

        if (!empty($this->categoryId)) {
            $query->andWhere(['categoryId' => $this->categoryId]);
        }

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'totalCount' => $query->count(),
                'pageSize' => 12,
                'pageSizeLimit' => [1, 100],
                'params' => Yii::$app->request->queryParams,
            ],
        ]);
    }
}
