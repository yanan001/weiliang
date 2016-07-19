 <div class="row well" style="margin:auto 0;">
        <div class="col-xs-3">
            <div class="progress" title="安装进度">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                    50%
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    安装步骤
                </div>
                <ul class="list-group">
                    <a href="?r=install/insone" class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-copyright-mark"></span> &nbsp; 许可协议</a>
                    <a href="?r=install/instwo" class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; 环境监测</a>
                    <a href="javascript:;" class="list-group-item"><span class="glyphicon glyphicon-cog"></span> &nbsp; 参数配置</a>
                    <a href="javascript:;" class="list-group-item"><span class="glyphicon glyphicon-ok"></span> &nbsp; 成功</a>
                </ul>
            </div>
        </div>
        <div class="col-xs-9">
            <div class="panel panel-default">
                <div class="panel-heading">服务器信息</div>
                <table class="table table-striped">
                    <tr>
                        <th style="width:150px;">参数</th>
                        <th>值</th>
                        <th></th>
                    </tr>
                    <tr class="warning">
                        <td>服务器操作系统</td>
                        <td><?php echo $systeminfo['att1']?></td>
                        <td></td>
                    </tr>
                    <tr class="">
                        <td>Web服务器环境</td>
                        <td><?php echo $systeminfo['att2']?></td>
                        <td></td>
                    </tr>
                    <tr class="">
                        <td>PHP版本</td>
                        <td><?php echo $systeminfo['att3']?></td>
                        <td></td>
                    </tr>
                    <tr class="">
                        <td>程序安装目录</td>
                        <td><?php echo $systeminfo['att4']?></td>
                        <td></td>
                    </tr>
                    <tr class="">
                        <td>磁盘空间</td>
                        <td><?php echo $systeminfo['att5']?></td>
                        <td></td>
                    </tr>
                    <tr class="">
                        <td>上传限制</td>
                        <td><?php echo $systeminfo['att6']?></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <div class="alert alert-info">PHP环境要求必须满足下列所有条件，否则系统或系统部份功能将无法使用。</div>
            <div class="panel panel-default">
                <div class="panel-heading">PHP环境要求</div>
                <table class="table table-striped">
                    <tr>
                        <th style="width:150px;">选项</th>
                        <th style="width:180px;">要求</th>
                        <th style="width:50px;">状态</th>
                        <th>说明及帮助</th>
                    </tr>
                    <tr class="{$ret['php']['version']['class']}">
                        <td>PHP版本</td>
                        <td>5.5或者5.5以上</td>
                        <td><?php echo $ret['php']['version']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['version']['remark'])){?>
                            <?php echo $ret['php']['version']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr class="{$ret['php']['pdo']['class']}">
                        <td>MySQL</td>
                        <td>支持(建议支持PDO)</td>
                        <td><?php echo $ret['php']['mysql']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['pdo']['remark'])){?>
                                <?php echo $ret['php']['pdo']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr class="{$ret['php']['pdo']['class']}">
                        <td>PDO_MYSQL</td>
                        <td>支持(强烈建议支持)</td>
                        <td><?php echo $ret['php']['pdo']['value']?></td>
                        <td></td>
                    </tr>
                    <tr class="{$ret['php']['curl']['class']}">
                        <td>allow_url_fopen</td>
                        <td>支持(建议支持cURL)</td>
                        <td><?php echo $ret['php']['fopen']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['curl']['remark'])){?>
                                <?php echo $ret['php']['curl']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr class="{$ret['php']['curl']['class']}">
                        <td>cURL</td>
                        <td>支持(强烈建议支持)</td>
                        <td><?php echo $ret['php']['curl']['value']?></td>
                        <td></td>
                    </tr>
                    <tr class="{$ret['php']['ssl']['class']}">
                        <td>openSSL</td>
                        <td>支持</td>
                        <td><?php echo $ret['php']['ssl']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['ssl']['remark'])){?>
                                <?php echo $ret['php']['ssl']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr class="{$ret['php']['gd']['class']}">
                        <td>GD2</td>
                        <td>支持</td>
                        <td><?php echo $ret['php']['gd']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['gd']['remark'])){?>
                                <?php echo $ret['php']['gd']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr class="{$ret['php']['dom']['class']}">
                        <td>DOM</td>
                        <td>支持</td>
                        <td><?php echo $ret['php']['dom']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['dom']['remark'])){?>
                                <?php echo $ret['php']['dom']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr class="{$ret['php']['session']['class']}">
                        <td>session.auto_start</td>
                        <td>关闭</td>
                        <td><?php echo $ret['php']['session']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['session']['remark'])){?>
                                <?php echo $ret['php']['session']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr class="{$ret['php']['asp_tags']['class']}">
                        <td>asp_tags</td>
                        <td>关闭</td>
                        <td><?php echo $ret['php']['asp_tags']['value']?></td>
                        <td>
                            <?php if(isset($ret['php']['asp_tags']['remark'])){?>
                                <?php echo $ret['php']['asp_tags']['remark']?>
                            <?php }else{?>
                            <?php }?>
                        </td>
                    </tr>
                </table>
            </div>
            <form class="form-inline" role="form" action="?r=install/insthree" method="post">
                <input type="hidden" name="do" id="do" />
                <ul class="pager">
                    <li class="previous"><a href="javascript:;" onclick="history.go(-1);"><span class="glyphicon glyphicon-chevron-left"></span> 返回</a></li>
                    <li class="previous"><a href="javascript:;" onclick="$('#do').val('continue');$('form')[0].submit();">继续 <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </form>
        </div>
    </div>