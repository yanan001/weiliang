<?php
namespace app\controllers;
use Vcode;
use Yii;
use yii\web\Controller;
use app\models\Admin;
use app\models\Ip;
use  yii\web\Session;

class LoginController extends Controller
{
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
        if(Yii::$app->session['user_key']=='1'){
            $this->redirect('index.php?r=index/index');
        }
    }
    /*
    * 登录页面
    * @sunwei
    */
    public function actionLogin()
    {
        return $this->renderPartial('login');
    }
    /*
     * 验证码
     *
     */
    public function actionVcode(){
        $vcode= new Vcode(80,30,4);
        //将验证码放到服务器
        $session = \Yii::$app->session;
        $session->open();
        $session->set('code',$vcode->getcode());
        //验证码输出
        $vcode->outimg();
    }


    /*
     * 验证登录
     * @suwnei
     */
    public function actionCheck(){
        $name = Yii::$app->request->post('name');
        $pwd = md5(Yii::$app->request->post('pwd'));
        $code = Yii::$app->request->post('verifycode');

        //开启session
        $session = Yii::$app->session;
        $session->open();
        $vacode = $session->get('code');
        if(strtolower($vacode)==strtolower($code)) {
            $one = Admin::find()->where("name='$name'")->asArray()->one();
            $ip = $_SERVER["REMOTE_ADDR"];
            //print_r($one);die;
            if ($one['pwd'] == $pwd && $one != '') {
                $ok = Ip::find()->where("ip='$ip'")->asArray()->one();
                //var_dump($ok);die;
                if ($ok != '') {
                    $session->set('name', $one['name']);
                    $session->set('info', $one);
                    $session->set('user_key', '1');
                    $this->redirect('index.php?r=index/index');
                } else {
                    echo "<script language=\"javascript\"> alert('系统检测到您不在常用地登录,请联系管理员!');window.location.href = document.referrer;</script> ";
                }
            } else {
                echo "<script language=\"javascript\"> alert('账号或密码错误!');window.location.href = document.referrer;</script> ";
                die;
            }
        }else{
            echo "<script>alert('验证码输入有误');location.href='index.php?r=login/login'</script>";
            die;
        }
    }

    /*
     * 退出登录
     * @sunwei
    */
    public function actionLogout(){
        unset(Yii::$app->session['user_key']);
        unset(Yii::$app->session['name']);
        unset(Yii::$app->session['info']);
        $this->redirect('index.php?r=login/login');
    }
}