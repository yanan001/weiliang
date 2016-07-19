 <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="#">管理员中心</a>
                            </li>
                            <li class="active">登陆地限制</li>
                        </ul>
                        <!--breadcrumbs end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">IP添加</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal form-border" action="index.php?r=admin/add" method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">IP地址:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="ip" placeholder="例如:  192.168.1.1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-8 col-sm-10">
                                            <button type="submit" class="btn btn-primary">添加</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!--main content end-->