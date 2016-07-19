<?php

namespace app\controllers;
use yii;
class ReplyController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $layout = 'common';

    /*
    * 自动验证
    * @sunwei
    */
    public function init()
    {
        if (!file_exists("./sql/sunwei.php")) {
            $this->redirect('index.php?r=install/insone');
        }
        if (Yii::$app->session['user_key'] != '1') {
            $this->redirect('index.php?r=login/login');
        }
    }

    public function actionIndex(){

    }
}