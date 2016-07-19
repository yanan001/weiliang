<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="#">自定义回复</a>
                    </li>
                    <li class="active">添加规则</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" action="index.php?r=reply/adds" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">规则用户：</label>
                                <div class="col-sm-6">
                                    <select name="user">
                                        <?php
                                        foreach($arr as $val){
                                            ?>
                                            <option value="<?php echo $val['aid'] ?>"><?php echo $val['aname'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">标题:</label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="title" name="name" size="50" value="" type="text" placeholder="请输入规则标题">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">关键字:</label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="keyword" size="50" placeholder="请输入关键字" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">回复内容:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="content"  placeholder="请输入回复内容"></textarea>
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



