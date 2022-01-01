<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>网站后台系统管理</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/Public/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="/Public/assets/css/font-awesome.css" />


        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="/Public/assets/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="/Public/assets/css/ace-part2.css" class="ace-main-stylesheet" />
        <![endif]-->

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="/Public/assets/css/ace-ie.css" />
        <![endif]-->

        <!-- inline styles related to this page -->
        <link rel="stylesheet" href="/Public/assets/css/slackck.css" />
        <!-- ace settings handler -->
        <script src="/Public/assets/js/ace-extra.js"></script>
        <script src="/Public/assets/js/jquery.min.js"></script>
        <script src="/Public/assets/js/jquery.form.js"></script>
        <script src="/Public/layer/layer.js"></script>
        <script>
            var cleanCacheURL = "/qyadmin.php/Index/cleanCache";
        </script>
        <script src="/Public/assets/js/admin.js"></script>
        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="/Public/assets/js/html5shiv.js"></script>
        <script src="/Public/assets/js/respond.js"></script>
        <![endif]-->


    </head>

    <body class="no-skin">
        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-default    navbar-collapse">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="navbar-container" id="navbar-container">
                <!-- #section:basics/sidebar.mobile.toggle -->
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="/qyadmin.php/Index/index" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            农场系统管理平台
                        </small>
                    </a>

                    <!-- /section:basics/navbar.layout.brand -->

                    <!-- #section:basics/navbar.toggle -->
<!--                    <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons">
                        <span class="sr-only">Toggle user menu</span>

                        <img src="/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
                    </button>-->

                    <!-- /section:basics/navbar.toggle -->
                </div>

                <!-- #section:basics/navbar.dropdown -->
                <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
                    <ul class="nav ace-nav">
                        <!-- #section:basics/navbar.user_menu -->
                        <li class="blue">
                            <a data-toggle="dropdown" id="cleanCache" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-trash"></i>
                            </a>
                        </li>
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    Test                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                                                <li>
                                    <a href="<?php echo U('Admin/index');?>">
                                        <i class="ace-icon fa fa-cog"></i>
                                        个人设置
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo U('Login/logout');?>">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        注销
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- /section:basics/navbar.user_menu -->
                    </ul>
                </div>
				
				<div style="display:none;">
				<script language="javascript" type="text/javascript" src="//js.users.51.la/19110681.js"></script>
