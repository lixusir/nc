<?php if (!defined('THINK_PATH')) exit();?><div id="load" style="display:none">
     <img src="picture/jiazai.gif" /> 
</div>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,minimal-ui"/><!-- viewport 后面加上 minimal-ui 在safri 体现效果 -->
    <meta name="apple-mobile-web-app-capable" content="yes" />		<!-- iphone safri 全屏 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />	<!-- iphone safri 状态栏的背景颜色 -->
    <meta name="apple-mobile-web-app-title" content="">		<!-- iphone safri 添加到主屏界面的显示标题 -->
    <meta name="format-detection" content="telphone=no, email=no" />	<!-- 禁止数字识自动别为电话号码 -->
    <meta name="renderer" content="webkit">				<!-- 启用360浏览器的极速模式(webkit) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">		<!-- 是针对一些老的不识别viewport的浏览器，列如黑莓 -->
    <meta name="MobileOptimized" content="320">			<!-- 微软的老式浏览器 -->
    <meta http-equiv="Cache-Control" content="no-siteapp" />	<!-- 禁止百度转码 -->
    <meta name="screen-orientation" content="portrait">	<!-- uc强制竖屏 -->
    <meta name="browsermode" content="application">		<!-- UC应用模式 -->
    <meta name="full-screen" content="yes">				<!-- UC强制全屏 -->
    <meta name="x5-orientation" content="portrait">		<!-- QQ强制竖屏 -->
    <meta name="x5-fullscreen" content="true">			<!-- QQ强制全屏 -->
    <meta name="x5-page-mode" content="app">
    <title>黄金家园</title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/public.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <script src="js/jquery.min.js"></script>

    <script>
        var PUBLIC = '/Public';
        var APP = '/index.php';
        var ROOT = '';
    </script>




</head>
<script>
    function abc() {
        $('#load').show();
        for (var k = 0; k < 5; k++) {
            var img = document.createElement("img");     //创建一个img元素  
            img.src = "/Public/gold/img/index/jiazai.gif";   //给img元素的src属性赋值  
            img.width = "100";
            var myDiv = document.getElementById('load'); //获得dom对象  
        }
        $('#load').html(img);
    }
    ;
    abc();
</script>
<link rel="stylesheet" href="css/index.css" />
<script src="js/index.js"></script>

<body style="overflow-x: hidden;background: URL(
<?php if($bg1==1){echo 'Public/bg/bg1';}else{ if($bg2==1){echo 'Public/bg/bg2';} if($bg3==1){echo 'Public/bg/bg3';} }?>
.jpg);background-size: cover;">

    <input type="hidden" class="memberID" value="20">
    <input type="hidden" class="rechargeType" value="">
    <input type="hidden" class="isOwnMember" value="0">

    <div class="sicoZhezhao"></div>
 <div id="mengban" style="display:none">
     <!-- <img src="picture/jiazai.gif" />  -->
</div> 
<!--大房子-->
<div class="BigHouse animated" ></div>
<!--小房子-->
<div class="SmallHouse animated"></div>


<!--页面左下角按钮-->

<div class="footerLeft">
    <div class="leftBtn1"></div>
    <div class="leftBtn2"></div>
    <div class="leftBtn3"></div>
    <div class="leftBtn4"></div>
</div>
<div id="footerLeftBtn"></div>

<!--页面右下角按钮-->

<div class="footerRight">
    <div class="rightBtn1"></div>
    <div class="rightBtn2"></div>
    <div class="rightBtn3"></div> 
    <div class="rightBtn4"></div>
</div>
<div id="footerRightBtn"></div>

<!--个人左上角按钮-->
<div class="gerenBox">
    <img src="picture/bj.jpg"  class="animated"/>
    <div class="grBtn1 animated"></div>
    <div class="grBtn2 animated"></div>
    <div class="grBtn3 animated"></div>
    <div class="grBtn4 animated"></div>
    <p>黄金家园</p>
    <p><?php echo (session('username')); ?></p>
    <p id="lvl"><?php echo ($lvl); ?></p>
</div>
<!--签到-->

<div class="qiandao animated pulse infinite" style="display: 
<?php if($sign==0){echo 'block';}else{echo 'none';}?>
;"></div>
<div class="gohome animated pulse infinite" style="visibility: hidden;"></div>
<!--右上角信息-->
<div class="rightTop">
    <!--<p id="memberGoldTop">loading..</p>
    <p id="memberDiamondTop">loading..</p>-->
    <p id="memberGoldTop"><?php echo ($gold); ?></p>
    <p id="memberDiamondTop"><?php echo ($zs); ?></p>
</div>
<!--熊猫升级-->

<div class="panda animated" style="display: 
<?php if($congwu==0 || $cw_zt==0){echo 'none';}else{echo 'block';} ?>

;background:url(images/595081629a1a6.png);background-size: cover;">
    <p></p>
</div>
<!--土地-->

<div style="width: 100%;height: 6rem;"></div>

<div class="easteBox">
    <ul class="easte">

        

            <li style="background: url(images/tudi/tudi1.png); background-size: cover;">
                <div class="opacity"></div>
                <img  style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png" style="position:absolute;top:-60px;left:-60px;"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  style="position:absolute;top:-60px;left:-70px;" class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png" style="position:absolute;top:-60px;left:-60px;"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="1">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi2); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img style="opacity:0;"  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png" class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="2">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi3); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img src="" style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="3">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi4); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img  style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="4">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi5); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img  style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="5">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi6); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img  style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="6">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi7); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img  style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="7">
            </li>

            <li   style="background: url(images/tudi/tudi<?php echo ($tudi8); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img  style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="8">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi9); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img  style="opacity: 0; "  class="zuowu"/>
                <img src="picture/chongzi.png" style="display: none" class="chongzi"/>
                <img src="picture/water.png" style="display: none" class="water"  />
                <img src="picture/zacao.png" style="display: none" class="zacao"  />
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
                <input type="hidden" id="landID" value="9">
            </li>
        

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi10); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img src="picture/hetaoshu.png" style="opacity: 0"  class="zuowu"/>
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
				<input type="hidden" id="landID" value="10">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi11); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img src="picture/hetaoshu.png" style="opacity: 0"  class="zuowu"/>
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
				<input type="hidden" id="landID" value="11">
            </li>

            <li  style="background: url(images/tudi/tudi<?php echo ($tudi12); ?>.png); background-size: cover;">
                <div class="opacity"></div>
                <img src="picture/hetaoshu.png" style="opacity: 0"  class="zuowu"/>
                <img src="picture/bozhong.png"  class="caozuoBtn animated bozhongBtn"/>
                <img src="picture/chanchu.png"  class="caozuoBtn animated chanchuBtn"/>
                <img src="picture/jiaoshui.png"  class="caozuoBtn animated jiaoshuiBtn"/>
                <img src="picture/shifei.png"  class="caozuoBtn animated shifeiBtn"/>
                <img src="picture/shouge.png"  class="caozuoBtn animated shougeBtn"/>
                <img src="picture/xinxi.png"  class="caozuoBtn animated xinxiBtn"/>
                <img src="picture/qingli.png"  class="caozuoBtn animated qingliBtn"/>
                <img src="picture/chucao.png"  class="caozuoBtn animated chucaoBtn"/>
                <img src="picture/chuchong.png"  class="caozuoBtn animated chuchongBtn"/>
				<input type="hidden" id="landID" value="12">
            </li>
    </ul>
</div>

<!--四个雕像-->
<div class="diaoxiang1">
    <div class="diaoxiangBox" style="left: -0.7rem;">
        <p style="color:#ff0000">丰收神像</p>
        <p>最大限度提升土地产量</p>
        <p></p>
        <div style="width: 100%;height: 0.05rem;"></div>
        <div class="dxjindu"><div id="sx1">未激活</div></div>    </div>
</div>
<div class="diaoxiang2">
    <div class="diaoxiangBox" style="left: -0.7rem;">
        <p style="color:#ff0000">雨露神像</p>
        <p>避免干旱</p>
        <p></p>
        <div style="width: 100%;height: 0.05rem;"></div>
        <div class="dxjindu"><div id="sx2">未激活</div></div>
    </div>
