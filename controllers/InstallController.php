<?php
namespace app\controllers;
define('IA_ROOT', str_replace("\\",'/', dirname(__FILE__)));
use Yii;
use yii\web\Controller;

class InstallController extends Controller
{
    public $layout = 'anzhuang';
    public $enableCsrfValidation = false;

    /*
     * 自动验证
     * @sunwei
     */
    public function init()
    {
    	if(file_exists("./sql/sunwei.php")){
	        if(Yii::$app->session['user_key']!='1'){
	            $this->redirect('index.php?r=login/login');
	        }else{
	        	$this->redirect('index.php?r=index/index');
	        }
        }
    }

    /*
     * 安装第一步
     * 1.同意条款
     * @sunwei
     */
    public function actionInsone(){
        return $this->render('insone');
    }

    /*
     * 安装第二步
     * 2.检测环境
     * @sunwei
     */
    public function actionInstwo(){
        //操作系统详情
        $systeminfo['att1'] = php_uname('a');
        //web服务器版本
        $systeminfo['att2'] = $_SERVER['SERVER_SOFTWARE'];
        //php版本
        $systeminfo['att3'] = PHP_VERSION;
        //当前项目安装路径
        $aaaa = IA_ROOT;
        $systeminfo['att4'] = str_replace(substr(strrchr($aaaa, '/'), 0),'',$aaaa);
        //当前磁盘空间
        if(function_exists('disk_free_space')) {
            $systeminfo['att5'] = floor(disk_free_space(IA_ROOT) / (1024*1024)).'M';
        } else {
            $systeminfo['att5'] = 'unknow';
        }
        //最大上传大小
        $systeminfo['att6'] = ini_get('upload_max_filesize');

        //PHP环境要求
        $ret = array();
        $ret['php']['version']['value'] = PHP_VERSION;
        $ret['php']['version']['class'] = 'success';
        if(version_compare(PHP_VERSION, '5.3.0') == -1) {
            $ret['php']['version']['class'] = 'danger';
            $ret['php']['version']['failed'] = true;
            $ret['php']['version']['remark'] = 'PHP版本必须为 5.3.0 以上. <a href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58062">详情</a>';
        }

        $ret['php']['mysql']['ok'] = function_exists('mysql_connect');
        if($ret['php']['mysql']['ok']) {
            $ret['php']['mysql']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
        } else {
            $ret['php']['pdo']['failed'] = true;
            $ret['php']['mysql']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
        }

        $ret['php']['pdo']['ok'] = extension_loaded('pdo') && extension_loaded('pdo_mysql');
        if($ret['php']['pdo']['ok']) {
            $ret['php']['pdo']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
            $ret['php']['pdo']['class'] = 'success';
            if(!$ret['php']['mysql']['ok']) {
                $ret['php']['pdo']['remark'] = '您的PHP环境不支持 mysql_connect，请开启此扩展. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58073">详情</a>';
            }
        } else {
            $ret['php']['pdo']['failed'] = true;
            if($ret['php']['mysql']['ok']) {
                $ret['php']['pdo']['value'] = '<span class="glyphicon glyphicon-remove text-warning"></span>';
                $ret['php']['pdo']['class'] = 'warning';
                $ret['php']['pdo']['remark'] = '您的PHP环境不支持PDO, 请开启此扩展. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58074">详情</a>';
            } else {
                $ret['php']['pdo']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
                $ret['php']['pdo']['class'] = 'danger';
                $ret['php']['pdo']['remark'] = '您的PHP环境不支持PDO, 也不支持 mysql_connect, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58074">详情</a>';
            }
        }

        $ret['php']['fopen']['ok'] = @ini_get('allow_url_fopen') && function_exists('fsockopen');
        if($ret['php']['fopen']['ok']) {
            $ret['php']['fopen']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
        } else {
            $ret['php']['fopen']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
        }

        $ret['php']['curl']['ok'] = extension_loaded('curl') && function_exists('curl_init');
        if($ret['php']['curl']['ok']) {
            $ret['php']['curl']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
            $ret['php']['curl']['class'] = 'success';
            if(!$ret['php']['fopen']['ok']) {
                $ret['php']['curl']['remark'] = '您的PHP环境虽然不支持 allow_url_fopen, 但已经支持了cURL, 这样系统是可以正常高效运行的, 不需要额外处理. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58076">详情</a>';
            }
        } else {
            if($ret['php']['fopen']['ok']) {
                $ret['php']['curl']['value'] = '<span class="glyphicon glyphicon-remove text-warning"></span>';
                $ret['php']['curl']['class'] = 'warning';
                $ret['php']['curl']['remark'] = '您的PHP环境不支持cURL, 但支持 allow_url_fopen, 这样系统虽然可以运行, 但还是建议你开启cURL以提升程序性能和系统稳定性. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58086">详情</a>';
            } else {
                $ret['php']['curl']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
                $ret['php']['curl']['class'] = 'danger';
                $ret['php']['curl']['remark'] = '您的PHP环境不支持cURL, 也不支持 allow_url_fopen, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58086">详情</a>';
                $ret['php']['curl']['failed'] = true;
            }
        }

        $ret['php']['ssl']['ok'] = extension_loaded('openssl');
        if($ret['php']['ssl']['ok']) {
            $ret['php']['ssl']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
            $ret['php']['ssl']['class'] = 'success';
        } else {
            $ret['php']['ssl']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
            $ret['php']['ssl']['class'] = 'danger';
            $ret['php']['ssl']['failed'] = true;
            $ret['php']['ssl']['remark'] = '没有启用OpenSSL, 将无法访问公众平台的接口, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58109">详情</a>';
        }

        $ret['php']['gd']['ok'] = extension_loaded('gd');
        if($ret['php']['gd']['ok']) {
            $ret['php']['gd']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
            $ret['php']['gd']['class'] = 'success';
        } else {
            $ret['php']['gd']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
            $ret['php']['gd']['class'] = 'danger';
            $ret['php']['gd']['failed'] = true;
            $ret['php']['gd']['remark'] = '没有启用GD, 将无法正常上传和压缩图片, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58110">详情</a>';
        }

        $ret['php']['dom']['ok'] = class_exists('DOMDocument');
        if($ret['php']['dom']['ok']) {
            $ret['php']['dom']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
            $ret['php']['dom']['class'] = 'success';
        } else {
            $ret['php']['dom']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
            $ret['php']['dom']['class'] = 'danger';
            $ret['php']['dom']['failed'] = true;
            $ret['php']['dom']['remark'] = '没有启用DOMDocument, 将无法正常安装使用模块, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58111">详情</a>';
        }

        $ret['php']['session']['ok'] = ini_get('session.auto_start');
        if($ret['php']['session']['ok'] == 0 || strtolower($ret['php']['session']['ok']) == 'off') {
            $ret['php']['session']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
            $ret['php']['session']['class'] = 'success';
        } else {
            $ret['php']['session']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
            $ret['php']['session']['class'] = 'danger';
            $ret['php']['session']['failed'] = true;
            $ret['php']['session']['remark'] = '系统session.auto_start开启, 将无法正常注册会员, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58111">详情</a>';
        }

        $ret['php']['asp_tags']['ok'] = ini_get('asp_tags');
        if(empty($ret['php']['asp_tags']['ok']) || strtolower($ret['php']['asp_tags']['ok']) == 'off') {
            $ret['php']['asp_tags']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
            $ret['php']['asp_tags']['class'] = 'success';
        } else {
            $ret['php']['asp_tags']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
            $ret['php']['asp_tags']['class'] = 'danger';
            $ret['php']['asp_tags']['failed'] = true;
            $ret['php']['asp_tags']['remark'] = '请禁用可以使用ASP 风格的标志，配置php.ini中asp_tags = Off';
        }
        //print_r($ret);die;
        return $this->render('instwo',array('systeminfo'=>$systeminfo,'ret'=>$ret));
    }

