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
				$paymoney = $_GET["paymoney"]; //付款金额
				//session('paymoney', $paymoney);
					
				header("Location: http://yk676.com/index.php?m=pay&a=ok&paymoney=1&orderstatus=1 ");

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