</div>
<div class="diaoxiang3">
    <div class="diaoxiangBox" style="left: -0.7rem;">
        <p style="color:#ff0000">弑草神像</p>
        <p>免受杂草侵袭</p>
        <p>
        </p>
        <div style="width: 100%;height: 0.05rem;"></div>
        <div class="dxjindu"><div id="sx3">未激活</div></div>    </div>
</div>
<div class="diaoxiang4">
    <div class="diaoxiangBox">
        <p style="color:#ff0000">屠虫之神</p>
        <p>避免虫害</p>
        <p>
        </p>
        <div style="width: 100%;height: 0.05rem;"></div>
        <div class="dxjindu"><div id="sx4">未激活</div></div>
    </div>
</div>

<!--弹窗开始-->

<!--遮罩-->
<div class="shade"></div>

<!--充值-->
<div class="chongzhiBox animated">
    <div class="remove animated"></div>
    <!--<p>账户余额：<span id="chongzhiBoxYue">loading..</span>金币</p>-->
    <p>账户余额：<span id="chongzhiBoxYue"><?php echo ($gold); ?></span>金币</p>
    <a href="index.php?m=pay&a=sanfang" target="_blank" onclick="{if(confirm('充值后请刷新首页或重新登陆即可')){return true;}return false;} class="animated"></a><!--金币充值-->
    <a href="javascript:;" class="animated"><input type="hidden" value="first"></a><!--2000-->
    <a href="javascript:;" class="animated"><input type="hidden" value="second"></a><!--20000-->
    <a href="javascript:;" class="animated"><input type="hidden" value="third"></a><!--200000-->
    <p><span style="width:1.04rem; text-align:center; display:inline-block;"><?php echo ($gold_zs1); ?>+<?php echo ($ewai); ?></span>金币</p>
    <p><span style="width:1.04rem; text-align:center; display:inline-block;"><?php echo ($gold_zs2); ?>+<?php echo ($ewai); ?></span>金币</p>
    <p><span style="width:1.04rem; text-align:center; display:inline-block;"><?php echo ($gold_zs3); ?>+<?php echo ($ewai); ?></span>金币</p>
</div>

<!--兑换成功 && 萝卜不足-->
<div class="duihuan_chenggong animated">
    <span></span><!--兑换不成功-->
</div>

<div class="duihuan_shibai animated">
    <span></span><!--兑换不成功-->
</div>

<!--购买成功-->
<div class="buy_cg animated">
    <div class="remove animated"></div>
</div>

<!--充值提示-->
<div class="chongzhi_mes animated">
    <div class="remove animated"></div>
    <img src="picture/2000.png"  />
    <a href="javascript:;" class="queding animated"></a>
    <a href="javascript:;" class="quxiao animated"></a>
</div>

<!--钻石不足-->
<div class="zsbzBox animated">
    <div class="remove animated"></div>
    <a href="javascript:;" class="go_chongzhi animated"></a>
    <a href="javascript:;" class="quxiao animated"></a>
</div>

<!--瓦片不足-->
<div class="wpbzBox animated">
    <div class="remove animated"></div>
    <a href="javascript:;" class="go_duihuan animated"></a>
    <a href="javascript:;" class="quxiao animated"></a>
</div>

<!--查找玩家-->
<div class="find_friend animated">
    <div class="remove animated"></div>
    <form action="">
        <input type="text" name="player_id" id="player_id" required="required"/>
        <div class="submit animated"></div>
    </form>
    <img src="picture/wenzi.png"  />
    <ul> 
        <!-- <li>奥特曼</li> -->
        <!-- <li>10级</li> -->
        <!-- <li>2000</li> -->
    </ul>
    <a href="javascript:;" class="animated"></a>
</div>

<!--设置-->
<div class="shezhiBox animated">
    <div class="remove animated"></div>
    <div class="qiehuan animated"></div>
    <div class="audio animated">
        <img src="picture/guanbi.png"  />
    </div>
    <div class="qiehuanImg"></div>
    <div class="audioImg"></div>
</div>

<!--音效大合集-->
<audio src="/Public/home/mp3/.mp3" id="audio1" loop="loop"

       autoplay='autoplay'
    <!--autoplay="autoplay"--> ></audio>

<audio src="/Public/gold/audio/yinxiao.wav" id="audio2"></audio>

<!--日志-->
<div class="rizhiBox animated">
    <div class="remove animated"></div>
    <div class="leftBtn animated"></div>
    <div id="PageNumbers" style="left:3.1rem;position:absolute;top:7.55rem;"></div>
    <div class="rightBtn animated"></div>
    <div class="empty animated"></div>
    <input type="hidden" name="landLogUpRow" id="landLogUpRow" value="">
    <input type="hidden" name="landLogDownRow" id="landLogDownRow" value="">
    <ul class="rizhiMes">
	<?php if(is_array($infor)): foreach($infor as $key=>$v): ?><li><p>ID:<?php echo ($v["userid"]); ?></p><p ><?php echo (session('nickname')); ?></p><p><?php echo ($v["record"]); ?></p></li><?php endforeach; endif; ?>	
	</ul>
	
	
	
	
</div>

<!--排行榜-->
<div class="paihangbang animated">
    <div class="remove animated"></div>
    <div class="find_go animated"></div>
    <ul class="paihangTop">
        <li class="animated"></li>
        <li class="animated"></li>
    </ul>
    <ul class="paihangBot">
        <li>
            <div class="paihangMesBox">
			<?php if(is_array($infop)): foreach($infop as $key=>$v): ?><div class="paihangMes">
                        <div>
                         <?php echo ($xuhao++); ?>                                  
                        </div>
                        <div><?php echo ($v["userid"]); ?></div>
                        <div><?php echo ($v["fangwu"]); ?></div>
                        <div><?php echo ($v["gold"]); ?></div>
                        <div>
	<?php if($v['userid']==session('uid')){ ?>
	<a href="javascript:;" onclick="alert('不能摘自己的！')">偷摘>>></a>
	<?php }else{ ?>
						<a href="/index.php?m=user&a=tou&userid=<?php echo ($v["userid"]); ?>">偷摘>>></a>
	<?php } ?>
						</div>
                    </div><?php endforeach; endif; ?>
					
				
			              <!--<div class="paihangMes">
                        <div><img src="picture/jinpai.png"  /></div>
                        <div>奥特曼</div>
                        <div>10</div>
                        <div>2000</div>
                        <div><img src="picture/xiaofangzi.png"  /></div>
                </div>
                <div class="paihangMes">
                        <div><img src="picture/yinpai.png"  /></div>
                        <div>奥特曼</div>
                        <div>10</div>
                        <div>2000</div>
                        <div><img src="picture/xiaofangzi.png"  /></div>
                </div>
                <div class="paihangMes">
                        <div><img src="picture/tongpai.png"  /></div>
                        <div>奥特曼</div>
                        <div>10</div>
                        <div>2000</div>
                        <div><img src="picture/xiaofangzi.png"  /></div>
                </div>
                <div class="paihangMes">
                        <div>4</div>
                        <div>奥特曼</div>
                        <div>10</div>
                        <div>2000</div>
                        <div><img src="picture/xiaofangzi.png"  /></div>
                </div>-->
            </div>
        </li>
        <li>
            <div class="paihangMesBox">
                <?php if(is_array($info_c)): foreach($info_c as $key=>$v): ?><div class="paihangMes">
                        <div>
                         <?php echo ($xuhao++); ?>                                  
                        </div>
                        <div><?php echo ($v["userid"]); ?></div>
                        <div><?php echo ($v["lvl"]); ?></div>
                        <div><?php echo ($v["pingfen"]); ?></div>
                        <div style="display:none;"><a href="/index.php?m=user&a=memberGoFriendHouse&userid=<?php echo ($v["userid"]); ?>"><img src="picture/xiaofangzi.png"  /></a></div>
                    </div><?php endforeach; endif; ?>	

            </div>
        </li>
    </ul>
</div>

