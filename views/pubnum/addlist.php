<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="#">公众号管理</a>
                    </li>
                    <li class="active">公众号添加</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">添加</h3>
                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" action="index.php?r=pubnum/addlist" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公众号名称:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="aname" placeholder="请输入公众号名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Appid:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="appid" placeholder="请输入Appid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Appsecret:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="appsecret" placeholder="请输入Appsecret">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">简介:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="account"  placeholder="请输入公众号描述"></textarea>
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