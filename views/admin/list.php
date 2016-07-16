
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
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">许可IP列表</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr class="warning">
                                    <th>ID</th>
                                    <th>可用IP地址</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($info as $v){?>
                                    <tr class="info">
                                        <td><?php echo $v['id']?></td>
                                        <td><?php echo $v['ip']?></td>
                                        <td>
                                            <a href="index.php?r=admin/del&id=<?php echo $v['id']?>"><button type="button" class="btn btn-danger btn-trans" >删除</button></a>
                                            <a href="index.php?r=admin/save&id=<?php echo $v['id']?>"><button type="button" class="btn btn-primary btn-trans">修改</button></a>
                                        </td>
                                    </tr>
                                <?php }?>
                                <!--分页-->
                                <tr>
                                    <?php
                                        use yii\widgets\LinkPager;
                                    ?>
                                    <td colspan="3" align="center"><?= LinkPager::widget(['pagination' => $pagination]) ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!--main content end-->
