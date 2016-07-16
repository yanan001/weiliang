<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="#">公众号管理</a>
                    </li>
                    <li class="active">公众号编辑</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                    <div class="panel-body">
                        <form class="form-horizontal form-border" action="index.php?r=pubnum/update" method="post">
                            <input type="hidden" name="id" value="<?php echo $arr['aid']?>"/>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公众号名称:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="aname" value="<?php echo $arr['aname']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="color:red">接口地址:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="aurl" value="<?php echo $arr['aurl']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="color:red">微信Token:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="token" ids="<?php echo $arr['aid']?>" name="atoken" value="<?php echo $arr['atoken']?>">
                                    <a href="javascript:void(0)" class="rand">生成新的</a>
                                    <div class="help-block">与微信公众平台接入设置值一致，必须为英文或者数字，长度为3到32个字符. 请妥善保管, Token 泄露将可能被窃取或篡改微信平台的操作数据.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Appid:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="appid" value="<?php echo $arr['appid']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Appsecret:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="appsecret" value="<?php echo $arr['appsecret']?>">
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
<script src="assets/js/jq.js"></script>

<script type="text/javascript">
    $(".rand").click(function(){
        var id=$("#token").attr("ids");

        $.ajax({
            url:"index.php?r=pubnum/rand",
            type:"POST",
            data:{
                id:id
            },
            success:function(data){

                $("#token").val(data);
            }
        })

    })
</script>