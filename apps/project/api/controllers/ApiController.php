<?php
namespace api\controllers;

use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionError()
    {
        return 'API method not found';
    }
} 