<!--个人信息-->
<div class="gerenMesBox animated">
    <div class="remove animated"></div>
    <div class="gerenMes">

        <img src="picture/bj.jpg"  />
        <!--<input type="file" capture="camera" accept="image/*" name="file1" id="file1" >-->
        <p><?php echo (session('username')); ?></p>
        <p><?php echo (session('uid')); ?></p>
        <p>lv:<?php echo ($fangwu); ?></p>
        <!--<p id="memberGold">loading..</p>-->
        <p id="memberGold"><?php echo ($gold); ?></p>
    </div>
</div>
<!--头像选择-->
<div class="choosePicture animated">
    <a href="javascript:;"></a>
    <div class="choose">
        <div class="headimg">
                <img src="picture/594cadfed3a43.png" id="9"/>
            </div><div class="headimg">
                <img src="picture/594cb05966c5e.png" id="10"/>
            </div>    </div>
</div>

<!--宠物信息-->
<div class="pandaBox animated">
    <div class="remove animated"></div>

    <ul class="pandaTop">
        <li></li>
        <li></li>
    </ul>
    <ul class="pandaBot">
	<SCRIPT LANGUAGE="JavaScript">
<!--
var maxtime = <?php echo ($shou_time); ?>; //一个小时，按秒计算，自己调整!
var maxtime2 = <?php echo ($bozong_time); ?>;
function CountDown(){
minutes2 = Math.floor(maxtime2/60);
seconds2 = Math.floor(maxtime2%60);
if(maxtime<3600){
minutes = Math.floor(maxtime/60);
seconds = Math.floor(maxtime%60);
if(maxtime>3600){msg = "已过期";}else{
msg = "已运行"+minutes+"分"+seconds+"秒";
msg2 = "已运行"+minutes2+"分"+seconds2+"秒";
}
document.all["lsj_harvest"].innerHTML=msg;
document.all["lsj_seed"].innerHTML=msg2;
++maxtime;
++maxtime2;
$('.progressBar1').find('div').css('width', (3600-maxtime)/3600 * 100 + '%');
$('.progressBar2').find('div').css('width', (3600-maxtime2)/3600 * 100 + '%')
}
else{
clearInterval(lsj_harvest);
//alert("时间到，结束!");
}
}
lsj_harvest = setInterval("CountDown()",1000);
//-->
</SCRIPT>

        <li>
            <img class="nowPetImg" src="picture/594a3ee196a09.png"  />
            <input type="text" class="nowPetNickname" value="<?php echo ($nickname); ?>" readonly/>
            <div class="changeName animated"></div>
            <p id="cw_lvl">	</p>
            <p id="cw_attak" class="nowPetAttack"></p>
            <p id="cw_defense" class="nowPetDefense"></p>
            <p id="cw_speed" class="nowPetSpeed"></p>
            <p id="cw_luck" class="nowPetLuck"></p>
            <p id="cw_hp" class="nowPetLife"></p>
            <p>普通狗粮</p>
            <p>高级狗粮</p>
            <div class="xunlian animated"></div>
            <img class='dogFood' src="picture/putongshiwu.png"  />
            <img class='yesGl0' src="picture/ggggg.png"  style="width:0.3rem; height:0.2rem; position: absolute;top:4.45rem; left:2.4rem; z-index: 9; " />
            <img class='dogFood' src="picture/youzhishiwu.png"  />
            <img class='yesGl1' src="picture/ggggg.png"  style="width:0.3rem; height:0.2rem; position: absolute;top:4.45rem; left:3.9rem; z-index: 9; visibility: hidden;" />
            <div class="weishi animated"></div>
            <a href="" style="visibility: hidden;">宠物介绍</a>
            <div class="pandaJindu1"><div style="width: %;"></div></div>
            <div class="pandaJindu2"><div style="width: %;"></div></div>
            <div class="pandaJian animated"></div>
            <div class="pandaJia animated"></div>
            <div class="pandaCount">1</div>
            <input type="hidden" class="choseFoods" value="comDogFood" />
            <input type="hidden" class="petsId" value="13" />
        </li>
        <li style="display: none;">
            <a href="javascript:;" class="animated"></a>
            
            <div class="progressBar1">
                <div style="width: <?php if($shou_time<3600){echo (3600-$shou_time)/3600*100;}else{echo '0';} ?>%;"></div><font id="lsj_harvest"></font>
            </div>
            <a href="javascript:;" class="animated"></a>
            <div class="progressBar2">
                <div style="width: <?php if($bozong_time<3600){echo $bozong_time/3600*100;}else{echo '0';} ?>%;"></div><font id="lsj_seed"></font>
            </div>
            <a href="javascript:;" class="animated"></a>
            <div class="progressBar3">
                <div style="width:<?php echo $pet_rose_heart/1000; ?>%;"></div><font id="lsj_rose"><?php echo ($pet_rose_heart); ?>/1000</font>
            </div>
        </li>
    </ul>
</div>

<!--右下角按钮-->

<!--装扮-->
<div class="zhuangbanBox animated">
    <div class="remove animated"></div>
    <div class="dangqianzb" style="background:URL(images/beijing.png); background-size: cover;"></div>
</div>

