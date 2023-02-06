<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "media_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property ProductMedia[] $productMedia
 * @property ReviewMedia[] $reviewMedia
 */
class MediaType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['id'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
        ];
    }

    /**
     * Gets query for [[ProductMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductMedia()
    {
        return $this->hasMany(ProductMedia::class, ['media_type_id' => 'id']);
    }

    /**
     * Gets query for [[ReviewMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewMedia()
    {
        return $this->hasMany(ReviewMedia::class, ['media_type_id' => 'id']);
    }

    public static function getList()
    {
        return ArrayHelper::map(MediaType::find()->all(), 'id', 'title');
    }
}
