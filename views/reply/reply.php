

<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="#">公众号管理</a>
                    </li>
                    <li class="active">查看公众号</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">公众号列表</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table" border="1">
                        <thead>

                        <tr class="warning">
                            <th>ID</th>
                            <th>标题</th>
                            <th>回复标题</th>
                            <th>回复内容</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($arr as $val) {
                            ?>
                            <tr>
                                <td class="tc"><input name="id[]" value="59" type="checkbox"></td>

                                <td><?php echo $val['reid'] ?></td>
                                <td title=""><a target="_blank" href="#"><?php echo $val['rename'] ?></a> …
                                </td>
                                <td><?php echo $val['rekeyword'] ?></td>
                                <td><?php echo $val['trcontent'] ?></td>
                                <td>
                                    <a class="link-update" href="#">修改</a>
                                    <a class="link-del" href="#">删除</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                        <!--分页-->
                        <!--<tr>
                            <?php
                        /*                            use yii\widgets\LinkPager;
                                                    */?>
                            <td colspan="3" align="center"><?/*= LinkPager::widget(['pagination' => $pagination]) */?></td>
                        </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>

<!--main content end-->