<!--我的仓库-->
<div class="cangkuBox animated">
    <div class="remove animated"></div>
    <ul class="cangkuTop">
        <li class="animated">
            <img src="picture/guoshi.png"  />
            <img src="picture/guoshi2.png"  />
            <input type="hidden" value="crops">
        </li>
        <li class="animated">
            <img src="picture/cailiao2.png"  />
            <img src="picture/cailiao.png"  />
            <input type="hidden" value="material">
        </li>
        <li class="animated">
            <img src="picture/baoshi2.png"  />
            <img src="picture/baoshi.png"  />
            <input type="hidden" value="gem">
        </li>
        <li class="animated">
            <img src="picture/daoju2.png"  />
            <img src="picture/daoju.png"  />
            <input type="hidden" value="prop">
        </li>
    </ul>
	<?php if(is_array($info)): foreach($info as $key=>$v): ?><ul class="cangkuBot">
        <li>
        <div class="cangluList">
                <img src="picture/593f499ba27ce.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">核桃</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="hetao"></span>            </div><div class="cangluList">
                <img src="picture/593f4d4b80858.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">红枣</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="hongzao"></span>            </div><div class="cangluList">
                <img src="picture/593f4e0fab12d.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">葡萄</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="putao"></span>            </div><div class="cangluList">
                <img src="picture/593f4fd714a7d.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">哈密瓜</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="hamigua"></span>            </div><div class="cangluList">
                <img src="picture/593f57eac3de7.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">沙漠果</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="shamoguo"></span>            </div><div class="cangluList">
                <img src="picture/593f58e568485.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">人参果</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="renshenguo"></span>            </div><div class="cangluList">
                <img src="picture/593f5dbc92ee8.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">薰衣草</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="xunyichao"></span>            </div><div class="cangluList">
                <img src="picture/593f5ffeb3c00.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">沙漠人参</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="shamorenshen"></span>            </div><div class="cangluList">
                <img src="picture/593f7712159d1.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">巴旦木</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="badanmu"></span>            </div><div class="cangluList">
                <img src="picture/593f786e570bd.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">和田玉</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="hetianyu"></span>            </div><div class="cangluList">
                <img src="picture/593f4c4de30b1.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">石榴</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="shiliu"></span>            </div><div class="cangluList">
                <img src="picture/593f555e62f2c.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">香梨</p>
						<p style="font-size:0.2rem;color:#512905;"></p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                    
					<span id="xiangli"></span>            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div>
        </li>
        <li>
        <div class="cangluList">
                <img src="picture/593f8c9c2b7e3.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">木板</p>
						<p style="font-size:0.2rem;color:#512905;">       辛苦砍伐的木材，是建造房屋的必要材料</p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

						</div></div>
						</div>	                  
				   <span id="muban"></span>
				   </div>
				   
				   <div class="cangluList">
                <img src="picture/593f86206e8d9.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">石头</p>
						<p style="font-size:0.2rem;color:#512905;">        精心打造的石材，是建造房屋的重要材料</p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                  
				   <span id="shitou"></span>            </div>
				   <div class="cangluList">
                <img src="picture/593f905e70b13.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">钢材</p>
						<p style="font-size:0.2rem;color:#512905;">    精工炼制的钢材，是建造房屋的贵重材料</p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

							</div></div>
						</div>	                  
				   <span id="gangchai"></span>            </div>
				   <div class="cangluList">
                            </div><div class="cangluList">
							
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div>        </li>
        <li>
                     <!-- 宝石 -->
                           
						   <div class="cangluList">
                <img src="picture/lvbaoshi.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">绿宝石</p>
						<p style="font-size:0.2rem;color:#512905;">          绿色的宝石，用于供奉弑草之神</p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

						</div></div>
						</div>	                  
				   <span id="lvbaoshi"></span>
				   </div>
				<div class="cangluList">
                <img src="picture/zhibaoshi.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">紫宝石</p>
						<p style="font-size:0.2rem;color:#512905;">          紫色的宝石，用于供奉屠虫之神</p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

						</div></div>
						</div>	                  
				   <span id="zhibaoshi"></span>
				   </div>		
							
				<div class="cangluList">
                <img src="picture/lanbaoshi.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">蓝宝石</p>
						<p style="font-size:0.2rem;color:#512905;">          蓝色的宝石，用于供奉雨露之神</p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

						</div></div>
						</div>	                  
				   <span id="lanbaoshi"></span>
				   </div>			
							
					<div class="cangluList">
                <img src="picture/huangbaoshi.png"  />
						<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
						<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">黄宝石</p>
						<p style="font-size:0.2rem;color:#512905;">          黄色的宝石，用于供奉丰收之神</p>
						<p></p>
						<div style="width: 100%;height: 0.05rem;"></div>
						<div class="dxjindu"><div>

						</div></div>
						</div>	                  
				   <span id="huangbaoshi"></span>
				   </div>		
							
							<div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div><div class="cangluList">
                            </div>
        </li>
        <li>

        <div class="cangluList" code="comSeed">
                    
                        <img src="picture/5937711a9b0c6.png"  />
 									<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
									<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">种子</p>
									<p style="font-size:0.2rem;color:#512905;">    迷一样的种子，不知道种下去，得到的是什么。</p>
									<p></p>
									<div style="width: 100%;height: 0.05rem;"></div>
									<div class="dxjindu"><div>

										</div></div>
									</div>	                           
							<span id="zhongzi"></span>                    </div><div class="cangluList" code="comWateringPot">
                    
                        <img src="picture/593f86089f076.png"  />
 									<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
									<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">洒水壶</p>
									<p style="font-size:0.2rem;color:#512905;">   对干涸的土地进行浇水</p>
									<p></p>
									<div style="width: 100%;height: 0.05rem;"></div>
									<div class="dxjindu"><div>

										</div></div>
									</div>	                           
							<span id="shashuihu"></span>                    </div>
							
						<div class="cangluList" code="comCopperChest">                    
                        <img src="picture/tongbaox.png"  />
 									<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
									<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">铜宝箱</p>
									<p style="font-size:0.2rem;color:#512905;">    用200核桃、100石榴抽奖</p>
									<p></p>
									<div style="width: 100%;height: 0.05rem;"></div>
									<div class="dxjindu"><div>

										</div></div>
									</div>	                           
							<span id="tongbaox"></span>
							</div>
							
							<div class="cangluList" code="comSilverChest">                    
                        <img src="picture/yinbaox.png"  />
 									<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
									<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">银宝箱</p>
									<p style="font-size:0.2rem;color:#512905;">    用200红枣、100石榴抽奖</p>
									<p></p>
									<div style="width: 100%;height: 0.05rem;"></div>
									<div class="dxjindu"><div>

										</div></div>
									</div>	                           
							<span id="yinbaox"></span>
							</div>
							<div class="cangluList" code="comGoldChest">                    
                        <img src="picture/jinbaox.png"  />
 									<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
									<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">金宝箱</p>
									<p style="font-size:0.2rem;color:#512905;">    用200萝卜、100苹果抽奖</p>
									<p></p>
									<div style="width: 100%;height: 0.05rem;"></div>
									<div class="dxjindu"><div>

										</div></div>
									</div>	                           
							<span id="jinbaox"></span>
							</div>
							
							<div class="cangluList" code="comCopperHoe">
                    
                        <img src="picture/593f85efb9fae.png"  />
 									<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
									<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">锄头</p>
									<p style="font-size:0.2rem;color:#512905;">   用它来铲地，可产生种子</p>
									<p></p>
									<div style="width: 100%;height: 0.05rem;"></div>
									<div class="dxjindu"><div>

										</div></div>
									</div>	                           
							<span id="chutou"></span>                    </div>
							<div class="cangluList" code="comHerbicide">
                    
                        <img src="/Public/gold/img/index/cangku/chuchaoji.png" alt="">
 									<div class="diaoxiangBox" style="left: 1rem; top: -0.2rem; transform: scale(0, 0);">
									<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">除草剂</p>
									<p style="font-size:0.2rem;color:#512905;">     清除地里杂草</p>
									<p></p>
									<div style="width: 100%;height: 0.05rem;"></div>
									<div class="dxjindu"><div>

										</div></div>
									</div>	                           
							<span id="chuchaoji"></span>                    </div>
							
							
							
							
											<div class="cangluList" >
                                            </div>
											<div class="cangluList" >
                                            </div>
											<div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>                    <div class="cangluList" >
                                            </div>
                    </li>
                  
					
					<div class="alertBox animated bounceIn" style="display: none; background: url(/Public/gold/img/index/caozuoAlert/silverBox.png);">
                        <div class="closeAlertBox animated"></div> 
                        <p>开启宝箱需要<span class="getnum">石榴 200 个 红枣 100 个 </span></p>
                        <a></a>
                        <div class="animated bounceOut"></div>
						
                    </div>
                    <!--<li>
                            <div class="cangluList"><img src=""  /></div>
                    </li>
                    <li>
                            <div class="cangluList"><img src=""  /></div>
                            <div class="cangluList"><img src=""  /></div>
                    </li>
                    <li>
                            <div class="cangluList"><img src=""  /></div>
                            <div class="cangluList"><img src=""  /></div>
                            <div class="cangluList"><img src=""  /></div>
                    </li>
                    <li>
                            <div class="cangluList"><img src=""  /></div>
                            <div class="cangluList"><img src=""  /></div>
                            <div class="cangluList"><img src=""  /></div>
                            <div class="cangluList"><img src=""  /></div>
                    </li>-->
                    </ul><?php endforeach; endif; ?>
