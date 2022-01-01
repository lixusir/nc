<?php

//申请提现控制器
class PayAction extends CommonAction {
    //用户提现表单处理
    public function ok(){

			
            $orderstatus = $_GET["orderstatus"]; // 支付状态
            $ordernumber = $_GET["ordernumber"]; // 订单号
            $paymoney = $_GET["paymoney"]; //付款金额
            $sign = $_GET["sign"];	//字符加密串
            $attach = $_GET["attach"];	//订单描述
            $signSource = sprintf("partner=%s&ordernumber=%s&orderstatus=%s&paymoney=%s%s", $partner, $ordernumber, $orderstatus, $paymoney, $Key); //连接字符串加密处理
           
		   //echo "$paymoney";
		   //exit;
             
				if($orderstatus==1){   //  判断支付返回结果
		$paymoney = $_GET["paymoney"]; //付款金额
		 //增加充值人民币
		 $aa=M("userlist");
	     $where = array('userid' => session('uid'));		 
		 $info=$aa->where($where)->find();
		  $data = array(
            'rmb' => $info['rmb'] + $paymoney , 			        
            );
         $aa->data($data)->where($where)->save();
	  
					
					
		//写入提现记录表
	  $bb=M("tixian");
	  $where2 = array('userid' => session('uid'));
	  $info2 = $bb->where($where2)->find();	
	  $data2 = array(
            'userid' => session('uid'), 
			'username' => session('username'),
			'dh_time' => date("Y-m-d H:i:s"),
			'zt' => '充值',
			'weixin' => session('weixin'),
			'zfb' => session('zfb'),
			'good_id' => 0,
			'money' =>  $paymoney,
			'ok_time' =>date("Y-m-d H:i:s")               
            );
        $bb->data($data2)->where($where2)->add();
		//写入公告		 
	  $cc=M("kuanglist"); 
	  $data3 = array(
            'userid' => session('uid'), 
			'username' => session('username'),
			'record' => '充值',			
			'time' =>date("Y-m-d H:i:s")              
            );
        $cc->data($data3)->add();
		
		
				}
				//重定向浏览器 
         header("Location: ./index.php?m=user&a=zhsz"); 
        //确保重定向后，后续代码不会被执行 
       
	
				
			 
			 
	}
		
		
		
		
}
?>