<?php if (!defined('THINK_PATH')) exit();?>﻿<html><head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/Public/home/jiangjin/css/theme.min.css" rel="stylesheet">
    <link href="/Public/home/jiangjin/css/simplebootadmin.css" rel="stylesheet">
    <link href="/Public/home/jiangjin/css/default.css" rel="stylesheet">
    <link href="/Public/home/jiangjin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/Public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script type="text/javascript">
	//全局变量
	var GV = {
	    ROOT: "/",
	    WEB_ROOT: "/",
	    JS_ROOT: "Public/js/",
	    APP:'Portal'/*当前应用名*/
	};
	</script>
    <script src="/Public/home/jiangjin/js/jquery.js"></script>
    <script src="/Public/home/jiangjin/js/wind.js"></script>
    <script src="/Public/home/jiangjin/js/bootstrap.min.js"></script>
    <script>
    	$(function(){
    		$("[data-toggle='tooltip']").tooltip();
    	});
    </script>
<script type="text/javascript" src="/Public/home/jiangjin/jquery.validate.js?v="></script><script type="text/javascript" src="/Public/js/ajaxForm.js?v="></script><script type="text/javascript" src="/Public/js/artDialog/artDialog.js?v="></script><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style></head>
<body>

<div class="" style="display: none; position: absolute;">
<div class="aui_outer">