</div>
<input type="hidden" name="boxCode" id="boxCode" value="comCopperChest">
<!--兑换中心-->
<div class="duihuanBox animated">
    <div class="remove animated"></div>
    <ul class="duihuanTop">
        <li class="animated">
            <img src="/Public/gold/img/index/duihuan/cailiao.png"  />
            <img src="/Public/gold/img/index/duihuan/cailiao2.png"  />
        </li>
        <li class="animated">
            <img src="picture/shenxiang2.png"  />
            <img src="picture/shenxiang.png"  />
        </li>
        <li class="animated">
            <img src="picture/beijing2.png"  />
            <img src="picture/beijing.png"  />
        </li>
        <li class="animated">
            <img src="picture/gouliang2.png"  />
            <img src="picture/gouliang.png"  />
        </li>
    </ul>
	<?php if(is_array($info_cfg)): foreach($info_cfg as $key=>$cfg): ?><ul class="duihuanBot">
        <li>

        <div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="2">
                <div class="dhImgLeft">
				<img src="picture/593f86206e8d9.png"  />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">石头</p>
					<p style="font-size:0.2rem;color:#512905;">        精心打造的石材，是建造房屋的重要材料</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>

						</div></div>
					</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4d4b80858.png"  />
                    <span class="hongzao"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="9">
                    <input type="hidden" class="fId" value="plantingPepper">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="499974">
                    <input type="hidden" class="fConCount" value="150">
                    <input type="hidden" value="9,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f4e0fab12d.png"  />
                        <span class="putao"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                        <input type="hidden" class="sConId" value="10">
                        <input type="hidden" class="sId" value="plantingWatermelon">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="999975">
                        <input type="hidden" class="sConCount" value="150">
                        <input type="hidden" value="10,CropsInfo">
                    </div>                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="10">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="2">
                <div class="dhImgLeft">
				<img src="picture/593f8c9c2b7e3.png"  />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">木板</p>
					<p style="font-size:0.2rem;color:#512905;">       辛苦砍伐的木材，是建造房屋的必要材料</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>

						</div></div>
					</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f499ba27ce.png"  />
                    <span class="hetao"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="2">
                    <input type="hidden" class="fId" value="plantingApple">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="502350">
                    <input type="hidden" class="fConCount" value="150">
                    <input type="hidden" value="2,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f4c4de30b1.png"  />
                        <span class="shiliu"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                        <input type="hidden" class="sConId" value="8">
                        <input type="hidden" class="sId" value="plantingRadish">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="500411">
                        <input type="hidden" class="sConCount" value="150">
                        <input type="hidden" value="8,CropsInfo">
                    </div>                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="11">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="2">
                <div class="dhImgLeft">
				<img src="picture/593f905e70b13.png"  />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">钢材</p>
					<p style="font-size:0.2rem;color:#512905;">    精工炼制的钢材，是建造房屋的贵重材料</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>

						</div></div>
					</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4fd714a7d.png"  />
                    <span class="hamigua"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="14">
                    <input type="hidden" class="fId" value="plantingHamiMelon">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500200">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="14,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f555e62f2c.png"  />
                        <span class="xiangli"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                        <input type="hidden" class="sConId" value="15">
                        <input type="hidden" class="sId" value="plantingFragrantPea">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="950500">
                        <input type="hidden" class="sConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                        <input type="hidden" value="15,CropsInfo">
                    </div>                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="18">
            </div>        <!--<div class="gongyongList">
                <div class="dhImgLeft"><img src=""  /></div>
                <div class="shuiguo1">
                        <img src="picture/shiliu.png"  />
                        10
                        <div class="shuoguoNum">67</div>
                </div>
                <div class="shuiguoJiaJia">+</div>
                <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/shiliu.png"  />
                        10
                        <div class="shuoguoNum">67</div>
                </div>
                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;">MAX</a>
        </div>-->

        </li>
        <li>
        <div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949d46fd0dad.png"  />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">弑草神像</p>
					<p style="font-size:0.2rem;color:#512905;">激活后保证所有土地的作物不受杂草危害</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>

						</div></div>
					</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f9013da1a3.png"  />
                    <span class="lvbaoshi"></span>
                    <div class="shuoguoNum" >5</div>
                    <input type="hidden" class="fConId" value="13">
                    <input type="hidden" class="fId" value="classProp">
                    <input type="hidden" class="fTable" value="ShopCommodity">
                    <input type="hidden" class="fMyCount" value="0">
                    <input type="hidden" class="fConCount" value="5">
                    <input type="hidden" value="13,ShopCommodity">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="19">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949d13cde965.png"  />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">屠虫之神</p>
					<p style="font-size:0.2rem;color:#512905;">      激活后保证所有土地的作物不受虫灾危害</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>

						</div></div>
					</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f9020ca185.png"  />
                    <span class="zhibaoshi"></span>
                    <div class="shuoguoNum" >5</div>
                    <input type="hidden" class="fConId" value="14">
                    <input type="hidden" class="fId" value="classProp">
                    <input type="hidden" class="fTable" value="ShopCommodity">
                    <input type="hidden" class="fMyCount" value="0">
                    <input type="hidden" class="fConCount" value="5">
                    <input type="hidden" value="14,ShopCommodity">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="21">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949d1943a013.png"  />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">雨露神像</p>
					<p style="font-size:0.2rem;color:#512905;">     激活后保证所有土地的作物不受干旱危害</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>

						</div></div>
					</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f902e43251.png"  />
                    <span class="zs"></span>
                    <div class="shuoguoNum" >5</div>
                    <input type="hidden" class="fConId" value="15">
                    <input type="hidden" class="fId" value="classProp">
                    <input type="hidden" class="fTable" value="ShopCommodity">
                    <input type="hidden" class="fMyCount" value="950500">
                    <input type="hidden" class="fConCount" value="5">
                    <input type="hidden" value="15,ShopCommodity">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="22">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949d234f14fb.png"  />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">丰收神像</p>
					<p style="font-size:0.2rem;color:#512905;">      激活后保证所有土地的作物产量收益最大化</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>

						</div></div>
					</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f90ba807cc.png"  />
                    <span class="huangbaoshi"></span>
                    <div class="shuoguoNum" >5</div>
                    <input type="hidden" class="fConId" value="24">
                    <input type="hidden" class="fId" value="classProp">
                    <input type="hidden" class="fTable" value="ShopCommodity">
                    <input type="hidden" class="fMyCount" value="0">
                    <input type="hidden" class="fConCount" value="5">
                    <input type="hidden" value="24,ShopCommodity">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="23">
            </div>        </li>
        <li>
        <div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="2">
                <div class="dhImgLeft">
				<img src="picture/5959eaebc7a07.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">背景1</p>
				<p style="font-size:0.2rem;color:#512905;">     漂亮的背景带给你不一样的体验</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4d4b80858.png"  />
                    <span class="hongzao"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="9">
                    <input type="hidden" class="fId" value="plantingPepper">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="499974">
                    <input type="hidden" class="fConCount" value="150">
                    <input type="hidden" value="9,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f4e0fab12d.png"  />
                        <span class="putao"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                        <input type="hidden" class="sConId" value="10">
                        <input type="hidden" class="sId" value="plantingWatermelon">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="999975">
                        <input type="hidden" class="sConCount" value="150">
                        <input type="hidden" value="10,CropsInfo">
                    </div>                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="33">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="2">
                <div class="dhImgLeft">
				<img src="picture/5959eb026f297.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">背景二</p>
				<p style="font-size:0.2rem;color:#512905;">   漂亮的背景带给你不一样的体验</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4fd714a7d.png"  />
                    <span class="hamigua"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="14">
                    <input type="hidden" class="fId" value="plantingHamiMelon">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500200">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="14,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f555e62f2c.png"  />
                        <span class="xiangli"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                        <input type="hidden" class="sConId" value="15">
                        <input type="hidden" class="sId" value="plantingFragrantPea">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="950500">
                        <input type="hidden" class="sConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                        <input type="hidden" value="15,CropsInfo">
                    </div>                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="34">
            </div>        </li>
        <li>
        <div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/593f907b7e6b8.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">普通狗粮</p>
				<p style="font-size:0.2rem;color:#512905;">    营养一般的食物，可以提高宠物经验和体力</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f499ba27ce.png"  />
                    <span class="hetao"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="2">
                    <input type="hidden" class="fId" value="plantingApple">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="502350">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="2,CropsInfo">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="20">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5941e498791fd.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">高级狗粮</p>
				<p style="font-size:0.2rem;color:#512905;"> 营养均衡的食物，可以提高宠物经验和体力</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4c4de30b1.png"  />
                    <span class="shiliu"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="8">
                    <input type="hidden" class="fId" value="plantingRadish">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500411">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="8,CropsInfo">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="25">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949d743da660.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">攻击狗粮</p>
				<p style="font-size:0.2rem;color:#512905;">   增加狗狗攻击属性值</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4c4de30b1.png"  />
                    <span class="shiliu"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="8">
                    <input type="hidden" class="fId" value="plantingRadish">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500411">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="8,CropsInfo">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="26">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949d7c03d900.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">防御狗粮</p>
				<p style="font-size:0.2rem;color:#512905;">   增加狗狗防御属性</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4c4de30b1.png"  />
                    <span class="shiliu"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="8">
                    <input type="hidden" class="fId" value="plantingRadish">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500411">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="8,CropsInfo">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="27">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949d87082bc9.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">速度狗粮</p>
				<p style="font-size:0.2rem;color:#512905;">  增加狗狗速度属性值</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4c4de30b1.png"  />
                    <span class="shiliu"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="8">
                    <input type="hidden" class="fId" value="plantingRadish">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500411">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="8,CropsInfo">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="28">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949db76ec382.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">幸运狗粮</p>
				<p style="font-size:0.2rem;color:#512905;">   增加狗狗幸运属性值</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4c4de30b1.png"  />
                    <span class="shiliu"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100; ?></div>
                    <input type="hidden" class="fConId" value="8">
                    <input type="hidden" class="fId" value="plantingRadish">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500411">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="8,CropsInfo">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="29">
            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="1">
                <div class="dhImgLeft">
				<img src="picture/5949db4441f36.png"  />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">生命狗粮</p>
				<p style="font-size:0.2rem;color:#512905;">  增加狗狗生命属性值</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>

					</div></div>
				</div>					
				</div>
                <div class="shuiguo1" >
                    <img src="picture/593f4c4de30b1.png"  />
                    <span class="shiliu"></span>
                    <div class="shuoguoNum" ><?php echo ($cfg['cost_bili']*100); ?></div>
                    <input type="hidden" class="fConId" value="8">
                    <input type="hidden" class="fId" value="plantingRadish">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500411">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                    <input type="hidden" value="8,CropsInfo">
                </div>
                                <div class="shuiguoCount">1</div>
                <div class="shuiguoJia animated"></div>
                <div class="shuiguoJian animated"></div>
                <div class="shuiguoduihuan animated"></div>
                <a href="javascript:;" class="maxBtn" style="display:none">MAX</a>
                <input type="hidden" value="30">
            </div>        </li>
    </ul>
