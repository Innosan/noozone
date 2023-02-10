<?php

namespace app\components;

use yii\base\Component;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ModelHelper extends Component
{
    /**
     * Used to get an array of elements of model
     *
     * @param ActiveRecord $model
     * @param string $mapTo - column to map
     * @return array
     */
    public static function getListOf(ActiveRecord $model, string $mapTo): array
    {
        return ArrayHelper::map($model::find()->all(), 'id', $mapTo);
    }
}