<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $pros
 * @property string $cons
 * @property string $description
 * @property int $is_approved
 * @property int $likes
 * @property int $dislikes
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $product_id
 *
 * @property User $createdBy
 * @property Product $product
 * @property ReviewMedia[] $reviewMedia
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pros', 'cons', 'description', 'is_approved', 'likes', 'dislikes', 'created_at', 'updated_at', 'created_by', 'product_id'], 'required'],
            [['id', 'is_approved', 'likes', 'dislikes', 'created_by', 'product_id'], 'integer'],
            [['pros', 'cons', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pros' => 'Плюсы',
            'cons' => 'Минусы',
            'description' => 'Описание',
            'is_approved' => 'Одобрено',
            'likes' => 'Лайки',
            'dislikes' => 'Дизлайки',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'created_by' => 'Кем создано',
            'product_id' => 'ID продукта',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[ReviewMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewMedia()
    {
        return $this->hasMany(ReviewMedia::class, ['review_id' => 'id']);
    }

    public static function getList() {
        return ArrayHelper::map(Review::find()->all(), 'id', 'description');
    }
}