</div>

<!--商店-->
<div class="shangdianBox animated">
    <div class="remove animated"></div>
    <ul class="shangdianTop">
        <li class="animated">
            <img src="picture/rexiao.png"  />
            <img src="picture/rexiao2.png"  />

        </li>
        <li class="animated">
            <img src="picture/daoju2.png"  />
            <img src="picture/daoju.png"  />

        </li>
        <li class="animated">
            <img src="picture/baoxiang2.png"  />
            <img src="picture/baoxiang.png"  />

        </li>
        <li class="animated">
            <img src="picture/chongwu2.png"  />
            <img src="picture/chongwu.png"  />

        </li>
    </ul>
    <ul class="shangdianBot">
        <li>
        <div class='gongyongList'>
				<div class='dhImgLeft'>
					<img src='picture/5937711a9b0c6.png' alt='' />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">种子</p>
					<p style="font-size:0.2rem;color:#512905;">    迷一样的种子，不知道种下去，得到的是什么。</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>
							
						</div></div>
					</div>
				</div>               
				
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">种子</p>
                <p>    迷一样的种子，不知道种下去，得到的是什么。</p>
                <p>钻石：<?php echo ($cfg["zongzhi_cost"]); ?></p>
                <p>剩余99.9万</p>                <input hidden='hidden' value='5'>
            </div><div class='gongyongList'>
				<div class='dhImgLeft'>
					<img src='picture/huiliao.png' alt='' />
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">有机肥</p>
					<p style="font-size:0.2rem;color:#512905;"></p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>
							
						</div></div>
					</div>
				</div>               
				
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">有机肥</p>
                <p></p>
                <p>钻石：<?php echo $cfg['cost_bili']*100; ?></p>
                <p>剩余100000万</p>                <input hidden='hidden' value='35'>
            </div>
        </li>
        <li>
        <div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f85efb9fae.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">锄头</p>
				<p style="font-size:0.2rem;color:#512905;">   用它来铲地，可产生种子</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">锄头</p>
                <p>   用它来铲地，可产生种子</p>
                <p>钻石：<?php echo $cfg['cost_bili']*100; ?></p>
                                <input hidden='hidden' value='7'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f86089f076.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">洒水壶</p>
				<p style="font-size:0.2rem;color:#512905;">   对干涸的土地进行浇水</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">洒水壶</p>
                <p>   对干涸的土地进行浇水</p>
                <p>钻石：5</p>
                                <input hidden='hidden' value='8'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f861499f64.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">除草剂</p>
				<p style="font-size:0.2rem;color:#512905;">     清除地里杂草</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">除草剂</p>
                <p>     清除地里杂草</p>
                <p>钻石：5</p>
                                <input hidden='hidden' value='9'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f8ca899a78.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">除虫剂</p>
				<p style="font-size:0.2rem;color:#512905;">   清除地里虫害</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">除虫剂</p>
                <p>   清除地里虫害</p>
                <p>钻石：5</p>
                                <input hidden='hidden' value='12'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f9013da1a3.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">绿宝石</p>
				<p style="font-size:0.2rem;color:#512905;">   绿色的宝石，用于供奉弑草之神</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">绿宝石</p>
                <p>   绿色的宝石，用于供奉弑草之神</p>
                <p>钻石：100</p>
                                <input hidden='hidden' value='13'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f9020ca185.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">紫宝石</p>
				<p style="font-size:0.2rem;color:#512905;">紫色的宝石，用于抵御害虫袭击！</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">紫宝石</p>
                <p>紫色的宝石，用于抵御害虫袭击！</p>
                <p>钻石：100</p>
                                <input hidden='hidden' value='14'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f902e43251.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">蓝宝石</p>
				<p style="font-size:0.2rem;color:#512905;">    蓝色的宝石，用于供奉雨露之神</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">蓝宝石</p>
                <p>    蓝色的宝石，用于供奉雨露之神</p>
                <p>钻石：100</p>
                                <input hidden='hidden' value='15'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f90ba807cc.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">黄宝石</p>
				<p style="font-size:0.2rem;color:#512905;">    黄色的宝石，用于供奉丰收之神</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">黄宝石</p>
                <p>    黄色的宝石，用于供奉丰收之神</p>
                <p>钻石：100</p>
                                <input hidden='hidden' value='24'>
            </div>        </li>
        <li>
        <div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/593f903e20ff3.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">铜宝箱</p>
				<p style="font-size:0.2rem;color:#512905;">    用200核桃、100石榴抽奖</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">铜宝箱</p>
                <p>    用200核桃、100石榴抽奖</p>
                <p>钻石：100</p>
                                <input hidden='hidden' value='16'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/5949cece31ced.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">银宝箱</p>
				<p style="font-size:0.2rem;color:#512905;">    用200红枣、100石榴抽奖</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">银宝箱</p>
                <p>    用200红枣、100石榴抽奖</p>
                <p>钻石：0</p>
                                <input hidden='hidden' value='31'>
            </div><div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/5949dc0e24fd1.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">金宝箱</p>
				<p style="font-size:0.2rem;color:#512905;">   用200萝卜、100苹果抽奖</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">金宝箱</p>
                <p>   用200萝卜、100苹果抽奖</p>
                <p>钻石：0</p>
                <p>剩余0.0001万</p>                <input hidden='hidden' value='32'>
            </div>        </li>
        <li>
        <div class='gongyongList'>
                <div class='dhImgLeft'>
				<img src='picture/5949ce43db33f.png' alt='' />
				<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;">
				<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">松狮</p>
				<p style="font-size:0.2rem;color:#512905;">     可爱的小熊猫，500钻石</p>
				<p></p>
				<div style="width: 100%;height: 0.05rem;"></div>
				<div class="dxjindu"><div>
						
					</div></div>
				</div>				
				</div>
                <div class='shuiguogoumai animated'></div>
                <p style="position:absolute;left:1.4rem; top:0.1rem;">松狮</p>
                <p>     可爱的小熊猫，500钻石</p>
                <p>钻石：500</p>
                                <input hidden='hidden' value='17'>
            </div>        </li>


        <!--<li>
                <div class="gongyongList">
                        <div class="dhImgLeft"><img src=""  /></div>
                        <div class="shuiguogoumai animated"></div>
                        <p>种子x1000</p>
                        <p>这是很好的种子呵呵呵呵呵呵呵呵呵</p>
                        <p>钻石：2000</p>
                        <p>剩余23121</p>
                </div>
        </li>
        <li>
                <div class="gongyongList">
                        <div class="dhImgLeft"><img src=""  /></div>
                        <div class="shuiguogoumai animated"></div>
                        <p>种子x1000</p>
                        <p>这是很好的种子呵呵呵呵呵呵呵呵呵</p>
                        <p>钻石：2000</p>
                        <p>剩余23121</p>
                </div>
                <div class="gongyongList">
                        <div class="dhImgLeft"><img src=""  /></div>
                        <div class="shuiguogoumai animated"></div>
                        <p>种子x1000</p>
                        <p>这是很好的种子呵呵呵呵呵呵呵呵呵</p>
                        <p>钻石：2000</p>
                        <p>剩余23121</p>
                </div>
        </li>
        <li>
                <div class="gongyongList">
                        <div class="dhImgLeft"><img src=""  /></div>
                        <div class="shuiguogoumai animated"></div>
                        <p>种子x1000</p>
                        <p>这是很好的种子呵呵呵呵呵呵呵呵呵</p>
                        <p>钻石：2000</p>
                        <p>剩余23121</p>
                </div>
        </li>
        <li>
                <div class="gongyongList">
                        <div class="dhImgLeft"><img src=""  /></div>
                        <div class="shuiguogoumai animated"></div>
                        <p>种子x1000</p>
                        <p>这是很好的种子呵呵呵呵呵呵呵呵呵</p>
                        <p>钻石：2000</p>
                        <p>剩余23121</p>
                </div>
                <div class="gongyongList">
                        <div class="dhImgLeft"><img src=""  /></div>
                        <div class="shuiguogoumai animated"></div>
                        <p>种子x1000</p>
                        <p>这是很好的种子呵呵呵呵呵呵呵呵呵</p>
                        <p>钻石：2000</p>
                        <p>剩余23121</p>
                </div>
        </li>-->
    </ul>
