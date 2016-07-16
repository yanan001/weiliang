<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Ip;

class IndexController extends Controller
{
    public $layout = 'common';
    public $enableCsrfValidation = false;

    /*
      * 自动验证
      * @sunwei
      */
    public function init()
    {
        if(!file_exists("./sql/sunwei.php")){
            $this->redirect('index.php?r=install/insone');
        }
        if(Yii::$app->session['user_key']!='1'){
            $this->redirect('index.php?r=login/login');
        }
    }
    /*
     * 首页
     * @sunwei
     */
    public function actionIndex(){
        return $this->render('index');
    }
}