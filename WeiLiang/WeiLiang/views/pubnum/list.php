

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
                            <th>公众号名称</th>
                            <th>所属用户</th>
                            <th>API地址</th>
                            <th>Token</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($arr as $v){?>
                            <tr class="info">
                                <td><?php echo $v['aid']?></td>
                                <td><?php echo $v['aname']?></td>
                                <td><?php echo $v['name']?></td>
                                <td>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $v['aurl']?> " id="api_4"/>
                                        <button onClick="copyUrl()" type="button">复制</button>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $v['atoken']?>" id="token"/>
                                        <button onClick="copyUrl1()" type="button">复制</button>
                                    </div>
                                </td>
                                <td>
                                    <a href="index.php?r=pubnum/del&id=<?php echo $v['aid']?>"><button>删除</button></a>
                                    <a href="index.php?r=pubnum/save&id=<?php echo $v['aid']?>"><button>修改</button></a>
                                </td>
                            </tr>
                        <?php }?>
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

<script>

    function copyUrl()
     {
         var Url=document.getElementById("api_4");
         Url.select(); // 选择对象
         document.execCommand("Copy"); // 执行浏览器复制命令
         alert("已复制好，可贴粘。");
         }
    function copyUrl1()
    {
        var Url=document.getElementById("token");
        Url.select(); // 选择对象
        document.execCommand("Copy"); // 执行浏览器复制命令
        alert("已复制好，可贴粘。");
    }
</script>
<!--main content end-->