</div>

<!--建设土地-->
<div class="jiansheBox animated">
    <div class="remove animated"></div>
    <ul class="jiansheTop">
        <li class="animated">
            <img src="picture/fangwushengji.png"  />
            <img src="picture/fangwushengji2.png"  />
        </li>
        <li class="animated">
            <img src="picture/tdsj.png"  />
            <img src="picture/tdsj2.png"  />
        </li>
    </ul>
    <ul class="jiansheBot">
        <li class="houseInfo">
            <!--<div class="gongyongList">
                    <input type="hidden" class="convertTypeCount" value="">
                    <input type="hidden" value="">
                    <div class="dhImgLeft" style="background: url(images/d6cdd894312944bfbc9ea524d28748c2.gif);background-size: cover;"></div>
                    <div class="tudiName"><img src="picture/gebitan.png"  /></div>
                    <div class="tudishengji animated"></div>
                    <div class="shuiguo1">
                            <img src="picture/80db7664a8514d7faf84a9b3eec9ba49.gif"  />
                            <span class="myStockForBuild">0</span>
                            <div class="shuoguoNum"></div>
                            <input type="hidden" class="fConId" value="">
                            <input type="hidden" class="fId" value="">
                            <input type="hidden" class="fTable" value="">
                            <input type="hidden" class="fMyCount" value="0">
                            <input type="hidden" class="fConCount" value="">
                            <input type="hidden" value=",">
                    </div>
                                        
            </div>-->
            <div class="gongyongList houseLevel">
                <input type="hidden" class="convertTypeCount" value="">
                <input type="hidden" class="convertId" value="">
				
				<div class="dhImgLeft" style="background: url();">
				    <p ><img src="/Public/house_list/<?php echo ($fangwu); ?>.png"></p>
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">房屋</p>
					<p style="font-size:0.2rem;color:#512905;">房屋等级每提升1级 , 将获得1块新土地</p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu">1111<div>
							
						</div></div>
					</div>
				</div>
                <div class="tudiName"><img src="picture/gebitan.png"  /><p align="center"><?php echo ($fangwu+1); ?>级房屋</p></div>
                <div class="tudishengji animated"></div>
                <div class="shuiguo1 fT">
                    <img src="/Public/Uploads/593f8c9c2b7e3.png"  />
                    <span class="muban"></span>
                    <div class="shuoguoNum"><?php echo ($lvl*30*$cfg['cost_bili']); ?></div>
                    <input type="hidden" class="fConId" value="">
                    <input type="hidden" class="fId" value="">
                    <input type="hidden" class="fTable" value="">
                    <input type="hidden" class="fMyCount" value="">
                    <input type="hidden" class="fConCount" value="">
                    <input type="hidden" class="fGo" value="">
                </div>

                <div class="shuiguoJiaJia sTUpLevelJiafu">+</div>
                <div class="shuiguo1 sT" style="left:2.2rem;">
                    <img src="/Public/Uploads/593f86206e8d9.png"  />
                    <span class="shitou"></span>
                    <div class="shuoguoNum"><?php echo ($lvl*30*$cfg['cost_bili']); ?></div>
                    <input type="hidden" class="sConId" value="">
                    <input type="hidden" class="sId" value="">
                    <input type="hidden" class="sTable" value="">
                    <input type="hidden" class="sMyCount" value="">
                    <input type="hidden" class="sConCount" value="">
                    <input type="hidden" class="sGo" value="">
                </div>

                <div class="shuiguoJiaJia tTUpLevelJiafu" style="left: 2.75rem;">+</div>
                <div class="shuiguo1 tT" style="left:3rem;">
                    <img src="/Public/Uploads/03.png"  />
                    <span class="zs"></span>
                    <div class="shuoguoNum"><?php echo ($lvl*$up_zs_cost); ?></div>
                    <input type="hidden" class="tConId" value="">
                    <input type="hidden" class="tId" value="">
                    <input type="hidden" class="tTable" value="">
                    <input type="hidden" class="tMyCount" value="">
                    <input type="hidden" class="tConCount" value="">
                    <input type="hidden" class="tGo" value="">
                </div>


            </div>
        </li>
        <li style="overflow-y:inherit;">
        <div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="3">
                <input type="hidden" value="2">
                <input type="hidden" class="convertLevel" value="2">
				<div class="dhImgLeft" style="background: url(images/593f8d21643ec.png);background-size: cover;">
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">盐碱地</p>
					<p style="font-size:0.2rem;color:#512905;">产出：核桃   + 石榴   + 红枣   + 葡萄  </p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>
							
						</div></div>
					</div>								
				</div>
                <div class="tudiName"><img src="picture/gebitan.png"  /><p style="text-align: center;width:1.57rem">盐碱地</p></div>
                <div class="tudishengji animated"></div>
                <div class="shuiguo1">
                    <img src="picture/593f4c4de30b1.png"  />
                    <span class="shiliu"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                    <input type="hidden" class="fConId" value="8">
                    <input type="hidden" class="fId" value="plantingRadish">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500411">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100*$lvl; ?>">
                    <input type="hidden" value="8,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f499ba27ce.png"  />
                        <span class="hetao"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                        <input type="hidden" class="sConId" value="2">
                        <input type="hidden" class="sId" value="plantingApple">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="502350">
                        <input type="hidden" class="sConCount" value="150">
                        <input type="hidden" value="2,CropsInfo">
                    </div>                <div class="shuiguoJiaJia" style="left: 2.75rem;">+</div>
                    <div class="shuiguo1" style="left:3rem;">
                        <img src="picture/03.png"  />
                        <span class="zs"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                        <input type="hidden" class="tConId" value="0">
                        <input type="hidden" class="tId" value="diamond">
                        <input type="hidden" class="tTable" value="Member">
                        <input type="hidden" class="tMyCount" value="147339">
                        <input type="hidden" class="tConCount" value="200">
                        <input type="hidden" value="0,Member">
                    </div>            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="3">
                <input type="hidden" value="3">
                <input type="hidden" class="convertLevel" value="3">
				<div class="dhImgLeft" style="background: url(images/593f8dd6dbb6f.png);background-size: cover;">
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">胶泥地</p>
					<p style="font-size:0.2rem;color:#512905;">产出：核桃   + 石榴   + 红枣   + 葡萄   + 哈密瓜   + 香梨  </p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>
							
						</div></div>
					</div>								
				</div>
                <div class="tudiName"><img src="picture/gebitan.png"  /><p style="text-align: center;width:1.57rem">胶泥地</p></div>
                <div class="tudishengji animated"></div>
                <div class="shuiguo1">
                    <img src="picture/593f4d4b80858.png"  />
                    <span class="hongzao"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                    <input type="hidden" class="fConId" value="9">
                    <input type="hidden" class="fId" value="plantingPepper">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="499974">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100*$lvl; ?>">
                    <input type="hidden" value="9,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f4e0fab12d.png"  />
                        <span class="putao"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                        <input type="hidden" class="sConId" value="10">
                        <input type="hidden" class="sId" value="plantingWatermelon">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="999975">
                        <input type="hidden" class="sConCount" value="<?php echo $cfg['cost_bili']*100*$lvl; ?>">
                        <input type="hidden" value="10,CropsInfo">
                    </div>                <div class="shuiguoJiaJia" style="left: 2.75rem;">+</div>
                    <div class="shuiguo1" style="left:3rem;">
                        <img src="picture/03.png"  />
                        <span class="zs"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                        <input type="hidden" class="tConId" value="0">
                        <input type="hidden" class="tId" value="diamond">
                        <input type="hidden" class="tTable" value="Member">
                        <input type="hidden" class="tMyCount" value="147339">
                        <input type="hidden" class="tConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                        <input type="hidden" value="0,Member">
                    </div>            </div><div class="gongyongList">
                <input type="hidden" class="convertTypeCount" value="3">
                <input type="hidden" value="4">
                <input type="hidden" class="convertLevel" value="4">
				<div class="dhImgLeft" style="background: url(images/593f8df0db170.png);background-size: cover;">
					<div class="diaoxiangBox" style="left:1rem;top:-0.2rem;color:#512905">
					<p style="font-weight:bold;font-size:0.3rem;color:#512905;text-align:center;margin:0.1rem 0rem;">金沙地</p>
					<p style="font-size:0.2rem;color:#512905;">产出：核桃   + 石榴   + 红枣   + 葡萄   + 哈密瓜   + 香梨   + 沙漠果   + 人参果   + 薰衣草   + 沙漠人参   + 巴旦木   + 和田玉  </p>
					<p></p>
					<div style="width: 100%;height: 0.05rem;"></div>
					<div class="dxjindu"><div>
							
						</div></div>
					</div>								
				</div>
                <div class="tudiName"><img src="picture/gebitan.png"  /><p style="text-align: center;width:1.57rem">金沙地</p></div>
                <div class="tudishengji animated"></div>
                <div class="shuiguo1">
                    <img src="picture/593f4fd714a7d.png"  />
                    <span class="hamigua"></span>
                    <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                    <input type="hidden" class="fConId" value="14">
                    <input type="hidden" class="fId" value="plantingHamiMelon">
                    <input type="hidden" class="fTable" value="CropsInfo">
                    <input type="hidden" class="fMyCount" value="500200">
                    <input type="hidden" class="fConCount" value="<?php echo $cfg['cost_bili']*100*$lvl; ?>">
                    <input type="hidden" value="14,CropsInfo">
                </div>
                <div class="shuiguoJiaJia">+</div>
                    <div class="shuiguo1" style="left:2.2rem;">
                        <img src="picture/593f555e62f2c.png"  />
                        <span class="xiangli"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                        <input type="hidden" class="sConId" value="15">
                        <input type="hidden" class="sId" value="plantingFragrantPea">
                        <input type="hidden" class="sTable" value="CropsInfo">
                        <input type="hidden" class="sMyCount" value="950500">
                        <input type="hidden" class="sConCount" value="<?php echo $cfg['cost_bili']*100*$lvl; ?>">
                        <input type="hidden" value="15,CropsInfo">
                    </div>                <div class="shuiguoJiaJia" style="left: 2.75rem;">+</div>
                    <div class="shuiguo1" style="left:3rem;">
                        <img src="picture/03.png"  />
                        <span class="zs"></span>
                        <div class="shuoguoNum" ><?php echo $cfg['cost_bili']*100*$lvl; ?></div>
                        <input type="hidden" class="tConId" value="0">
                        <input type="hidden" class="tId" value="diamond">
                        <input type="hidden" class="tTable" value="Member">
                        <input type="hidden" class="tMyCount" value="147339">
                        <input type="hidden" class="tConCount" value="<?php echo $cfg['cost_bili']*100; ?>">
                        <input type="hidden" value="0,Member">
                    </div>            </div>        </li>
    </ul>
