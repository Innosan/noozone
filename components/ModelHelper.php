<?php

namespace app\components;

use yii\base\Component;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ModelHelper extends Component
{
    public static function getListOf(ActiveRecord $model, string $mapTo): array
    {
        return ArrayHelper::map($model::find()->all(), 'id', $mapTo);
    }
}