    /*
     * 安装第二步
     * 3.数据库配置页面
     * @sunwei
     */
    public function actionInsthree(){
        return $this->render('insthree');
    }


    /*
     * 安装第二步
     * 4.创建数据库,导入表
     * @sunwei
     */
    public function actionInsfour(){
        $data = Yii::$app->request->post();
        $aaaa =$data['db']['server'];
        $db_port=substr(strrchr($aaaa, ':'), 1);
        $db_host=str_replace(substr(strrchr($aaaa, ':'), 0),'',$aaaa);
        $db_user=$data['db']['username'];       //连接数据库的用户名
        $db_pwd=$data['db']['password'];        //连接数据库的密码
        if($db_pwd==' '){$db_pwd='';}
        $db_pre=$data['db']['prefix'];
        $db_name=$data['db']['name'];       //要创建的数据库
        //创建数据库
        $host = $db_host;
        $connection = @mysqli_connect("$host","$db_user","$db_pwd");
        if($connection){
            $sql = "CREATE DATABASE "."$db_name";
            if(mysqli_query($connection, $sql)){
                //导入sql文件
                $file=file_get_contents('./sql/weiliang.sql');
                $arr=explode(';',$file);
                if(mysqli_select_db($connection,"$db_name")){
                    foreach ($arr as $v) {
                        mysqli_query($connection ,$v.';');
                    }
                    $str="<?php
					return [
						'class' => 'yii\db\Connection',
						'dsn' => 'mysql:host=".$db_host.";port=$db_port;dbname=".$db_name."',
						'username' => '".$db_user."',
						'password' => '".$db_pwd."',
						'charset' => 'utf8',
						'tablePrefix' => '".$db_pre."',   //加入前缀名称we_
					];";
                    file_put_contents('../config/db.php',$str);
                    $str1="<?php\$pdo=new PDO('mysql:host=$db_host;port=$db_port; dbname=$db_name','$db_user','$db_pwd');?>";
                    file_put_contents('./sql/database.php',$str1);

                    //加表前缀
                    $tables = mysqli_query($connection,'SHOW TABLES');
                    while($name1 = mysqli_fetch_array($tables)) {
                        $table = $db_pre.$name1['0'];
                        mysqli_query($connection,"rename table $name1[0] to $table");
                    }

                    //导入成功后用户数据添加
                    $name=$data['user']['username'];
                    $pwd=md5($data['user']['password']);
                    $ip=$_SERVER["REMOTE_ADDR"];
                    $sql="insert into ".$db_pre."admin (name,pwd) VALUES ('$name','$pwd')";
                    $sql1="insert into ".$db_pre."ip (ip) VALUES ('$ip')";
                    $sql2="insert into ".$db_pre."ip (ip) VALUES ('::1')";
                    mysqli_query($connection,$sql);
                    mysqli_query($connection,$sql1);
                    mysqli_query($connection,$sql2);

                    //新建验证文件
                    $sw_file       =   'sql/sunwei.php';//文件名及路径,在当前目录下新建aa.txt文件
                    $fopen                     =   fopen($sw_file,'wb');//新建文件命令
                    fputs($fopen,   '终于要完成了!');//向文件中写入内容;
                    fclose($fopen);
                    $strs=str_replace("//'db' => require(__DIR__ . '/db.php'),","'db' => require(__DIR__ . '/db.php'),",file_get_contents("../config/web.php"));
                    file_put_contents("../config/web.php",$strs);
                }
            }else{
                echo "<script language=\"javascript\"> alert('数据库创建失败!');window.location.href = document.referrer;</script> ";
            }
        }else{
            echo "<script language=\"javascript\"> alert('数据库连接失败!');window.location.href = document.referrer;</script>";
        }
        return $this->render('insfour');
    }
}