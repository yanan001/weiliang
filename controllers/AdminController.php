<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Admin;
use app\models\Ip;

class AdminController extends Controller
{
    //加载公共模板
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
     * 列表
     * @sunwei
     */
    public function actionList(){
        $info = Ip::find();
        //分页
        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $info->count(),
        ]);

        $infos = $info->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();

        return $this->render('list', ['info' => $infos,'pagination' => $pagination]);
    }
    /*
     * 添加表单
     * @sunwei
     */
    public function actionAddlist(){
        return $this->render('addlist');
    }

    /*
     * 添加
     * @sunwei
     */
    public function actionAdd(){
        $ip = Yii::$app->request->post('ip');
        $arr = new Ip;
        $arr->ip=$ip;
        if($arr->insert()){
            $this->redirect('index.php?r=admin/list');
        }else{
            echo "<script language=\"javascript\"> alert('添加失败!');;window.location.href = document.referrer;</script> ";
        }
    }

    /*
     *  删除
     * @sunwei
     */
    public function actionDel(){
        $id = Yii::$app->request->get('id');
        //Ip::deleteAll('id=:id',array(':id'=>$id));
        Ip::deleteAll('id='.$id);
        echo "<script language=\"javascript\"> alert('删除成功!');window.location.href = document.referrer;</script> ";
    }
}