<?php

require_once("pay_config.php");

			$partner = $partner['partner'];//商户ID
            $Key = $Key['key'];//商户KEY
			
            $orderstatus = $_GET["orderstatus"]; // 支付状态
            $ordernumber = $_GET["ordernumber"]; // 订单号
            $paymoney = $_GET["paymoney"]; //付款金额
            $sign = $_GET["sign"];	//字符加密串
            $attach = $_GET["attach"];	//订单描述
            $signSource = sprintf("partner=%s&ordernumber=%s&orderstatus=%s&paymoney=%s%s", $partner, $ordernumber, $orderstatus, $paymoney, $Key); //连接字符串加密处理
           
		   if ($sign == md5($signSource))//签名正确
            {
             
				if($orderstatus==1){   //  判断支付返回结果
					
					
					 $ip = "localhost";
                       $root = "kuang"
                       $mima = "thanks111"
                      $a = mysql_connect($ip, $root,$mima) or die ("你的数据库连接错误");
                      mysql_select_db($shujuku,$a);
                      mysql_query("set names 'utf-8'");  // 解决中文乱码
					  //加人民币
					  $strsql = "update userlist set rmb=rmb+'"$paymoney"' where userid = '"$session('uid')"'  ";
                      $result = @mysql_query($strsql);
					  //增加动态
					  $strsql = "insert into kuanglist(userid,username,record,time) values('"session('uid')"','"session('username')"','充值了"$paymoney"元','"date('y-m-d h:i:s')"')";
                      $result = @mysql_query($strsql);
					  
					  
					
					//$this->redirect('./index.php?m=pay&a=ok');
				} 
	
				else if ($orderstatus<>1){
					$nddzt="支付失败";
					$imgurl="pay-error.png";
				} 
			 
			 
            }
			
			else {
			//验证失败
			echo "验证失败";
			}


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>交易结果页面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 <!--此Js可控制页面自适应手机浏览器 **不可删**-->
    <script type="text/javascript">
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth/640;
        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)){
            var version = parseFloat(RegExp.$1);
            // andriod 2.3
            if(version>2.3){
                document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
                // andriod 2.3以上
            }else{
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
            // 其他系统
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>

    <!--此Js使手机浏览器的active为可用状态-->
    <script>
        document.addEventListener("touchstart", function(){}, true);
    </script>
	   

    <style type="text/css">
<!--
.STYLE4 {font-size: xx-large}
.STYLE5 {font-size: large}
-->
    </style>
</head>
<body id="weixin" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<div style="background-color: white; padding-top:50px; padding-bottom:10px;" align="center">
  <span class="STYLE4"><?php echo $nddzt; ?></span>
  <div class="STYLE5" id="header">商户订单号：<?php echo $ordernumber; ?> </div>
<p class="STYLE5">交易金额：<font color=red><b><?php echo $paymoney; ?></b></font> 元</p>
</div>
<div style="margin-top:10px;" align="center">
<img src="style/images/<?php echo $imgurl; ?>">
</div>
</body>
</html>