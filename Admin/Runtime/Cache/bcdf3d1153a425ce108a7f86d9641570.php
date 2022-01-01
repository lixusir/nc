<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="__PUBLIC__/css/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin.css">
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/js/pintuer.js"></script>
    <script src="__PUBLIC__/js/respond.js"></script>
    <script src="__PUBLIC__/js/admin.js"></script>
    <script src="__ROOT__/Public/DatePicker/WdatePicker.js"></script>
    <link type="image/x-icon" href="#" rel="shortcut icon" />
    <link href="#" rel="bookmark icon" />
    <title>后台管理-支付管理</title>
</head>

<body>
<div class="lefter">
    <div class="logo">
        <a href="#" target="_blank"><img src="__PUBLIC__/images/logo.png" alt="后台管理系统" /></a>
    </div>
</div>

<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="<?php echo (C("DOMAINNAME")); ?>" target="_blank"><?php echo (session('adminname')); ?></a>
                <a class="button button-little bg-yellow" href="<?php echo U('Login/logout');?>">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li <?php if(MODULE_NAME == Index OR MODULE_NAME == Pay OR MODULE_NAME == Score OR MODULE_NAME == Apilog OR MODULE_NAME == Cache): ?>class="active"<?php endif; ?>>
                    <a href="<?php echo U('Index/index');?>" class="icon-home"> 开始</a>
                    <ul>
                        <li <?php if(MODULE_NAME == Index): ?>class="active"<?php endif; ?>>
                            <a class="icon-home" href="<?php echo U('Index/index');?>"> 后台首页</a>
                        </li>
                        <li <?php if(MODULE_NAME == Pay): ?>class="active"<?php endif; ?>>
                            <a class="icon-rmb" href="<?php echo U('Pay/index');?>"> 交易大厅</a>
                        </li>
						<li <?php if(MODULE_NAME == Score): ?>class="active"<?php endif; ?>>
                            <a class="icon-usd" href="<?php echo U('user/jiangjin_cfg');?>"> 系统设置</a>
                        </li>
                        
					
						<li <?php if(MODULE_NAME == Score): ?>class="active"<?php endif; ?>>
                            <a class="icon-usd" href="admin.php?m=user&a=kczt&zt=1"> 矿场开启</a>
                        </li>
						<li <?php if(MODULE_NAME == Score): ?>class="active"<?php endif; ?>>
                            <a class="icon-usd" href="admin.php?m=user&a=kczt&zt=0"> 矿场关闭</a>
                        </li>
					
			
                        
                        <li <?php if(MODULE_NAME == Cache): ?>class="active"<?php endif; ?>>
                            <a class="icon-times" href="<?php echo U('Cache/index');?>"> 清除缓存</a>
                        </li>
						
                    </ul>
                </li>
                <li <?php if(MODULE_NAME == User OR MODULE_NAME == Sign OR MODULE_NAME == Top): endif; ?>>
                    <a href="<?php echo U('User/index');?>" class="icon-user"> 会员</a>
                    <ul>
                        <li <?php if(MODULE_NAME == User AND ACTION_NAME == index OR ACTION_NAME == adduser): ?>class="active"<?php endif; ?>>
                            <a class="icon-user" href="<?php echo U('User/index');?>"> 会员列表</a>
                        </li>
                        <li <?php if(ACTION_NAME == record): ?>class="active"<?php endif; ?>>
                            <a class="icon-tasks" href="<?php echo U('User/record');?>"> 矿场明细</a>
                        </li>
                        <li <?php if(MODULE_NAME == Sign): ?>class="active"<?php endif; ?>>
                            <a class="icon-pencil" href="<?php echo U('user/sign_cfg');?>"> 签到记录</a>
                        </li>
						
                        
                    </ul>
                </li>
                
               
                <li <?php if(MODULE_NAME == Setup OR MODULE_NAME == Link OR MODULE_NAME == Tpl OR MODULE_NAME == Admin OR MODULE_NAME == Signin OR MODULE_NAME == Gold): ?>class="active"<?php endif; ?>>
                    <a href="<?php echo U('Gold/index');?>" class="icon-cogs"> 系统</a>
                    <ul>
                        <!--<li <?php if(MODULE_NAME == Setup): ?>class="active"<?php endif; ?>>
                            <a class="icon-gear" href="<?php echo U('Setup/index');?>"> 网站设置</a>
                        </li>-->
                        
                        
                        
                       
                        <li  <?php if(MODULE_NAME == Admin): ?>class="active"<?php endif; ?>>
                            <a class="icon-group" href="<?php echo U('Admin/index');?>"> 管理员设置</a>
                        </li>
                    </ul>
                </li>
				    <li <?php if(MODULE_NAME == Setup OR MODULE_NAME == Link OR MODULE_NAME == Tpl OR MODULE_NAME == Admin OR MODULE_NAME == Signin OR MODULE_NAME == Gold): ?>class="active"<?php endif; ?>>
                    <a href="<?php echo U('user/info');?>" class="icon-cogs"> 清理</a>
                    <ul>
                        <!--<li <?php if(MODULE_NAME == Setup): ?>class="active"<?php endif; ?>>
                            <a class="icon-gear" href="<?php echo U('Setup/index');?>"> 网站设置</a>
                        </li>-->
                        
                        
                        
                       
                        <li  <?php if(MODULE_NAME == Admin): ?>class="active"<?php endif; ?>>
                            <a class="icon-group" href="<?php echo U('Admin/index');?>"> 管理员设置</a>
                        </li>
                    </ul>
                </li>
				<li <?php if(MODULE_NAME == Setup OR MODULE_NAME == Link OR MODULE_NAME == Tpl OR MODULE_NAME == Admin OR MODULE_NAME == Signin OR MODULE_NAME == Gold): ?>class="active"<?php endif; ?>>
                    <a href="http://cli.im/url" class="icon-cogs" target=_blank> 二维码生成</a>
                    <ul>
                        <!--<li <?php if(MODULE_NAME == Setup): ?>class="active"<?php endif; ?>>
                            <a class="icon-gear" href="<?php echo U('Setup/index');?>"> 网站设置</a>
                        </li>-->
                        
                        
                        
                       
                        <li  <?php if(MODULE_NAME == Admin): ?>class="active"<?php endif; ?>>
                            <a class="icon-group" href="<?php echo U('Admin/index');?>"> 管理员设置</a>
                        </li>
                    </ul>
                </li>
				<li <?php if(MODULE_NAME == Setup OR MODULE_NAME == Link OR MODULE_NAME == Tpl OR MODULE_NAME == Admin OR MODULE_NAME == Signin OR MODULE_NAME == Gold): ?>class="active"<?php endif; ?>>
                    <a href="https://www.appbsl.com/" class="icon-cogs" target=_blank> APP免费制作</a>
                   
                </li>
				
            </ul>
        </div>
    </div>
