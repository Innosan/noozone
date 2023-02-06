<?php

/**
 * @var yii\web\View $this
 * @var app\models\ChangeRole $model
 */

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Смена роли';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-change-role">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="d-flex flex-row gap-lg-5">
                <div class="d-flex flex-column">
                    <h3>Выберите пользователя:</h3>
                    <?= $form->field($model, 'user_id')->dropDownList(User::getList())?>
                    <h3>Выберите новую роль:</h3>
                    <?= $form->field($model, 'new_role')->dropDownList(["Admin" =>'Admin', "Buyer" => 'Buyer', "Manager" => 'Manager'])?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Поменять', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
