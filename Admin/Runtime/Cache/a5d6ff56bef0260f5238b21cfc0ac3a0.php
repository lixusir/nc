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
                    <a href="/qyadmin.php/Index/index.html" class="navbar-brand">
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
                        window.location.href = "/qyadmin.php/Login/logout.html";
                    });
                });
            });
        </script>

<style>
.clearfloat{
	zoom:1;
}
.clearfloat:after{
	display:block;
	content:'';	
	height:0;
	clear:both;
	visibility:hidden;
}
.tag-list{
	position:relative;
	margin-bottom:0px;
}
.tag-item{
	float:left;
	margin-right:20px;
	margin-bottom:20px;
	padding:10px 15px;
	border:1px solid #EEE;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	-ms-border-radius:3px;
	border-radius:3px;
}
.give-list{
	position:relative;
	margin-bottom:0px;
}
.give-item{
	float:left;
	
	margin-bottom:20px;
	padding:10px 15px;
	border:1px solid #EEE;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	-ms-border-radius:3px;
	border-radius:3px;
}
.tag-list .select{
	border:1px solid #FF6600;
	background:url(/Public/assets/images/check-02.png) no-repeat right bottom;
}
.give-list .select{
	border:1px solid #FF6600;
	background:url(/Public/assets/images/check-02.png) no-repeat right bottom;
}
.reward_show{
	display:none;
}
</style>
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
                            添加攻略
                        </small>
                    </h1>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" name="columnadd" id="columnadd" method="post" action="/admin.php?m=user&a=raiders_listadd&act=1" onsubmit="return checkselect();">

                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章所属类别： </label>
                                <div class="col-sm-10">
                                    <select name="news_columnid" id="news_columnid"  class="col-sm-3 " >
                                        
										<option value="10" selected="selected">免费阅读 </option>                                    </select>
                                </div>
                            </div>
                            <div class="space-4"></div>
							<div class="reward_show">
													
                           						
                            
							
							<div class="space-4"></div>
							</div>
							<!-- <div class="form-group"> -->
                                <!-- <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章所属标签： </label> -->
                                <!-- <div class="col-sm-10"> -->
                                    <!-- <select name="news_label"  class="col-sm-3 " > -->
                                        <!-- -->
                                            <!-- <option value="11" class="bgc">赚钱 </option> -->
                                        <!---->
                                            <!-- <option value="12" class="bgc">新手 </option> -->
                                        <!---->
                                            <!-- <option value="13" class="bgc">稳定 </option> -->
                                        <!---->
                                            <!-- <option value="14" class="bgc">经验 </option> -->
                                        <!-- -->
                                    <!-- </select> -->
                                <!-- </div> -->
                            <!-- </div> -->
							
							<!--<div class="form-group" style="margin-bottom:0px;display:none;">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章所属标签： </label>
                                <div class="col-sm-10">
                                    <dl class="tag-list clearfloat">
										
										<dd class="tag-item" code="11" name="赚钱"><span>赚钱</span></dd><dd class="tag-item" code="12" name="新手"><span>新手</span></dd><dd class="tag-item" code="13" name="稳定"><span>稳定</span></dd><dd class="tag-item" code="14" name="经验"><span>经验</span></dd>									</dl>
                                </div>
                            </div>-->							
                            <div class="space-4"></div>
							<input type="hidden" name="reward" id="reward" value="" />
							<input type="hidden" name="news_label" id="news_label" value="" />
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章标题：  </label>
                                <div class="col-sm-10">
                                    <input type="text" name="news_name" id="news_name"  placeholder="必填：文章标题"  class="col-xs-10 col-sm-6"/>
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle" id="resone"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <!-- <div class="form-group"> -->
                                <!-- <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章标题(EN)：  </label> -->
                                <!-- <div class="col-sm-10"> -->
                                    <!-- <input type="text" name="news_enname" id="news_name"  placeholder="必填：文章标题(EN)"  class="col-xs-10 col-sm-6"/> -->
                                    <!-- <span class="help-inline col-xs-12 col-sm-7"> -->
                                        <!-- <span class="middle" id="resone"></span> -->
                                    <!-- </span> -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否审核： </label>
                                <div class="col-sm-10" style="padding-top:5px;">
                                    <input name="news_open" id="news_open" value="1" class="ace ace-switch ace-switch-4 btn-flat" checked type="checkbox" />
                                    <span class="lbl">&nbsp;&nbsp;默认开启</span>
                                </div>
                            </div>
                            <div class="space-4"></div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章主内容 </label>
                                <div class="col-sm-10">
                                    <textarea  name="kind_text"></textarea>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <!-- <div class="form-group"> -->
                                <!-- <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章主内容(EN) </label> -->
                                <!-- <div class="col-sm-10"> -->
                                    <!-- <textarea  name="kind_text1"></textarea> -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <!-- <div class="space-4"></div> -->

                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        保存
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        重置
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hr hr-24"></div>

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
<!--                <input type="hidden" id="vbt_ajax_upload_url" value="/qyadmin.php/Upload/index.html">
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