</div>

<div class="admin">
    <div class="tab">
        <div class="tab-head">
            <ul class="tab-nav">
			<li class="active">
                    <a href="<?php echo U('Pay/index');?>">所有</a>
                </li>
                <li class="">
                    <a href="<?php echo U('Pay/wei');?>">未交易</a>
                </li>
                <li>
                    <a href="<?php echo U('Pay/jyz');?>">交易中</a>
                </li>
                <li>
                    <a href="<?php echo U('Pay/jy');?>">交易完成</a>
                </li>
                
            </ul>
        </div>
        <div class="tab-body">
            <div class="tab-panel active">
                <form method="post" action="<?php echo U('Pay/yespay');?>">
                    <div class="panel admin-panel">
                        <div class="padding border-bottom">
                            
                        </div>
                        <table class="table table-hover" width="100%">
                            <tr>
                                
                                <th width="86">ID</th>
                                <th width="146">卖家ID</th>
                                <th width="156">用户名</th>
                                <th width="295">挂售时间</th>
                                <th width="259">状态</th>
                                <th width="278">单价</th>
                                <th width="316">数量</th>
								<th width="316">状态</th>
								
								<th width="316">买家/卖家</th>
								<th width="316">成交/购买时间</th>
                                <th width="222">管理操作</th>
                            </tr>
                            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                                
                                <td><?php echo ($v['id']); ?></td>
                                <td><?php echo ($v['userid']); ?></td>
                                <td><?php echo ($v['username']); ?></td>
                                <td><?php echo ($v["add_time"]); ?></td>
                                <td><?php echo ($v['zt']); ?></td>
                                <td><?php echo ($v['price']); ?>元</td>
                                <td><b><?php echo ($v["num"]); ?></b></td>								
								<td><b><?php if($v['type']==0){echo '等待交易';} if($v['type']==1){echo '交易中';} if($v['type']==2){echo '交易完成 ';} ?></b></td>
                                <td><b><?php echo ($v["buy_username"]); ?></b></td>
								<td><b><?php echo ($v["buy_time"]); ?></b></td>
								<td>
                                    <a class="button border-blue button-little" href="<?php echo U('Pay/yespay',array(id=>$v['id']));?>" onClick="{if(confirm('确认支付?')){return true;}return false;}">支付</a>
                                    <a class="button border-yellow button-little" href="<?php echo U('Pay/back',array('uid'=>$pay['userid'],'pid'=>$v['id'],'money'=>$pay['money']));?>">退回</a>                                </td>
                            </tr><?php endforeach; endif; ?>
                        </table>
                        <div class="panel-foot text-center">
                            <?php echo ($page); ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>