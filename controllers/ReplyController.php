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

    public function actionIndex()
    {
        //$this->layout='menu.php';
        //include ('../views/layouts/menu.php');
        $sql="select * from wl_reply INNER  join wl_text_reply on wl_reply.reid=wl_text_reply.reid";
        $connection=\Yii::$app->db->createCommand($sql);
        $arr=$connection->queryAll();
        return $this->render('reply',['arr'=>$arr]);
    }

    public function actionRuled(){
        //include ('../views/layouts/menu.php');
        $sql="select * from wl_account ";
        $connection=\Yii::$app->db->createCommand($sql);
        $arr=$connection->queryAll();
        return $this->render('ruled',['arr'=>$arr]);
    }

    public function actionAdds(){
        $connection=\Yii::$app->db;
        $arr=\Yii::$app->request->post();
        $connection->createCommand()->insert('wl_reply', [
            'aid' => $arr['user'],
            'rename' => $arr['name'],
            'rekeyword'=>$arr['keyword'],
        ])->execute();
        $reid=$connection->getLastInsertID();
        //$reid=$connection->getLastInsertID();
        $connection->createCommand()->insert('wl_text_reply', [
            'reid' => "$reid",

            'trcontent'=>$arr['content'],
        ])->execute();
        $this->redirect(array('/reply/index'));
    }
}