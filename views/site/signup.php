<?php

/**
 * @var yii\web\View $this
 * @var app\models\SignUpForm $model
 */

use app\models\City;
use app\models\Currency;
use app\models\Sex;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните поля, чтобы зарегистрироваться:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="d-flex flex-row gap-lg-5">
                <div class="d-flex flex-column">
                    <h3>Личная информация</h3>
                    <?= $form->field($model, 'first_name')->textInput() ?>
                    <?= $form->field($model, 'last_name')->textInput() ?>
                    <?= $form->field($model, 'phone')->textInput() ?>
                    <?= $form->field($model, 'sex_id')->dropDownList(Sex::getList())?>
                    <?= $form->field($model, 'city_id')->dropDownList(City::getList())?>
                    <?= $form->field($model, 'currency_id')->dropDownList(Currency::getList())?>
                    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::class, [
                        'options' => ['class' => 'form-control'],
                        'dateFormat' => 'yyyy-MM-dd',
                    ]) ?>
                    <?= $form->field($model, 'photo_url')->textInput() ?>
                </div>
                <div class="d-flex flex-column">
                    <h3>Данные для входа</h3>
                    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'mail')->textInput() ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>