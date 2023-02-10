<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review_media".
 *
 * @property int $id
 * @property int $media_type_id
 * @property string $url
 * @property int $review_id
 *
 * @property MediaType $mediaType
 * @property Review $review
 */
class ReviewMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['media_type_id', 'url', 'review_id'], 'required'],
            [['media_type_id', 'review_id'], 'integer'],
            [['url'], 'string', 'max' => 300],
            [['media_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MediaType::class, 'targetAttribute' => ['media_type_id' => 'id']],
            [['review_id'], 'exist', 'skipOnError' => true, 'targetClass' => Review::class, 'targetAttribute' => ['review_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'media_type_id' => 'Тип медиа',
            'url' => 'Ссылка',
            'review_id' => 'Отзыв',
        ];
    }

    /**
     * Gets query for [[MediaType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMediaType()
    {
        return $this->hasOne(MediaType::class, ['id' => 'media_type_id']);
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(Review::class, ['id' => 'review_id']);
    }
}
