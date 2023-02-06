<?php

namespace app\models;

use app\widgets\Alert;
use yii\base\Model;
use yii\helpers\VarDumper;

class ChangeRole extends Model
{
    public $user_id;
    public $new_role;

    public function rules()
    {
        return [
            [['user_id', 'new_role'], 'required'],
        ];
    }

    public function changeRole() {
        $auth = \Yii::$app->authManager;

        $newRole = $auth->getRole($this->new_role);

        $auth->revokeAll($this->user_id);

        $auth->assign($newRole, $this->user_id);
    }
}