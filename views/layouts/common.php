<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WeiLiang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="ys/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="ys/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="ys/css/font-awesome.min.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="ys/css/animate.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="ys/css/main.css">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="ys/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="ys/plugins/todo/css/todos.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="ys/plugins/morris/css/morris.css">
    <!-- Fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <!-- Feature detection -->
    <script src="ys/js/modernizr-2.6.2.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="ys/js/html5shiv.js"></script>
    <script src="ys/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<section id="container">
    <header id="header">
        <!--logo start-->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>Space</span>Lab</a>
        </div>
        <!--logo end-->
        <div class="toggle-navigation toggle-left">
            <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="user-nav">
            <ul>
                <li class="dropdown messages">
                    <span class="badge badge-danager animated bounceIn" id="new-messages">5</span>
                    <button type="button" class="btn btn-default dropdown-toggle options" id="toggle-mail" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                    </button>
                    <ul class="dropdown-menu alert animated fadeInDown">
                        <li>
                            <h1>You have
                                <strong>5</strong>new messages</h1>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="ys/img/avatar.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">James Bagian</span>
                                    <span class="time">30 mins</span>
                                    <div class="message-content">Lorem ipsum dolor sit amet, elit rutrum felis sed erat augue fusce...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="ys/img/avatar1.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Jeffrey Ashby</span>
                                    <span class="time">2 hour</span>
                                    <div class="message-content">hendrerit pellentesque, iure tincidunt, faucibus vitae dolor aliquam...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="ys/img/avatar2.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">John Douey</span>
                                    <span class="time">3 hours</span>
                                    <div class="message-content">Penatibus suspendisse sit pellentesque eu accumsan condimentum nec...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="ys/img/avatar3.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Ellen Baker</span>
                                    <span class="time">7 hours</span>
                                    <div class="message-content">Sem dapibus in, orci bibendum faucibus tellus, justo arcu...</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="ys/img/avatar4.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Ivan Bella</span>
                                    <span class="time">6 hours</span>
                                    <div class="message-content">Curabitur metus faucibus sapien elit, ante molestie sapien...</div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#">Check all messages <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>

                </li>
                <li class="profile-photo">
                    <img src="ys/img/avatar.png" alt="" class="img-circle">
                </li>
                <li class="dropdown settings">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?= Yii::$app->session['username'];?> <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu animated fadeInDown">
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge badge-danager" id="user-inbox">5</span></a>
                        </li>
                        <li>
                            <a href="index.php?r=login/logout"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="toggle-navigation toggle-right">
                        <button type="button" class="btn btn-default" id="toggle-right">
                            <i class="fa fa-comment"></i>
                        </button>
                    </div>
                </li>

            </ul>
        </div>
    </header>
    <!--sidebar left start-->
    <aside class="sidebar">
        <div id="leftside-navigation" class="nano">
            <ul class="nano-content">
                <li class="active">
                    <a href="index.php?r=index/index"><i class="fa fa-dashboard"></i><span>首页</span></a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-cogs"></i><span>公众号管理</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>

                        <li><a href="?r=pubnum/addlist">添加公众号</a>
                        </li>
                        <li><a href="?r=pubnum/list">查看公众号</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-table"></i><span>自定义回复</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="?r=reply/index">文字回复</a>
                        </li>

                        <li><a href="?r=reply/ruled">添加规则</a>
                        </li>
                        <li><a href="">自动回复</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa fa-tasks"></i><span>菜单管理</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="">自定义菜单</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>管理员中心</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="">管理员添加</a>
                        </li>
                        <li><a href="">管理员列表</a>
                        </li>
                        <li><a href="index.php?r=admin/list">登录地IP</a>
                        </li>
                        <li><a href="index.php?r=admin/addlist">IP添加</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i><span>系统管理</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="">修改密码</a>
                        </li>
                        <li><a href="index.php?r=login/logout">立即退出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </aside>
    <!--sidebar left end-->
         <?= $content;?>
    <!--sidebar right start-->
    <aside class="sidebarRight">
        <div id="rightside-navigation ">
            <div class="sidebar-heading"><i class="fa fa-user"></i> Contacts</div>
            <div class="sidebar-title">online</div>
            <div class="list-contacts">
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="ys/img/avatar.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>James Bagian</h4>
                        <p>Los Angeles, CA</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="ys/img/avatar1.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Jeffrey Ashby</h4>
                        <p>New York, NY</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="ys/img/avatar2.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>John Douey</h4>
                        <p>Dallas, TX</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="ys/img/avatar3.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Ellen Baker</h4>
                        <p>London</p>
                    </div>
                    <div class="item-status item-status-away"></div>
                </a>
            </div>

            <div class="sidebar-title">offline</div>
            <div class="list-contacts">
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="ys/img/avatar4.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Ivan Bella</h4>
                        <p>Tokyo, Japan</p>
                    </div>
                    <div class="item-status"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="ys/img/avatar5.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Gerald Carr</h4>
                        <p>Seattle, WA</p>
                    </div>
                    <div class="item-status"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="ys/img/avatar6.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Viktor Gorbatko</h4>
                        <p>Palo Alto, CA</p>
                    </div>
                    <div class="item-status"></div>
                </a>
            </div>
        </div>
    </aside>
    <!--sidebar right end-->
</section>
<!--Global JS-->
<script src="ys/js/jquery-1.10.2.min.js"></script>
<script src="ys/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="ys/plugins/waypoints/waypoints.min.js"></script>
<script src="ys/js/application.js"></script>
<!--Page Level JS-->
<script src="ys/plugins/countTo/jquery.countTo.js"></script>
<script src="ys/plugins/weather/js/skycons.js"></script>
<!-- FlotCharts  -->
<script src="ys/plugins/flot/js/jquery.flot.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.resize.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.canvas.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.image.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.categories.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.crosshair.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.errorbars.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.fillbetween.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.navigate.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.pie.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.selection.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.stack.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.symbol.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.threshold.min.js"></script>
<script src="ys/plugins/flot/js/jquery.colorhelpers.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.time.min.js"></script>
<script src="ys/plugins/flot/js/jquery.flot.example.js"></script>
<!-- Morris  -->
<script src="ys/plugins/morris/js/morris.min.js"></script>
<script src="ys/plugins/morris/js/raphael.2.1.0.min.js"></script>
<!-- Vector Map  -->
<script src="ys/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="ys/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- ToDo List  -->
<script src="ys/plugins/todo/js/todos.js"></script>
<!--Load these page level functions-->
<script>
    $(document).ready(function() {
        app.timer();
        app.map();
        app.weather();
        app.morrisPie();
    });
</script>

</body>

</html>
