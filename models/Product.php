<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $is_discounted
 * @property string $description
 * @property string $specifications
 * @property string $way_to_use
 * @property int $company_id
 * @property float $rating
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property float $price
 * @property int $category_id
 * @property int $discount
 * @property float $new_price
 *
 * @property Category $category
 * @property Company $company
 * @property User $createdBy
 * @property Favourite[] $favourites
 * @property ProductMedia[] $productMedia
 * @property Products[] $products
 * @property Review[] $reviews
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'is_discounted', 'description', 'specifications', 'way_to_use', 'company_id', 'rating', 'created_at', 'updated_at', 'created_by', 'price', 'category_id', 'discount', 'new_price'], 'required'],
            [['id', 'is_discounted', 'company_id', 'created_by', 'category_id', 'discount'], 'integer'],
            [['description', 'specifications', 'way_to_use'], 'string'],
            [['rating', 'price', 'new_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'is_discounted' => 'Есть скидка',
            'description' => 'Описание',
            'specifications' => 'Технические характеристики',
            'way_to_use' => 'Способ применения',
            'company_id' => 'Компания',
            'rating' => 'Рейтинг',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'created_by' => 'Кем создано',
            'price' => 'Цена',
            'category_id' => 'Категория',
            'discount' => 'Скидка',
            'new_price' => 'Новая цена',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
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
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductMedia()
    {
        return $this->hasMany(ProductMedia::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['product_id' => 'id']);
    }
}