<noscript><a href="//www.51.la/?19110681" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="//img.users.51.la/19110681.asp" style="border:none" /></a></noscript>
				</div>

                <!-- /section:basics/navbar.dropdown -->
            </div><!-- /.navbar-container -->
        </div>
        

        <!-- webuploader lode -->
        <link rel="stylesheet" href="/Public/webuploader/css/webuploader.css" />
        <script charset="utf-8" src="/Public/webuploader/js/webuploader.js"></script>
        <script charset="utf-8" src="/Public/webuploader/js/getting-started-qiniu.js"></script>

        <!-- kindertor lode -->
        <link rel="stylesheet" href="/Public/kindeditor/themes/default/default.css" />
        <script charset="utf-8" src="/Public/kindeditor/kindeditor-all-min.js"></script>
        <script charset="utf-8" src="/Public/kindeditor/lang/zh-CN.js"></script>
        <script src="/Public/echarts/echarts.min.js"></script>
        <script>

            var editor;
            KindEditor.ready(function (K) {
                editor = K.create('textarea[name="kind_text"],textarea[name="kind_text1"],textarea[name="kind_text2"],textarea[name="kind_text3"]', {
                    resizeType: 1,
                    width: "80%",
                    height: "300px",
                    filterMode: false, //是否开启过滤模式
                    allowPreviewEmoticons: false, //是否预览表情
                    allowImageUpload: true, //是否开启本地图片上传
                    afterBlur: function () {
                        this.sync();
                    },
                    items: [
                        'source', 'clearhtml', '|', 'fontname', 'fontsize', '|', 'preview', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', '|', 'emoticons', 'image', 'link']
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#logout").click(function () {
                    layer.confirm('你确定要退出吗？', {icon: 3}, function (index) {
                        layer.close(index);
                        window.location.href = "/qyadmin.php/Login/logout";
                    });
                });
            });
        </script>

<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar responsive">
<ul class="nav nav-list">
        
        <li class="active open"><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text">
                        系统设置                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=sys">
                                <i class="menu-icon fa fa-caret-right"></i>
                                系统参数设置                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=admin&a=index">
                                <i class="menu-icon fa fa-caret-right"></i>
                                管理员管理                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=game_config">
                                <i class="menu-icon fa fa-caret-right"></i>
                                游戏设置                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        <li class="">
                                                <a href="/admin.php?m=user&a=admin_rule">
                                                    <i class="menu-icon fa fa-caret-right"></i>
                                                    导航设置
                                                </a>
                                                <b class="arrow"></b>
                                            </li>-->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-bullhorn"></i>
                    <span class="menu-text">
                        公告管理                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=Notice_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                公告列表                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-gift"></i>
                    <span class="menu-text">
                        商店管理                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=shop_class_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                商品类型                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=shop_commodity_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                商品管理                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-globe"></i>
                    <span class="menu-text">
                        土地管理                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=land_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                会员土地信息                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=land_class_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                土地类型管理                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=crops_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                农产品管理                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=house_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                房屋管理                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=scene_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                场景管理                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-group"></i>
                    <span class="menu-text">
                        会员管理                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=member_add">
                                <i class="menu-icon fa fa-caret-right"></i>
                                添加会员                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=member_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                会员列表                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=member_head_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                头像管理                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-exchange"></i>
                    <span class="menu-text">
                        金币管理                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=gold_add_subtract">
                                <i class="menu-icon fa fa-caret-right"></i>
                                加减金币                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=gold_add_subtract_log_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                加减记录                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-calendar"></i>
                    <span class="menu-text">
                        日志管理                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=member_login_log_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                会员登录日志                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=member_gold_log_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                会员资金记录                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=member_land_log_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                土地操作日志                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=member_log_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                会员使用日志                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-heart"></i>
                    <span class="menu-text">
                        宠物管理                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=pet_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                宠物设置                            </a>
                            <b class="arrow"></b>
                        </li><li class="">
                            <a href="/admin.php?m=user&a=pet_level">
                                <i class="menu-icon fa fa-caret-right"></i>
                                宠物等级设置                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-folder"></i>
                    <span class="menu-text">
                        攻略资料                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=raiders_list">
                                <i class="menu-icon fa fa-caret-right"></i>
                                攻略列表                            </a>
                            <b class="arrow"></b>
                        </li>
						<li class="" style="display:none;">
                            <a href="/admin.php?m=user&a=raiders_label">
                                <i class="menu-icon fa fa-caret-right"></i>
                                攻略标签                            </a>
                            <b class="arrow"></b>
                        </li>
						<li class="" style="display:none;">
                            <a href="/admin.php?m=user&a=raiders_column">
                                <i class="menu-icon fa fa-caret-right"></i>
                                攻略分类                            </a>
                            <b class="arrow"></b>
                        </li>                    <!--
                    
                                        -->


                </ul>
            </li><li class=""><!--open代表打开状态-->
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text">
                        充值提现                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                                        <li class="">
                            <a href="/admin.php?m=user&a=tixian_yes">
                                <i class="menu-icon fa fa-caret-right"></i>
                                已处理                            </a>
                            <b class="arrow"></b>
                        </li>
						<li class="">
                            <a href="/admin.php?m=user&a=tixian_no">
                                <i class="menu-icon fa fa-caret-right"></i>
                                未处理                            </a>
                            <b class="arrow"></b>
                        </li>
						<li class="">
                            <a href="/admin.php?m=user&a=recharge">
                                <i class="menu-icon fa fa-caret-right"></i>
                                充值记录                            </a>
                            <b class="arrow"></b>
                        </li> 
						<!--
                    
                                        -->


                </ul>
            </li>
    </ul>
    <!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <!--主题-->
                <div class="page-header">
                    <h1>
                        您当前操作
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            修改游戏设置
                        </small>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        <i class="green icon-home bigger-110"></i>
                                        基本设置
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#profile">
                                        <i class="green icon-home bigger-110"></i>
                                        游戏设置
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#pet">
                                        <i class="green icon-home bigger-110"></i>
                                        宠物设置
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#diamond">
                                        <i class="green icon-home bigger-110"></i>
                                        充值设置
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#dropdown">
                                        <i class="green icon-home bigger-110"></i>
                                        农贸市场设置
                                    </a>
                                </li>
                            </ul>
 
                            <div class="tab-content">
							<?php if(is_array($info)): foreach($info as $key=>$v): ?><div id="home" class="tab-pane active">
                                    <form class="form-horizontal" name="game_config" id="game_config" method="post" action="/admin.php?m=user&a=game_config&act=1">
                                        <input type="hidden" name="id" value="1" />
                                        <input type="hidden" name="type" value="basis" />
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 种地消费金额：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_till_price" id="config_till_price" value="<?php echo ($v["config_till_price"]); ?>" placeholder="输入种地消费金额" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 铲地消费金额：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_eradicate_price" id="config_eradicate_price" value="<?php echo ($v["config_eradicate_price"]); ?>" placeholder="输入铲地消费金额" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 播种使用种子数量：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_seed_count" id="config_seed_count" value="<?php echo ($v["config_seed_count"]); ?>" placeholder="输入种子数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-2 control-label" for="form-field-1"> 偷取果实数量：  </label>
                                                                                    <div class="col-sm-2">
                                                                                        <input type="text" name="config_steal_count" id="config_steal_count" value="<?php echo ($v["config_steal_count"]); ?>" placeholder="例:0.5" class="input-small" />(百分比)
                                                                                    </div>
                                                                                </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户签到奖励钻石：  </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="config_sign_in" name="config_sign_in" placeholder="输入参数信息" style="margin: 0px -0.015625px 0px 0px; height: 62px; width: 416px;"><?php echo ($v["config_sign_in"]); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 推广奖励钻石：  </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="config_register_reward" name="config_register_reward" placeholder="输入参数信息" style="margin: 0px -0.015625px 0px 0px; height: 62px; width: 416px;"><?php echo ($v["config_register_reward"]); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1">   </label>
                                            <div class="col-sm-10">
                                    所有花费比率，基数为100乘以比率，可写小数，如填写1则为100：
<input type="text" name="up_zs_cost"  value="<?php echo ($v["up_zs_cost"]); ?>" placeholder="" class="input-small"><br>
花费所有果实倍率比例<input type="text" name="cost_bili"  value="<?php echo ($v["cost_bili"]); ?>" placeholder="" class="input-small">                                
购买种子花费<input type="text" name="zongzhi_cost"  value="<?php echo ($v["zongzhi_cost"]); ?>" placeholder="" class="input-small">                                




			</div>
                                        </div>											
                                        <!--<div class="form-group">
                                            <label class="col-sm-2 control-label " for="form-field-1"> 背景音乐：  </label>
                                            <div class="col-sm-2">
                                                <div id="uploader" class="wu-example">
                                                    
                                                    <div class="btns">
                                                        <div id="picker">选择文件</div>
                                                        <input type="hidden" value="/qyadmin.php/land/upimage" id='webuploader_server'/>
                                                        <input type="hidden" value="2017-07-01/5956862381b95.mp3" id="uploader_file" name="uploader_file"/>
                                                    </div>
                                                      <div id="thelist" class="uploader-list" style="position:absolute; top:-1px; left:122px;width: 330px;">
                                                    <div id="WU_FILE_0" class="item">
                                                    <h4 class="info">2017-07-01/5956862381b95.mp3</h4>
                                                    </div>
                                                </div>
                                                   
                                                    
                                                </div>
                                            </div>
<!--                                            <label class="col-sm-2 control-label" for="form-field-1">   </label>
                                            <div class="col-sm-4">
                                                <div id="thelist" class="uploader-list">
                                                    <div id="WU_FILE_0" class="item">
                                                    <h4 class="info">2017-07-01/5956862381b95.mp3</h4>
                                                    </div>
                                                </div>
                                            </div>  

                                        </div>-->
                                        
                                        
                                        
                                        <div style='text-align: center;'>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                保存
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" onclick="history.go(-1);">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                返回
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div id="profile" class="tab-pane">
                                    <form class="form-horizontal" name="game_config" id="game_config" method="post" action="/admin.php?m=user&a=game_config&act=2">
                                        <input type="hidden" name="id" value="1" />
                                        <input type="hidden" name="type" value="game" />
                                        <div class="alert alert-info">
                                            <strong>注意:</strong>
                                            虫害、干旱、杂草，只在发芽期以后会有几率发生一次(下次发生在该地块重新播种以后),各种灾害产生时间为种子发芽后+产生时间
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 虫害产生时间：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_pest_time" id="config_pest_time" value="<?php echo ($v["config_pest_time"]); ?>" placeholder="例:0.5" class="input-small" />(小时)
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 虫害产生几率：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_pest_odds" id="config_pest_odds" value="<?php echo ($v["config_pest_odds"]); ?>" placeholder="例:10" class="input-small" />(百分比)
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 虫害减少作物：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_pest_reduce" id="config_pest_reduce" value="<?php echo ($v["config_pest_reduce"]); ?>" placeholder="例:10" class="input-small" />(个数)
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 干旱产生时间：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_drought_time" id="config_drought_time" value="<?php echo ($v["config_drought_time"]); ?>" placeholder="例:0.5" class="input-small" />(小时)
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 干旱产生几率：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_drought_odds" id="config_drought_odds" value="<?php echo ($v["config_drought_odds"]); ?>" placeholder="例:10" class="input-small" />(百分比)

                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 干旱减少作物数量：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_drought_reduce" id="config_drought_reduce" value="<?php echo ($v["config_drought_reduce"]); ?>" placeholder="例:10" class="input-small" />(个数)
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 杂草产生时间：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_weed_time" id="config_weed_time" value="<?php echo ($v["config_weed_time"]); ?>" placeholder="例:0.5" class="input-small" />(小时)
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 杂草产生几率：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_weed_odds" id="config_weed_odds" value="<?php echo ($v["config_weed_odds"]); ?>" placeholder="例:10" class="input-small" />(百分比)
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 杂草减少作物数量：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_weed_reduce" id="config_weed_reduce" value="<?php echo ($v["config_weed_reduce"]); ?>" placeholder="例:10" class="input-small" />(个数)
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 丰收女神持续时间：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_weed_time2" id="config_weed_time2" value="<?php echo ($v["config_weed_time2"]); ?>" placeholder="例:0.5" class="input-small" />(小时)
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 雨露女神持续时间：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_weed_odds2" id="config_weed_odds2" value="<?php echo ($v["config_weed_odds2"]); ?>" placeholder="例:10" class="input-small" />(小时)
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 弑草女神持续时间：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_weed_reduce2" id="config_weed_reduce2" value="<?php echo ($v["config_weed_reduce2"]); ?>" placeholder="例:10" class="input-small" />(小时)
                                            </div>
											
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 屠虫女神持续时间：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_weed_time3" id="config_weed_time3" value="<?php echo ($v["config_weed_time3"]); ?>" placeholder="例:0.5" class="input-small" />(小时)
                                            </div>
                                        </div>											
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 铜锄头铲地获得种子数：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_copperhoe_seed" id="config_copperhoe_seed" value="<?php echo ($v["config_copperhoe_seed"]); ?>" placeholder="输入数量区间" class="input-small"  />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 银锄头铲地获得种子数：  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="config_silverhoe_seed" id="config_silverhoe_seed" value="<?php echo ($v["config_silverhoe_seed"]); ?>" placeholder="输入数量区间" class="input-small"  />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 丰收神像增加收益：  </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="config_bumper_count" id="config_bumper_count" value="<?php echo ($v["config_bumper_count"]); ?>" placeholder="输入数量区间" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 果实重生比例：  </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="config_reborn_odds" id="config_reborn_odds" value="<?php echo ($v["config_reborn_odds"]); ?>" placeholder="例：10" class="col-xs-10 col-sm-4" />（百分比）
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 果实重生手续费：  </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="config_reborn_cost" id="config_reborn_cost" value="<?php echo ($v["config_reborn_cost"]); ?>" placeholder="例：10" class="col-xs-10 col-sm-4" />（百分比）
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 果实赠送手续费：  </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="config_give_cost" id="config_give_cost" value="<?php echo ($v["config_give_cost"]); ?>" placeholder="例：10" class="col-xs-10 col-sm-4" />（百分比）
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 宝石获得几率(收割 清理)：  </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="config_gem_probability" id="config_gem_probability" value="<?php echo ($v["config_gem_probability"]); ?>" placeholder="例：10" class="col-xs-10 col-sm-4" />（百分比）
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 宝石获得数量(收割 清理)：  </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="config_gem_num" id="config_gem_num" value="<?php echo ($v["config_gem_num"]); ?>" placeholder="输入数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 免短信赠送果实数：  </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="config_present_max" id="config_present_max" value="<?php echo ($v["config_present_max"]); ?>" placeholder="例：500" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 金宝箱开出物品数量：  </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="config_copper_goldbox" name="config_copper_goldbox" placeholder="输入参数信息" style="margin: 0px -0.015625px 0px 0px; height: 62px; width: 416px;"><?php echo ($v["config_copper_goldbox"]); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 银宝箱物品库：  </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="config_copper_silverbox" name="config_copper_silverbox" placeholder="输入参数信息" style="margin: 0px -0.015625px 0px 0px; height: 62px; width: 416px;"><?php echo ($v["config_copper_silverbox"]); ?></textarea>
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 铜宝箱物品库：  </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="config_copper_box" name="config_copper_box" placeholder="输入参数信息" style="margin: 0px -0.015625px 0px 0px; height: 62px; width: 416px;"><?php echo ($v["config_copper_box"]); ?></textarea>
                                            </div>
                                        </div>

                                        <div style='text-align: center;'>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                保存
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" onclick="history.go(-1);">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                返回
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div id="pet" class="tab-pane">
                                    <form class="form-horizontal" name="game_config" id="game_config" method="post" action="/admin.php?m=user&a=game_config&act=3">
                                        <input type="hidden" name="id" value="1" />
                                        <input type="hidden" name="type" value="pet" />
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 宠物训练消耗体力：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_pet_drill" id="config_pet_drill" value="<?php echo ($v["config_pet_drill"]); ?>" placeholder="输入消耗体力数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 每次训练各项属性增长区间：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_pet_attribute_range" id="config_pet_attribute_range" value="<?php echo ($v["config_pet_attribute_range"]); ?>" placeholder="输入增长区间" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 训练增加经验值：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_pet_drill_experience" id="config_pet_drill_experience" value="<?php echo ($v["config_pet_drill_experience"]); ?>" placeholder="输入经验值数" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 每小时宠物消耗体力：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_pet_hour" id="config_pet_hour" value="<?php echo ($v["config_pet_hour"]); ?>" placeholder="输入消耗体力数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 宠物训练成功几率：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_pet_drill_odds" id="config_pet_drill_odds" value="<?php echo ($v["config_present_max"]); ?>" placeholder="例：80" class="col-xs-10 col-sm-4" />（百分比）
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 普通狗粮增加经验：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_dog_food_exp" id="config_dog_food_exp" value="<?php echo ($v["config_dog_food_exp"]); ?>" placeholder="例:30" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 普通狗粮增加体力：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_dog_food_life" id="config_dog_food_life" value="<?php echo ($v["config_dog_food_life"]); ?>" placeholder="例:10" class="input-small" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 高级狗粮增加经验：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_dog_high_food_exp" id="config_dog_high_food_exp" value="<?php echo ($v["config_dog_high_food_exp"]); ?>" placeholder="例:50" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 高级狗粮增加体力：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_dog_high_food_life" id="config_dog_high_food_life" value="<?php echo ($v["config_dog_high_food_life"]); ?>" placeholder="例:10" class="input-small" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 自动收获有效时间（小时）：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_auto_harvest_time" id="config_auto_harvest_time" value="<?php echo ($v["config_auto_harvest_time"]); ?>" placeholder="例:1" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 自动播种有效时间（小时）：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_auto_seed_time" id="config_auto_seed_time" value="<?php echo ($v["config_auto_seed_time"]); ?>" placeholder="例:1" class="input-small" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 幸运值激活概率：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_luck_active_pro" id="config_luck_active_pro" value="<?php echo ($v["config_luck_active_pro"]); ?>" placeholder="例:10" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 幸运值增加作物百分比：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_luck_add_pro" id="config_luck_add_pro" value="<?php echo ($v["config_luck_add_pro"]); ?>" placeholder="例:10" class="input-small" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 普通狗粮增加玫瑰之心经验：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_dog_food_rose_exp" id="config_dog_food_rose_exp" value="<?php echo ($v["config_dog_food_rose_exp"]); ?>" placeholder="例:50" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 高级狗粮增加玫瑰之心经验：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_dog_high_food_rose_exp" id="config_dog_high_food_rose_exp" value="<?php echo ($v["config_dog_high_food_rose_exp"]); ?>" placeholder="例:10" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 训练增加玫瑰之心经验：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_pet_drill_rose_exp" id="config_pet_drill_rose_exp" value="<?php echo ($v["config_pet_drill_rose_exp"]); ?>" placeholder="例:10" class="input-small" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 特殊物品所需经验：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_special_exp" id="config_special_exp" value="<?php echo ($v["config_special_exp"]); ?>" placeholder="例:1000" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 属性类狗粮增加属性值：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_pet_food_attribute" id="config_pet_food_attribute" value="<?php echo ($v["config_pet_food_attribute"]); ?>" placeholder="例:10" class="input-small" />
                                            </div>
                                        </div>
                                        <div style='text-align: center;'>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                保存
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" onclick="history.go(-1);">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                返回
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div id="diamond" class="tab-pane">
                                    <form class="form-horizontal" name="game_config" id="game_config" method="post" action="/admin.php?m=user&a=game_config&act=4">
                                        <input type="hidden" name="id" value="<?php echo ($v["config_present_max"]); ?>" />
                                        <input type="hidden" name="type" value="diamond" />
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 2000钻石消费：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_diamond_first" id="config_diamond_first" value="<?php echo ($v["config_diamond_first"]); ?>" placeholder="输入消费金币数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 20000钻石消费：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_diamond_second" id="config_diamond_second" value="<?php echo ($v["config_diamond_second"]); ?>" placeholder="输入消费金币数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 200000钻石消费：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_diamond_third" id="config_diamond_third" value="<?php echo ($v["config_diamond_third"]); ?>" placeholder="输入消费金币数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 额外赠送钻石：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_diamond_give" id="config_diamond_third" value="25" placeholder="请输入额外赠送钻石数量" class="col-xs-10 col-sm-4" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 额外赠送钻石：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_diamond_give" id="config_diamond_give" value="<?php echo ($v["config_diamond_give"]); ?>" placeholder="例:30" class="input-small" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="form-field-1"> 是否启用：  </label>
                                            <div class="col-sm-1" style="margin-top:0.2rem">
                                                <input name="config_display" id="display" value=1 class="ace ace-switch ace-switch-4 btn-flat" checked type="checkbox" />
                                                <span class="lbl">&nbsp;&nbsp;</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> 每天可充值次数：  </label>
                                            <div class="col-sm-1">
                                                <input type="text" name="config_diamond_recharge" id="config_diamond_recharge" value="<?php echo ($v["config_diamond_recharge"]); ?>" placeholder="例:1" class="input-small" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 一级返佣比例：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_diamond_one" id="config_diamond_one" value="<?php echo ($v["config_diamond_one"]); ?>" placeholder="请输入一级返佣比例" class="col-xs-10 col-sm-4 input-small" /><span style="margin-left:5px;">%</span>
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 二级返佣比例：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_diamond_two" id="config_diamond_two" value="<?php echo ($v["config_diamond_two"]); ?>" placeholder="请输入二级返佣比例" class="col-xs-10 col-sm-4 input-small" /><span style="margin-left:5px;">%</span>
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 三级返佣比例：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_diamond_three" id="config_diamond_three" value="<?php echo ($v["config_diamond_three"]); ?>" placeholder="请输入三级返佣比例" class="col-xs-10 col-sm-4 input-small" /><span style="margin-left:5px;">%</span>
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 一元钱对应金币数：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_rmb_gold" id="config_rmb_gold" value="<?php echo ($v["config_rmb_gold"]); ?>" placeholder="金币数" class="col-xs-10 col-sm-4 input-small" onkeyup= "if(! /^[0-9]+$/.test(this.value)){alert('请输入整数');this.value='1';}"/><span style="margin-left:5px;">请输入整数</span>
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>									
                                        <div style='text-align: center;'>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                保存
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" onclick="history.go(-1);">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                返回
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div id="dropdown" class="tab-pane">
                                    <form class="form-horizontal" name="game_config" id="game_config" method="post" action="/admin.php?m=user&a=game_config&act=5">
                                        <input type="hidden" name="id" value="1" />
                                        <input type="hidden" name="type" value="dropdown" />
                                        <div class="alert alert-info">
                                            <strong>注意:</strong>
                                            收盘时间不要晚于23:00 ,开盘价格中名称不能修改，修改后保存无效
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 开盘时间：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_open_time" id="config_open_time" value="<?php echo ($v["config_open_time"]); ?>" placeholder="输入涨停比率" class="col-xs-10 col-sm-4 input-small" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 收盘时间：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_close_time" id="config_close_time" value="<?php echo ($v["config_close_time"]); ?>" placeholder="输入涨停比率" class="col-xs-10 col-sm-4 input-small" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 涨停比率：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_limit_up" id="config_limit_up" value="<?php echo ($v["config_limit_up"]); ?>" placeholder="输入涨停比率" class="col-xs-10 col-sm-4 input-small" /><span style="margin-left:5px;">%</span>
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 跌停比率：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_limit_down" id="config_limit_down" value="<?php echo ($v["config_limit_down"]); ?>" placeholder="输入涨跌比率" class="col-xs-10 col-sm-4 input-small" /><span style="margin-left:5px;">%</span>
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 交易手续费：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_trade_cost" id="config_trade_cost" value="<?php echo ($v["config_trade_cost"]); ?>" placeholder="输入涨跌比率" class="col-xs-10 col-sm-4 input-small" /><span style="margin-left:5px;">%</span>
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 核桃开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price2" id="open_price2" value="<?php echo ($v["open_price2"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 石榴开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price8" id="open_price8" value="<?php echo ($v["open_price8"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 红枣开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price9" id="open_price9" value="<?php echo ($v["open_price9"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 葡萄开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price10" id="open_price10" value="<?php echo ($v["open_price10"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 哈密瓜开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price14" id="open_price14" value="<?php echo ($v["open_price14"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 香梨开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price15" id="open_price15" value="<?php echo ($v["open_price15"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 沙漠果果开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price16" id="open_price16" value="<?php echo ($v["open_price16"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 人参果开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price17" id="open_price17" value="<?php echo ($v["open_price17"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 薰衣草开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price18" id="open_price18" value="<?php echo ($v["open_price18"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 沙漠人参开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price19" id="open_price19" value="<?php echo ($v["open_price19"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 巴旦木开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price20" id="open_price20" value="<?php echo ($v["open_price20"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 和田玉开盘价格：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="open_price21" id="open_price21" value="<?php echo ($v["open_price21"]); ?>" placeholder="" class="col-xs-10 col-sm-4 input-small" />
                                            </div>
                                        </div>
										
										
										
										
										
										
										
										
										
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 种子默认开盘价：  </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="config_seed_open_price" id="config_seed_open_price" value="<?php echo ($v["config_seed_open_price"]); ?>" placeholder="输入涨跌比率" class="col-xs-10 col-sm-4 input-small" />
                                                <span class="middle" id="resone"></span>
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <div class="col-sm-10" style="color:red;">
                                                                                            </div>
                                        </div>										
                                        <div style='text-align: center;'>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                保存
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" onclick="history.go(-1);">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                返回
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div><?php endforeach; endif; ?>
                        </div>


                    </div>
                </div>

                						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="hidden">

									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
										<ul class="nav nav-list">
                                        
        

										</ul><!-- /.nav-list -->
									</div><!-- .sidebar -->
								</div>

							</div><!-- /.col -->
						</div><!-- /.row -->

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"></span>
							后台管理系统 &copy; 2015-2016
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>
            

		<!-- basic scripts -->


		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/Public/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="/Public/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="/Public/assets/js/maxlength.js"></script>
		<script src="/Public/assets/js/ace/ace.js"></script>
		<script src="/Public/assets/js/ace/ace.sidebar.js"></script>
		<script src="/Public/assets/js/ace/ace.submenu-hover.js"></script>

                <!-- uploadjs-->
<!--                <input type="hidden" id="vbt_ajax_upload_url" value="/qyadmin.php/Upload/index">
                <script src="/Public/assets/js/jquery1.8.min.js"></script>
                <script src="/Public/ajax_upload/ajax.upload.js" /></script>-->
                <!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			   $('#sidebar2').insertBefore('.page-content');
			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			   
			   
			   $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
				 if(event_name == 'sidebar_fixed') {
					 if( $('#sidebar').hasClass('sidebar-fixed') ) {
						$('#sidebar2').addClass('sidebar-fixed');
						$('#navbar').addClass('h-navbar');
					 }
					 else {
						$('#sidebar2').removeClass('sidebar-fixed')
						$('#navbar').removeClass('h-navbar');
					 }
				 }
			   }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);
			})
		</script>
		<script src="/Public/assets/js/jquery.form.js"></script>


</div><!-- /.main-container -->

<script >
    jQuery(function () {
    webuploader_server = $("#webuploader_server").val(),
    $list = $('#thelist'),
            $btn = $('#ctlBtn'),
            state = 'pending',
            uploader;
    uploader = WebUploader.create({
        // 不压缩image
        resize: false,
        // swf文件路径
        swf: 'uploader.swf',
        // 文件接收服务端。
        server:webuploader_server,
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#picker',
        chunked: true,
        chunkSize: 2 * 1024 * 1024,
        auto: true,
        accept: {
            title: 'Images',
            extensions: 'mp3',
            mimeTypes: 'video/mp3'
        }
    });

    uploader.on( 'fileQueued', function( file ) {
    $list.empty();
    $list.append( '<div id="' + file.id + '" class="item">' +
        '<h4 class="info">' + file.name + '</h4>' +
    '</div>' );
    });
    uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
        $percent = $li.find('.progress .progress-bar');

    // 避免重复创建
    if ( !$percent.length ) {
        $percent = $('<div class="progress progress-striped active">' +
          '<div class="progress-bar" role="progressbar" style="width: 0%">' +
          '</div>' +
        '</div>').appendTo( $li ).find('.progress-bar');
    }

    $li.find('p.state').text('上传中');

    $percent.css( 'width', percentage * 100 + '%' );
    });

    uploader.on( 'uploadSuccess', function( file ) {
    $( '#'+file.id ).find('p.state').text('已上传');
    });

    uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传出错');
    });

    uploader.on('uploadComplete', function (file) {
        $('#' + file.id).find('.progress').remove();
    });

    uploader.on('uploadAccept', function (file, response) {
        console.log($('#' + file.id)());
        console.log(JSON.stringify(response));
        if (response.code == 1) {
            // 通过return false来告诉组件，此文件上传有错。
            return false;
        } else {
            $("#uploader_file").val(response.filePath + response.saveName);
        }
    });
});
        
</script>
</body>
</html>