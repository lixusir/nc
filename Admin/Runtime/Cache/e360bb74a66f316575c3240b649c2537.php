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
                                    <a href="/qyadmin.php/Sys/admin_list_edit/admin_id/2.html">
                                        <i class="ace-icon fa fa-cog"></i>
                                        个人设置
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;"  id="logout">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        注销
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- /section:basics/navbar.user_menu -->
                    </ul>
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
                            会员关系
                        </small>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tree well" style="padding-top: 10px">
                            <span><i class="menu-icon fa fa-group" style="font-size: 18px;margin-left: 22px;"></i>会员关系</span>
                            <ul style="list-style-type:none">
                                <li class="parent_li">
                                    <span title="Collapse this branch" >
                                        <i class="glyphicon glyphicon-minus-sign"></i> 334                                        <input type="hidden" id="6" value="6">
                                    </span>
                                </li>
                            </ul>
                        </div>
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
<script>
        function getSubordinate($this){
            var fh = $($this)
            var children = fh.parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                fh.nextAll('ul').html('');
                fh.attr('title', 'Expand this branch').find(' > i').addClass('glyphicon-plus-sign').removeClass('glyphicon-minus-sign');
            } else {
                var member_id = fh.find('input').first().val();
                $.ajax({
                    type: "POST",
                    url: "/qyadmin.php/Member/member_tree.html",
                    data: {member_id: member_id},
                    dataType: "json",
                    success: function (data) {
                        fh.after(data.html);
                    }
                });
                children.show('fast');
                fh.attr('title', 'Collapse this branch').find(' > i').addClass('glyphicon-minus-sign').removeClass('glyphicon-plus-sign');
            }
        }
</script>
</body>
</html>