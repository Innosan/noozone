<?php

namespace app\components;

use yii\base\Behavior;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class HideCrud extends Behavior
{
    /**
     * Custom behavior to hide CRUD from user view
     *
     * @return array[]
     */
    public static function behaviors() {
        return
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['update', 'create', 'delete', 'index', 'view'],
                            'roles' => ['admin'],
                        ],

                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ];
    }
}