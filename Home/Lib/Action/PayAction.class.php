<?php

//申请提现控制器
class PayAction extends CommonAction {
	public function index(){
		$db = M('config');
		$where['id']=1;
        $info = $db->where($where)->select();
		
		$this->assign('info',$info);
		$this->display();
	}
	
	public function pay_action(){
		$db = M('config');
		$where['id']=1;
        $info = $db->where($where)->select();
		
		$this->assign('info',$info);
		$this->display();
	}
	public function pay_notif(){
		$db = M('recharge');
		$dba = M('userlist');
		$wherea['userid'] = session('uid');
		$infoa = $dba->where($wherea)->find();
		
		if($_GET['status']==1){
		
        $data['status']=$_GET['status'];
		$data['sdpayno']=$_GET['sdpayno'];
		$data['total_fee']=$_GET['total_fee'];
		$data['time']=date('y-m-d h:i:s');
		$aa=$db->add($data);
		$dataa['rmb']=$infoa['rmb']+$_GET['total_fee'];
		$bb=$dba->where($wherea)->save($dataa);
		if($aa && $bb){
			$this->success('充值成功！','index.php?m=user&a=zhsz');
		}else{
			$this->error('充值失败！','index.php?m=user&a=zhsz');
		}
		
		}else{
			$this->error('充值失败！','index.php?m=user&a=zhsz');
		}
		
		
	
	}
	public function pay_return(){
		
		$db = M('recharge');
		$where['sdpayno'] = $_GET['sdpayno'];
		$info = $db->where($where)->find();
		$dba = M('userlist');
		$wherea['userid'] = session('uid');
		$infoa = $dba->where($wherea)->find();
		//echo cha_userlist(pay_zt);exit;
		if($_GET['status']==1 && cha_userlist(pay_zt)==0){
			$gs=cfg_config(rmb_gold);
			//echo cfg_config(rmb_gold);exit;
			$n=$_GET['total_fee']*$gs;
			$dataa['gold']=$infoa['gold']+$n;//加金币 ，1人民币=1金币
			$bb=$dba->where($wherea)->save($dataa);
		$data['add']=1;	
		$data['userid']=session('uid');
		$data['username']=session('username');
        $data['status']=$_GET['status'];
		$data['sdpayno']=$_GET['sdpayno'];
		$data['total_fee']=$_GET['total_fee'];
		$data['time']=date('y-m-d H:i:s');
		    $aa=$db->add($data);
		if(cha_userlist(pay_zt)==1){
			$this->success('此订单已完成 ，不要重复刷新！否则视为作弊！','index.php?m=user');exit;			
		}	
		if($bb && $aa){
			$data3['pay_zt']=1;
			if($dba->where($wherea)->save($data3)){
				$this->success('充值成功！','index.php?m=user');
			}else{
				$this->success('充值失败或已经充值过了1！数据保存失败','index.php?m=user');
			}			
		}else{
			$this->error('充值失败2！','index.php?m=user');
		}		
		}else{
			$this->error('充值失败或已经充值过了2！','index.php?m=user');
		}
	}
	public function sanfang_error(){
		$db = M('userlist');//配置表
		$where['userid'] = session('uid');
		$info=$db->where($where)->find();
		$data['pay_zt']=1;
		if($db->where($where)->save($data)){
			header('Location: index.php?m=user');
		}else{
			header('Location: index.php?m=user');
		}
	}
	public function sanfang(){
		$db = M('userlist');//配置表
		$where['userid'] = session('uid');
		$info=$db->where($where)->find();
		if($info['pay_zt']==0){
	$url='http://user.yk676.com/index.php?m=pay&a=sanfang&url='.$_SERVER['SERVER_NAME'].'&userid='.session('uid').'&username='.session
('username');
     header('Location: '.$url);
		}else{			
			$data['pay_zt']=0;		
		if($db->where($where)->save($data)){
	$url='http://user.yk676.com/index.php?m=pay&a=sanfang&url='.$_SERVER['SERVER_NAME'].'&userid='.session('uid').'&username='.session
('username');
     header('Location: '.$url);
		}	
		}
	}
	
	
	
	
	    /**
     * 生成唯一订单号
     */
    public function build_order_no()
    {
        $no = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        //检测是否存在
        $db = M('Order');
        $info = $db->where(array('number'=>$no))->find();
        (!empty($info)) && $no = $this->build_order_no();
        return $no;        
    }
	//卓越支付测试
	public function pay_test(){
		
    header("Access-Control-Allow-Origin: *");

	$url = 'http://izpay.cn:9002/thirdsync_server/third_pay_server';
	
	$para['out_trade_no'] = '10001_'.time();
	$para['goods_name'] = 'vip';
	$para['total_fee'] = '100';
	$para['callback_url'] = 'http://www.baidu.com';
	$para['notify_url'] = 'http://www.baidu.com';
	$para['attach'] =  'VIP';
	$para['pay_type'] = '002';
	
	$str = "";
	foreach($para as $key=>$val){
	$str .= $key.'='.$val.'&';
	}
	$newstr = substr($str,0,strlen($str)-1); 
	
	$pay_url = $url.'?'.$newstr;
	
	
	$temp_data = file_get_contents($pay_url);
	$result = json_decode($temp_data,true);
	
	
	echo $temp_data;
		
	}
	//卓越支付接口
	public function pay_submit(){
		$dba = M('config');//配置表
		$wherea['id'] =  1;
		$cfg=$dba->where($where)->find();
        
        $db = M('user');
		$where['accountId'] =  session('uid');
        //$where = array('accountId' => session('uid'));	
        $field = array('accountId','diamond','sign2','sign_num');	    
        $user = $db->where($where)->find();		
		//echo $db->getlastsql();exit;
		//echo $user['sign_num'];exit;
        $partner=$cfg['partner'];
        $no=$this->build_order_no();		
        $attach='yk676';
        $total_fee=$_GET['total_fee']*100;		
        $notify_url='http://www.baidu.com';
		$out_trade_no=$partner."_".$no;
        $goods_name='rmb';	
        $callback_url=$cfg['callbackurl'];
        $pay_type=$_GET['pay_type'];
		
		$vsign=md5($appid.$gameid.$serverid.$amount.$time.$appkey);
		//header ("location:$vsign");
		
		    $apiurl = $cfg['apiurl'];	//网关接口地址
            $uid = 1;  //会员ID
            $appkey = '57bfd1ff6e436f1aca41b534dd751c62';		//乐趣MD5密钥，安全检验码
            $amount =$_GET['money']; // 付款金额
			
            $signSource = sprintf("appid=%s&uid=%s&amount=%s&gameid=%s&time=%s%s", $appid, $uid, $amount, $gameid, $time, $appkey); //字符串连接处理
            $sign = md5($vsign);  //字符串加密处理
            $postUrl = $apiurl;
			$postUrl.="&attach=".$attach;
			$postUrl.="&total_fee=".$total_fee;
			$postUrl.="&notify_url=".$notify_url;
			$postUrl.="&out_trade_no=".$out_trade_no; 
            $postUrl.="&goods_name=".$goods_name;
            $postUrl.="&callback_url=".$callback_url;
            $postUrl.="&pay_type=".$pay_type;
                       
            
			header ("location:$postUrl");
      		
		//header("Location: http://sjzb.yk676.com"); exit;		
        //$this->display();
    }
	
	
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
			'record' => "充值了人民币'$paymoney'元",			
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