</div>

<!--操作弹出-->
<!--播种-->
<div class="bozhongAlert animated">
    <div class="remove animated"></div>
    
	<p style="width:3.2rem;left:1.5rem;">播种需要<span class="plantNeed"><?php echo ($cfg["config_till_price"]); ?>金币<?php echo ($cfg["config_seed_count"]); ?>种子</span></p>
    <div class="bozhongYes animated"></div>
    <input type="hidden" class='landNum' value=''>
</div>

<!--铲除-->
<div class="chanchuAlert animated">
    <div class="remove animated"></div>
    <div class="chanchuYes animated"></div>
    <input type="hidden" class='clandNum' value=''>
</div>

<!--施肥-->
<div class="shifeiAlert animated">
    <div class="remove animated"></div>
    <div class="shifeiYes animated"></div>
</div>
	<!-- 收割-->
<div class="shougeAlert animated">
	<div class="remove animated"></div>

	<p style="width:3.2rem;left:1.5rem;">收割第 <span class="getPlant"></span> 块地农作物</span></p>
	<div class="shougeYes animated"></div>
	<input type="hidden" class='slandNum' value=''>
</div>
<!--信息-->
<div class="xinxiAlert animated bounceIn" style="display: none;">
    <div class="remove animated"></div>

    <span class="jindu_crops" style="text-align: center;"></span>
    <p class="jindu_jd"></p>
    <p class="jindu_info"></p>
    <div class="jindu_whb">
        <div class="whb" style="width: 22.1414%;"></div>
    </div>
</div>


<!--测试-->
<div id="iconImgBox"></div>


<!--宠物信息-->
<div class="sico_chongwu_Box animated bounceIn" style="display: none;">
    <div class="remove animated"></div>
    <ul class="sico_chongwu_List">
        <li>
                <img src="/picture/595a18338b323.png" alt="">
                <img class="yesG" src="/Public/gold/img/index/ggggg.png" alt="" style="width:0.5rem; height:0.4rem; position: absolute;top:1.6rem; left:1.6rem; z-index: 9;visibility: visible;">
                <p id="cw_name"></p>
                <p id="cw_pingfen"></p>
                <p id="cw_luck"></p>
                <p id="cw_speed"></p>
                <p id="cw_attak"></p>
                <p id="cw_defense"></p>
                <div class="sico_chongwuJD1"><div style="width: <?php echo ($cw_tili_t); ?>%;"></div></div>
                <div class="sico_chongwuJD2"><div style="width: <?php echo ($cw_jinyan_t); ?>%;"></div></div>
                <input type="hidden" class="petId" value="28">
                <input type="hidden" class="petStatus" value="1">
				<button class="dqpet" style="display:; width:1.15rem; height:0.55rem; background: url(/Public/gold/img/index/dq.png);
				background-size:cover; position:absolute; top: 2rem; right:1rem;"></button>
            </li>
        <!--<li>
                <img src="/Public/gold/img/index/add_chongwu/xiongmaotou.png" alt="" />
                <img src="/Public/gold/img/index/ggggg.png" alt="" style="width:0.5rem; height:0.4rem; position: absolute;top:1.6rem; left:1.6rem; z-index: 9;" />
                <p>狗狗</p>
                <p>123123</p>
                <p>10</p>
                <p>10</p>
                <p>2~5</p>
                <p>12</p>
                <div class="sico_chongwuJD1"><div></div></div>
                <div class="sico_chongwuJD2"><div></div></div>
        </li>
        <li>
                <img src="/Public/gold/img/index/add_chongwu/xiongmaotou.png" alt="" />
                <img src="/Public/gold/img/index/ggggg.png" alt="" style="width:0.5rem; height:0.4rem; position: absolute;top:1.6rem; left:1.6rem; z-index: 9;" />
                <p>石像</p>
                <p>123123</p>
                <p>10</p>
                <p>10</p>
                <p>2~5</p>
                <p>12</p>
                <div class="sico_chongwuJD1"><div></div></div>
                <div class="sico_chongwuJD2"><div></div></div>
        </li>-->
    </ul>
</div>
<div id="tips"></div>
</body>
<script>
window.onload=function(){

    setTimeout(function(){
        $("#load").hide();
    },300);
}
</script><?php endforeach; endif; ?>
<div style="display:none;">


</div>
</html>