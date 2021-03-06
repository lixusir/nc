<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>用户登录</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta property="qc:admins" content="03212514451660216477244363757164506000714516747716747716" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/Public/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="/Public/assets/css/font-awesome.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="/Public/assets/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="/Public/assets/css/ace.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="/Public/assets/css/ace-part2.css" />
        <![endif]-->
        <link rel="stylesheet" href="/Public/assets/css/ace-rtl.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="/Public/assets/css/ace-ie.css" />
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="/Public/assets/js/html5shiv.js"></script>
        <script src="/Public/assets/js/respond.js"></script>
        <![endif]-->
        <script src="/Public/assets/js/jquery.min.js"></script>
        <script src="/Public/assets/js/jquery.form.js"></script>
        <script src="/Public/layer/layer.js"></script>
        <script>
        //登入
            $(function () {
                $('#runlogin').ajaxForm({
                    beforeSubmit: logcheckForm, // 此方法主要是提交前执行的方法，根据需要设置
                    success: logcomplete, // 这是提交后的方法
                    dataType: 'json'
                });

                function logcheckForm() {
                    $('#loginresult').attr("class", "high");

                    if ('' == $.trim($('#admin_username').val())) {
                        $('#loginresult').html('登入用户名不能为空').show();
                        $('#admin_username').focus();
                        return false;
                    }

                    if ('' == $.trim($('#admin_pwd').val())) {
                        $('#loginresult').html('登入密码不能为空').show();
                        $('#admin_pwd').focus();
                        return false;
                    }
                    if ('' == $.trim($('#pic_code').val())) {
                        $('#loginresult').html('验证码不能为空').show();
                        $('#pic_code').focus();
                        return false;
                    }
                }
                function logcomplete(data) {
                    if (data.status == 1) {
                        window.location.href = "/qyadmin.php/Index/index.html";
                        return false;
                    } else {
                        $('#loginresult').html(data.info).show();
                        return false;
                    }
                }

            });

        </script>
        <style>
            .high{ color:#F00;}
            .loginnone{display:none;}
        </style>
    </head>

    <body class="login-layout light-login">

        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center"><h1></h1></div>
                            <div class="space-6"></div>
                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                后台管理系统
                                            </h4>

                                            <div class="space-6"></div>
                                            <p id="loginresult" class="loginnone"></p>
                                            <form name="runlogin"  method="post" action="<?php echo U('Login/login');?>">
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" name="username" id="username" placeholder="用户名" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="输入密码" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" name="code" id="code" placeholder="输入验证码" />
															<img id="verifyImg" onclick="fleshVerify()" src="<?php echo U('Login/verify','','');?>" width="80" height="32" class="passcode" />
                                                        </span>
                                                    </label>
                                                    <div class="space"></div>

                                                    <div class="clearfix">
<!--                                                        <label class="inline">
                                                            <input type="checkbox" class="ace" />
                                                            <span class="lbl"> 记住信息</span>
                                                        </label>-->

                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">登录</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>

                                        </div><!-- /.widget-main -->

                                        
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->
                            </div><!-- /.position-relative -->

                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/Public/assets/js/jquery.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->
        <script type="text/javascript">
            function changing(){
                document.getElementById('checkpic').src="/qyadmin.php/Login/getcode.html";
            } 
        </script>
     
        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='/Public/assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
        </script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function ($) {
                $(document).on('click', '.toolbar a[data-target]', function (e) {
                    e.preventDefault();
                    var target = $(this).data('target');
                    $('.widget-box.visible').removeClass('visible');//hide others
                    $(target).addClass('visible');//show target
                });
            });


        </script>

    </body>
</html>