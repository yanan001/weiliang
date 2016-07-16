<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Admin;
use app\models\Account;
use app\models\Ip;

class PubnumController extends Controller
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
        if (!file_exists("./sql/sunwei.php")) {
            $this->redirect('index.php?r=install/insone');
        }
        if (Yii::$app->session['user_key'] != '1') {
            $this->redirect('index.php?r=login/login');
        }
    }

    //随机数
    public function actionRands($length){
        $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = '';
        $len = strlen($str)-1;
        for($i = 0;$i < $length;$i ++)
        {
            $num = mt_rand(0, $len); $randString .= $str[$num];
        }
        return $randString ;
    }

    /*
     * 公众号添加
     * @sunwei
     */
    public function actionAddlist(){
        if(\Yii::$app->request->method=='GET'){
            return $this->render('addlist');
        }
        else{
            $atok=$this->actionRands(5);
            $url=substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],0,strpos('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'we'))."/weixin.php?str=".$atok;
            $session = \Yii::$app->session;
            $session->open();
            $connection=\Yii::$app->db;
            $arr=\Yii::$app->request->post();
            $arr['atoken']=md5(rand(1000,9999));
            $atoken= md5(rand(1000,9999));
            $reg="/^[a-zA-Z]$/";
            if(preg_match($reg,substr($atoken,0,1))){
                $arr['atoken']=$atoken;
            }else{
                $aa=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                $num = rand(0,52);
                $arr['atoken']=substr_replace($atoken,$aa[$num],0,1);
            }
            //查询用户id
            $res= $session->get("info");

            $connection->createCommand()->insert('wl_account', [
                'appid' => $arr['appid'],
                'aname' => $arr['aname'],
                'account' => $arr['account'],
                'appsecret' => $arr['appsecret'],
                'aurl' => $url,
                'atok'=>$atok,
                'uid'=> $res['id'],
                'atoken'=>$arr['atoken'],

            ])->execute();
        }
        $this->redirect(array('/pubnum/list'));
    }

    /*
     * 公众号展示
     * */
    public function actionList(){
        $session = \Yii::$app->session;
        $session->open();
        $res=$session->get("info");
        $id=$res['id'];
        $commannd=Account::find()->select('wl_admin.*, wl_account.*')
                                ->join('JOIN','wl_admin','wl_account.uid = wl_admin.id')
                                ->where(['wl_admin.id'=>$id])
                                ->asArray()
                                ->all();

        return $this->render("list",['arr'=>$commannd]);
    }
    /*
     *公众号删除
     *
     */

    public function actionDel(){
        $id = Yii::$app->request->get('id');
        $res=Account::deleteAll('aid='.$id);
        if($res) {
            echo "<script language=\"javascript\"> alert('删除成功!');window.location.href = document.referrer;</script> ";
        }
    }

    /*
     * 修改页面
     * */
    public function actionSave(){
        $id  = Yii::$app->request->get('id');
        $arr = Account::find()->where('aid='.$id)->asArray()->one();

        return $this->render('save',['arr'=>$arr]);
    }
    public function actionRand(){
        $atoken=md5(rand(1000,9999));
        $reg="/^[a-zA-Z]$/";
        if(preg_match($reg,substr($atoken,0,1))){
            $arr['atoken']=$atoken;
        }else{
            $aa=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
            $num = rand(0,52);
            $atoken=substr_replace($atoken,$aa[$num],0,1);
        }
        echo $atoken;
    }
    /*
     * 修改
     * */
    public function actionUpdate(){
        $arr  = Yii::$app->request->post();
        $id =$arr['id'];
        $account= Account::find()->where("aid=$id")->one();
        $account->aname = $arr['aname'];
        $account->atoken=$arr['atoken'];
        $account->save();

    }

    /*public function actionRands($length){
        $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = '';
        $len = strlen($str)-1;
        for($i = 0;$i < $length;$i ++)
        {
            $num = mt_rand(0, $len); $randString .= $str[$num];
        }
        return $randString ;
    }*/
}