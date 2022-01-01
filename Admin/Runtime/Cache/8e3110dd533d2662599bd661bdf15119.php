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
    <title>后台管理-发放奖励</title>
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
                            <a class="icon-rmb" href="<?php echo U('Pay/index');?>"> 支付管理</a>
                        </li>
						<li <?php if(MODULE_NAME == Score): ?>class="active"<?php endif; ?>>
                            <a class="icon-usd" href="<?php echo U('user/jiangjin_cfg');?>"> 奖金设置</a>
                        </li>
                        <li <?php if(MODULE_NAME == Score): ?>class="active"<?php endif; ?>>
                            <a class="icon-usd" href="<?php echo U('Score/index');?>"> 发放奖励</a>
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
                        
                        <li <?php if(MODULE_NAME == Gold): ?>class="active"<?php endif; ?>>
                            <a class="icon-won" href="<?php echo U('Gold/index');?>"> 矿场相关设置</a>
                        </li>
                        
                       
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
                        
                        <li <?php if(MODULE_NAME == Gold): ?>class="active"<?php endif; ?>>
                            <a class="icon-won" href="<?php echo U('Gold/index');?>"> 矿场相关设置</a>
                        </li>
                        
                       
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
                        
                        <li <?php if(MODULE_NAME == Gold): ?>class="active"<?php endif; ?>>
                            <a class="icon-won" href="<?php echo U('Gold/index');?>"> 矿场相关设置</a>
                        </li>
                        
                       
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
    <div class="tab border-sub" data-toggle="click">
        <div class="tab-head">
            <ul class="tab-nav">
                <li class="active"><a href="#tab-start2">增加奖励</a></li>
                <li><a href="#tab-css">减少奖励</a></li>
            </ul>
        </div>
        <div class="tab-body">
            <div class="tab-panel active" id="tab-start2">
                <form action="<?php echo U('Score/add');?>" method="post">
                    <div class="form-group">
                        <div class="label">
                            <label>用户ID</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input input-auto" name="uid" value="<?php echo ($_GET['uid']); ?>" size="50" placeholder="会员的数字ID" data-validate="required:必填,plusinteger:必须为正整数" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>奖励水晶数量</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input input-auto" name="jink" value="<?php echo ($_GET['jinkz']); ?>" size="50" placeholder="给会员的水晶数量" data-validate="required:必填,plusinteger:必须为正整数" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>奖励铁矿</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input input-auto" name="tiek" size="50" placeholder="发放铁矿奖励" value="<?php echo iconv('GB2312', 'UTF-8',$_GET['tiekz']);?>" data-validate="required:必填" />
                        </div>
                    </div>
                    <div class="form-button">
                        <button class="button" type="submit">确定发放</button>
                    </div>
                </form>
            </div>
            <div class="tab-panel active" id="tab-css">
                <form action="<?php echo U('Score/red');?>" method="post">
                    <div class="form-group">
                        <div class="label">
                            <label>用户ID</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input input-auto" name="uid" value="<?php echo ($_GET['uid']); ?>" size="50" placeholder="会员的数字ID" data-validate="required:必填,plusinteger:必须为正整数" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>减少水晶数量</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input input-auto" name="jink" value="<?php echo ($_GET['jinkz']); ?>" size="50" placeholder="给会员的水晶数量" data-validate="required:必填,plusinteger:必须为正整数" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>减少铁矿</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input input-auto" name="tiek" size="50" placeholder="发放铁矿奖励" value="<?php echo iconv('GB2312', 'UTF-8',$_GET['tiekz']);?>" data-validate="required:必填" />
                        </div>
                    </div>
                    <div class="form-button">
                        <button class="button" type="submit">确定发放</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>