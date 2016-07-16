<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>安装系统 - 微凉 - 公众平台自助开源引擎</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
        html,body{font-size:13px;font-family:"Microsoft YaHei UI", "微软雅黑", "宋体";}
        .pager li.previous a{margin-right:10px;}
        .header a{color:#FFF;}
        .header a:hover{color:#428bca;}
        .footer{padding:10px;}
        .footer a,.footer{color:#eee;font-size:14px;line-height:25px;}
    </style>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color:#28b0e4;">
<div class="container">
    <div class="header" style="margin:15px auto;">
        <ul class="nav nav-pills pull-right" role="tablist">
            <li role="presentation" class="active"><a href="javascript:;">安装微凉系统</a></li>
            <li role="presentation"><a href="http://www.lszwx.cn">微凉官网</a></li>
            <li role="presentation"><a href="http://bbs.we7.cc">访问论坛</a></li>
        </ul>
        <img src="ys/img/log.jpg" />
    </div>
        <!--内容-->
    <?= $content;?>
        <!--内容-->
    <div class="footer" style="margin:15px auto;">
        <div class="text-center">
            <a href="http://www.we7.cc">关于微凉</a> &nbsp; &nbsp; <a href="http://bbs.we7.cc">微凉帮助</a> &nbsp; &nbsp; <a href="http://www.we7.cc">购买授权</a>
        </div>
        <div class="text-center">
            Powered by <a href="http://www.we7.cc"><b>微凉</b></a> v0.7 &copy; 2014 <a href="http://www.we7.cc">www.we7.cc</a>
        </div>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>