<table class="aui_border">
<tbody>
<tr>
<td class="aui_nw"></td>
<td class="aui_n"></td>
<td class="aui_ne"></td></tr>
<tr><td class="aui_w"></td>
<td class="aui_c">
<div class="aui_inner">
<table class="aui_dialog">
<tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move;"></div><a class="aui_close" href="javascript:/*artDialog*/;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background: none;"></div></td><td class="aui_main" style="width: auto; height: auto;"><div class="aui_content" style="padding: 20px 25px;"></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div>
    <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class="wrap js-check-wrap">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#B" data-toggle="tab">奖金设置</a></li>
			<li class=""><a href="/admin.php" target=_blank>返回首页</a></li>
        </ul>
        <form class="form-horizontal js-ajax-forms" action="/admin.php?m=user&a=jiangjin&act=1" method="post" novalidate="novalidate">
            <fieldset>
                <div class="tabbable">
                    <div class="tab-content">
                        <div class="tab-pane active" id="B">

                            <fieldset>
								<div class="control-group">
                                    <label class="control-label">多少个GEC提现1元人民币</label>
                                    <div class="controls">
                                        <input type="text" name="tx_num" value="<?php echo ($v["tx_num"]); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">线下交易和线上交易（0为线下，1为线上）</label>
                                    <div class="controls">
                                        <input type="text" name="jymod" value="<?php echo ($v["jymod"]); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">交易打款时间</label>
                                    <div class="controls">
                                        <input type="text" name="pay_time" value="<?php echo ($v["pay_time"]); ?>"> 小时
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">交易收款时间</label>
                                    <div class="controls">
                                        <input type="text" name="income_time" value="<?php echo ($v["income_time"]); ?>"> 小时
                                    </div>
                                </div>
                              
                                <hr>
                                <div class="control-group">
                                    <label class="control-label">交易出售金额</label>
                                    <div class="controls" style="height:50px;">
                                        <input type="text" name="min" value="<?php echo ($v["min"]); ?>">--
                                        <input type="text" name="max" value="<?php echo ($v["max"]); ?>">元 必须
                                        <input type="text" name="beishu" value="<?php echo ($v["beishu"]); ?>">元的倍数
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">产矿最大倍数</label>
                                    <div class="controls">
                                        <input type="text" name="max_bei" value="<?php echo ($v["max_bei"]); ?>">倍(开矿的最高产值 )
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label">玩家投资多少天回本</label>
                                    <div class="controls">
                                        <input type="text" name="huiben" value="<?php echo ($v["huiben"]); ?>">(天数 )
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">产矿利息</label>
                                    <div class="controls">
                                        <input type="text" name="interest" value="<?php echo ($v["interest"]); ?>"> % 百分数拆分
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">每个号每天最多提现单数</label>
                                    <div class="controls">
                                        <input type="text" name="max_tx_text_day" value="<?php echo ($v["max_tx_text_day"]); ?>">单
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">每天最多注册会员数</label>
                                    <div class="controls">
                                        <input type="text" name="max_register_day" value="<?php echo ($v["max_tx_text_day"]); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">注册费用</label>
                                    <div class="controls">
                                        <input type="text" name="reg_money" value="<?php echo ($v["reg_money"]); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">账户默认费用</label>
                                    <div class="controls">
                                        <input type="text" name="cs_money" value="<?php echo ($v["cs_money"]); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="control-group">
                                    <label class="control-label">推荐收益</label>
                                        <div class="controls">
                                        每推荐<input type="text" name="tjrs" value="<?php echo ($v["tjrs"]); ?>">人--
                                        收益<input type="text" name="tjjl" value="<?php echo ($v["tjjl"]); ?>">元 必须
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">推荐一人固定利息增加</label>
                                    <div class="controls">
                                        <input type="text" name="manger_bonus" value="<?php echo ($v["manger_bonus"]); ?>">%
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">站内信费用</label>
                                    <div class="controls">
                                        <input type="text" name="zlx" value="<?php echo ($v["zlx"]); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">开矿固定利息增加</label>
                                    <div class="controls">
                                        01:<input type="text" name="tree_lx1" value="<?php echo ($v["tree_lx1"]); ?>" style="width: 50px">%
                                        02:<input type="text" name="tree_lx2" value="<?php echo ($v["tree_lx2"]); ?>" style="width: 50px">%
                                        03:<input type="text" name="tree_lx3" value="<?php echo ($v["tree_lx3"]); ?>" style="width: 50px">%
                                        04:<input type="text" name="tree_lx4" value="<?php echo ($v["tree_lx4"]); ?>" style="width: 50px">%
                                        05:<input type="text" name="tree_lx5" value="<?php echo ($v["tree_lx5"]); ?>" style="width: 50px">%
                                        06:<input type="text" name="tree_lx6" value="<?php echo ($v["tree_lx6"]); ?>" style="width: 50px">%
                                        07:<input type="text" name="tree_lx7" value="<?php echo ($v["tree_lx7"]); ?>" style="width: 50px">%
                                        08:<input type="text" name="tree_lx8" value="<?php echo ($v["tree_lx8"]); ?>" style="width: 50px">%
                                    </div>
                                    <div class="controls">
                                        
                                        1层:<input type="text" name="tree_cjlx1" value="6" style="width: 50px">%
                                        钻石：<input type="text" name="tree_jljb1" value="100" style="width: 50px">元
                                        2层:<input type="text" name="tree_cjlx2" value="5" style="width: 50px">%
                                         钻石：<input type="text" name="tree_jljb2" value="200" style="width: 50px">元
                                    </div>
                                    
                                    
                                    
                                  
                                </div>
                                <div class="control-group">
                                    <label class="control-label">开矿费用</label>
                                    <div class="controls">
                                        01:<input type="text" name="kk1" value="<?php echo ($v["kk1"]); ?>" style="width: 50px">元
                                        02:<input type="text" name="kk2" value="<?php echo ($v["kk2"]); ?>" style="width: 50px">元
                                        03:<input type="text" name="kk3" value="<?php echo ($v["kk3"]); ?>" style="width: 50px">元
                                        04:<input type="text" name="kk4" value="<?php echo ($v["kk4"]); ?>" style="width: 50px">元
                                        05:<input type="text" name="kk5" value="<?php echo ($v["kk5"]); ?>" style="width: 50px">元
                                    </div>
                                    <div class="controls">
                                        06:<input type="text" name="kk6" value="<?php echo ($v["kk6"]); ?>" style="width: 50px">元
                                        07:<input type="text" name="kk7" value="<?php echo ($v["kk7"]); ?>" style="width: 50px">元
                                        08:<input type="text" name="kk8" value="<?php echo ($v["kk8"]); ?>" style="width: 50px">元
                               
                                    </div>
                                
                                </div>
                                <div class="control-group">
                                    <label class="control-label">每日分红比例</label>
                                    <div class="controls">
                                        <input type="text" name="fhbl" value="<?php echo ($v["fhbl"]); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">每日最大出售比例</label>
                                    <div class="controls">
                                        <input type="text" name="csbl" value="<?php echo ($v["csbl"]); ?>">%
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">矿镐减免手续费比例</label>
                                    <div class="controls">
                                        <input type="text" name="jmsxf" value="<?php echo ($v["jmsxf"]); ?>">%
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">狗狗防盗比例</label>
                                    <div class="controls">
                                        <input type="text" name="ggfdbl" value="<?php echo ($v["ggfdbl"]); ?>">%
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">定向出售手续费</label>
                                    <div class="controls">
                                        <input type="text" name="kdfy" value="<?php echo ($v["kdfy"]); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">系统出售手续费</label>
                                    <div class="controls">
                                        <input type="text" name="zbbl" value="30">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">会员级别</label>
                                    <div class="controls">
                                        <input style="width: 350px;" type="text" name="user_level" value=""> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">一键收矿每月价格</label>
                                    <div class="controls">
                                        <input type="text" name="yjsk" value="10">钻石
                                    </div>
                                </div>

                            </fieldset>

                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary  js-ajax-submit">保存</button>
                </div>
            </fieldset>
        </form>
    </div><?php endforeach; endif; ?>

    <script type="text/javascript" src="/Public/home/jiangjin/js/common.js"></script>
    <script>
        /////---------------------
        $(function() {
            $("#urlmode-select").change(function() {
                if ($(this).val() == 1) {
                    alert("更改后，若发现前台链接不能正常访问，可能是您的服务器不支持PATHINFO，请先修改data/conf/config.php文件的URL_MODEL为0保证网站正常运行,在配置服务器PATHINFO功能后再更新为PATHINFO模式！");
                }

                if ($(this).val() == 2) {
                    alert("更改后，若发现前台链接不能正常访问，可能是您的服务器不支持REWRITE，请先修改data/conf/config.php文件的URL_MODEL为0保证网站正常运行，在开启服务器REWRITE功能后再更新为REWRITE模式！");
                }
            });
            $("#js-site-admin-url-password").change(function() {
                $(this).data("changed", true);
            });
        });
        Wind.use('validate', 'ajaxForm', 'artDialog', function() {
            //javascript
            var form = $('form.js-ajax-forms');
            //ie处理placeholder提交问题
            if ($.browser && $.browser.msie) {
                form.find('[placeholder]').each(function() {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });
            }
            //表单验证开始
            form.validate({
                //是否在获取焦点时验证
                onfocusout: false,
                //是否在敲击键盘时验证
                onkeyup: false,
                //当鼠标掉级时验证
                onclick: false,
                //验证错误
                showErrors: function(errorMap, errorArr) {
                    //errorMap {'name':'错误信息'}
                    //errorArr [{'message':'错误信息',element:({})}]
                    try {
                        $(errorArr[0].element).focus();
                        art.dialog({
                            id: 'error',
                            icon: 'error',
                            lock: true,
                            fixed: true,
                            background: "#CCCCCC",
                            opacity: 0,
                            content: errorArr[0].message,
                            cancelVal: "确定",
                            cancel: function() {
                                $(errorArr[0].element).focus();
                            }
                        });
                    } catch (err) {
                    }
                },
                //验证规则
                rules: {
                    'options[site_name]': {
                        required: 1
                    },
                    'options[site_host]': {
                        required: 1
                    },
                    'options[site_root]': {
                        required: 1
                    }
                },
                //验证未通过提示消息
                messages: {
                    'options[site_name]': {
                        required: "WEBSITE_SITE_NAME_REQUIRED_MESSAGE"
                    },
                    'options[site_host]': {
                        required: "WEBSITE_SITE_HOST_REQUIRED_MESSAGE"
                    }
                },
                //给未通过验证的元素加效果,闪烁等
                highlight: false,
                //是否在获取焦点时验证
                onfocusout : false,
                        //验证通过，提交表单
                        submitHandler: function(forms) {
                            $(forms).ajaxSubmit({
                                url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                                dataType: 'json',
                                beforeSubmit: function(arr, $form, options) {

                                },
                                success: function(data, statusText, xhr, $form) {
                                    if (data.status) {
                                        setCookie("refersh_time", 1);
                                        var admin_url_changed = $("#js-site-admin-url-password").data("changed");
                                        var message = admin_url_changed ? data.info + '<br><span style="color:red;">后台地址已更新(请劳记！)</span>' : data.info;

                                        //添加成功
                                        Wind.use("artDialog", function() {
                                            art.dialog({
                                                id: "succeed",
                                                icon: "succeed",
                                                fixed: true,
                                                lock: true,
                                                background: "#CCCCCC",
                                                opacity: 0,
                                                content: message,
                                                button: [{
                                                        name: "确定",
                                                        callback: function() {
                                                            reloadPage(window);
                                                            return true;
                                                        },
                                                        focus: true
                                                    }, {
                                                        name: "关闭",
                                                        callback: function() {
                                                            reloadPage(window);
                                                            return true;
                                                        }
                                                    }]
                                            });
                                        });
                                    } else {
                                        alert(data.info);
                                    }
                                }
                            });
                        }
            });
        });
        ////-------------------------
    </script>



</body></html>