<!--下拉样式以及JS-->
<link rel="stylesheet" href="/Public/assets/css/chosen.css" />
<script src="/Public/assets/js/chosen.jquery.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        if (!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect: true});
            $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function () {
                        $('.chosen-select').each(function () {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');

        }
    });
</script>
</body>
</html>
<script>
    $(document).ready(function () {
        $("#pptaddress").hide();
        $("#news_flag_vaj").click(function () {
            $("#pptaddress").toggle(500);
        });
    });

    $(function () {
        $('#address').hide();//默认隐藏
        $('#type2').click(function () {
            $('#address').show();
        });
        $('#type1,#type3,#type4,#type5').click(function () {
            $('#address').hide();
        });
    });

    $(function () {
        $('#columnadd').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm() {
            if ('' == $.trim($('#news_name').val())) {
                $('#resone').attr("class", "middle highmsg");//ID为resone 重新class赋值
                $('#resone').html('栏目标题不能为空').show();//id为resone 赋值html值
                $('#news_name').focus();
                return false;
            }
        }
        function complete(data) {
            if (data.status == 1) {
                layer.alert(data.info, {icon: 6}, function (index) {
                    layer.close(index);
                    window.location.href = data.url;
                });
            } else {
                alert(data.info);
                return false;
            }
        }

    });
	$(function(){
		$(".tag-list .tag-item").click(function(){
			var $this = $(this);
			var tag_len = $(".tag-list .select").length;
			if($this.hasClass('select')){
				$this.removeClass('select');
			}else{
				if(tag_len >= 3)
				{
					alert("只能选择3个标签哦");
					return false;
				}			
				$this.addClass('select');			
			}
				var new_lab = '';
				$(".tag-list .select").each(function(i,v){
					new_lab += $(".tag-list .select").eq(i).attr('code') + ',';					
				})
				$("#news_label").val(new_lab);	
		})
	})
	$(function(){
		$("#news_columnid").change(function(){
			var c_id = $(this).val();
			if(c_id == 8)
			{
				//打赏阅读
				$(".reward_show").show();
			}else{
				//免费阅读
				$(".reward_show").hide();
			}
		})
	})
	$(function(){
		$(".give-list .give-item").click(function(){
			var $this = $(this);
			$this.siblings().removeClass('select');
			$this.addClass('select');
			$("#reward").val($this.attr('code'));
		})
	})
	$(function(){
		$(".btn").click(function(){
			if($(this).attr('type') == 'reset')
			 { 
				$(".reward_show").hide();
			 } 
			
		})
	})
	function checkselect()
	{
		var news_columnid = $("#news_columnid").val();
		var tags = $(".tag-list .select").length;
			
		if(news_columnid == 8)
		{
			//打赏阅读
			var reward_show = $(".give-list .select").length;
			if(reward_show == 0)
			{
				alert("请选择打赏物品");
				return false;
			}
			var reward_num = $(".checkbox input:checked").length;
			if(reward_num == 0)
			{
				alert("请选择打赏数量");
				return false;				
			}
		}

	}
</script>