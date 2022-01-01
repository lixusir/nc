<?php
//��� 
class SlvmallAction extends Action {
	
	
	//�����
	public function index(){
	
	    $db = M('slvmall');
        $where = array('userid'=>session('uid'));       
        $info = $db->where($where)        
       
        ->select();
        $this->assign('info',$info);        
        $this->display();		
		}
		
//�̳Ƕһ�ִ��	
	public function duihuan(){  	
	
	$aa=M("userlist");	
	$where = array('userid' => session('uid'));
	$info = $aa->where($where)->find();	
	if($info['zfb']==0 || $info['weixin']==0 ){
		$arr['r']='0';
	    $arr['rd']='请先设置收款帐号';		   	
	}else{
	//echo $info['weixin'];exit;
	
	//ajax
	if(IS_GET)
        {
            $p2=$_GET["p2"];	
			$n2=$_GET["n2"];
            $m2=$_GET["m2"];
            $e2=$_GET["e2"];				
			$p2=I('p2');	
			$n2=I('n2');
			$m2=I('m2');
			$e2=I('e2');
			
        }
		if($e2==1){
			$zt='未支付';
			$rd='提现成功！';
		}else{
			$zt='未发货';
			$rd='兑换成功！';
		}
		
		$money=$n2/10000;

		if($p2==null || $n2==null || $m2==null || $e2==null){
		$arr['r']='1';
	    $arr['rd']='出现错误，请联系管理员';	
	  
		}
	
	  if ($info['zong_zhuanshi'] - $n2 < 0){
	  $arr['e']='0';
	  $arr['rd']='钻石不足';
      $this->ajaxReturn($arr,'JSON');
      exit;	  
	  }else{
	   $data = array(
            'zong_zhuanshi' => $info['zong_zhuanshi']-$n2,                 
            );
        $aa->data($data)->where($where)->save();
		$arr['r']='1';
		$arr['rd']=$rd;        
	  }
	   //写入提现表
	  $bb=M("tixian");
	  $where2 = array('userid' => session('uid'));
	  $info2 = $bb->where($where2)->find();	
	  $data2 = array(
	        'type' => $p2, 
	        'type2' => $e2, 
			'cost' => $n2,
	        'good_name' => $m2, 
            'userid' => session('uid'), 
			'username' => session('username'),
			'dh_time' => date("Y-m-d H:i:s"),
			'zt' => $zt,
			'weixin' => $info['weixin'],
			'zfb' => $info['zfb'],
			'good_id' => $p2,
			'money' => $n2/10000,
			'ok_time' =>date("Y-m-d H:i:s")               
            );
        $bb->data($data2)->where($where2)->add();
		//д�빫��		 
	  $cc=M("kuanglist");	 
	  $data3 = array(
            'userid' => session('uid'), 
			'username' => session('username'),
			'record' => "提现了'$money'元",			
			'time' =>date("Y-m-d H:i:s")               
            );
			$cc->data($data3)->add();
	}  //判断收款帐号是否为空结束。
	
    	
    $this->ajaxReturn($arr,'JSON');
	
			$this->display();
		
    //$this->display();	
	}
	//���ּ�¼
	//�����
	public function txinfo(){
	
	    $db = M('tixian');
        $where = array('userid'=>session('uid'));       
        $info = $db->where($where)
		->order('dh_time desc')
        ->select();
        $this->assign('info',$info);        
        $this->display();		
		}

		public function gettxinfo(){
	
	  $aa=M("tixian");
	  $where = array('userid' => session('uid'));
	  $info = $aa->where($where)->find();	
      if($info['zt']=='no'){
	  $arr['r']='0';
	  }else{
	  $arr['r']='1';
	  }
	    $this->ajaxReturn($arr,'JSON');
		if(check_sq(1)){
			$this->display();
		}else{
			$this->check_sq();
		}		
        //$this->display();
          }
	
	
}
?>