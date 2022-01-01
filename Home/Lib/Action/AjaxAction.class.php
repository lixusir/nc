<?php


//会员中心控制器
class AjaxAction extends CommonAction {
	
	

 
    public function Get_user() {
	$dbc=M("config");	
	$wherec['id'] =1;
	$infoc=$dbc->where($wherec)->find();
	//echo $infob['ktsj'];exit;
	
	$db=M("userlist");
    $where = array('userid' => session('uid'));
    $info=$db->where($where)->find();
	$s=$db->where($where)->find();
	
	
	//检测是否签到
	$dba=M("sign_record");
	$wherea['time']=date('y-m-d');
	$wherea = array('userid' => session('uid'));
	$infoa=$dba->where($wherea)->find();
	//echo $infoa['userid'];exit;

    $is=M('sign_record')->where(array('userid' => session('uid')))->order('time desc')->find();//以留言时间排列
	$jt=strtotime(date('Y-m-d',date('y-m-d h:i:s')).' 00:00:00');//现在的时间
    $jt2=strtotime(date('Y-m-d',$info['sign_time']).' 00:00:00');//签到的时间
	
	$sign_time=strtotime($info['sign_time']);
    $jt3=strtotime(date('Y-m-d',time()).' 00:00:00');
	
	$d   =  $info['tiektime'];
	$test=date("Y-m-d h:i:s",strtotime("$d   +3   hour"));	
	
	$jt4=strtotime(date('y-m-d H:i:s'));//现在时间
    $jt5=strtotime($test);//收矿时间	+3小时
	$cha=$jt4-$jt5;
	
	if($info['sy1'] <= 0){
		$data['kc1']=0;
		$data['zong_lv']=$info['zong_lv']-1;
		$data['sy1']=39000;
	}
	if($info['sy2'] <=0){
		$data['kc2']=0;
		$data['sy2']=130000;
		$data['zong_lv']=$info['zong_lv']-1;
	}
	if($info['sy3'] <=0){
		$data['kc3']=0;
		$data['sy3']=390000;
		$data['zong_lv']=$info['zong_lv']-1;
	}
	if($info['sy4'] <=0){
		$data['kc4']=0;
		$data['sy4']=650000;
		$data['zong_lv']=$info['zong_lv']-1;
	}
	if($info['sy5'] <=0){
		$data['kc5']=0;
		$data['sy5']=1300000;
		$data['zong_lv']=$info['zong_lv']-1;
	}
	if($info['sy6'] <=0){
		$data['kc6']=0;
		$data['sy6']=2000000;
		$data['zong_lv']=$info['zong_lv']-1;
	}
	if($info['sy7'] <=0){
		$data['kc7']=0;
		$data['sy7']=3000000;
		$data['zong_lv']=$info['zong_lv']-1;
	}
	if($info['sy8'] <=0){
		$data['kc8']=0;
		$data['sy8']=5000000;
		$data['zong_lv']=$info['zong_lv']-1;
	}	
		
	
	
     $db->where($where)->save($data); // 根据条件更新记录
	
			 //算出挖矿相隔的秒数
//PHP计算两个时间差的方法 
     $startdate1=$info['lqtime1'];
     $startdate2=$info['lqtime2'];
	 $startdate3=$info['lqtime3'];
	 $startdate4=$info['lqtime4'];
	 $startdate5=$info['lqtime5'];
	 $startdate6=$info['lqtime6'];
	 $startdate7=$info['lqtime7'];
	 $startdate8=$info['lqtime8'];

     $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate1))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate1))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate1))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate1))%86400%60);
     $lqtime1=$date*86400+$hour*3600+$minute*60+$second;
     //echo $tiektime1;exit;
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate2))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate2))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate2))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate2))%86400%60);
     $lqtime2=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate3))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate3))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate3))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate3))%86400%60);
     $lqtime3=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate4))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate4))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate4))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate4))%86400%60);
     $lqtime4=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate5))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate5))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate5))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate5))%86400%60);
     $lqtime5=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate6))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate6))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate6))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate6))%86400%60);
     $lqtime6=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate7))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate7))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate7))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate7))%86400%60);
     $lqtime7=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate8))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate8))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate8))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate8))%86400%60);
     $lqtime8=$date*86400+$hour*3600+$minute*60+$second;
      
     $bei=$info['kuangchu_num']*1;
	   if($bei==0){
		   $bei=1;
	   }
	   if($bei>=8){
		   $bei=8;
	   }	  
//计算出挖矿数量
       if ($lqtime1>= 86400) {       
       $clzs1=0;
	   $clzs2=0;
	   $clzs3=0;
	   $clzs4=0;
	   $clzs5=0;
	   $clzs6=0;
	   $clzs7=0;
	   $clzs8=0;
        }else{
            if($info['kc1']==1){$clzs1=  (int)39000/$infoc['huiben']/24/3600*$lqtime1;}else{$clzs1=0;}
			if($info['kc2']==1){$clzs2=  (int)130000/$infoc['huiben']/24/3600*$lqtime2;}else{$clzs2=0;}
			if($info['kc3']==1){$clzs3=  (int)390000/$infoc['huiben']/24/3600*$lqtime3;}else{$clzs3=0;}
			if($info['kc4']==1){$clzs4=  (int)650000/$infoc['huiben']/24/3600*$lqtime4;}else{$clzs4=0;}
			if($info['kc5']==1){$clzs5=  (int)1300000/$infoc['huiben']/24/3600*$lqtime5;}else{$clzs5=0;}
			if($info['kc6']==1){$clzs6=  (int)2000000/$infoc['huiben']/24/3600*$lqtime6;}else{$clzs6=0;}
			if($info['kc7']==1){$clzs7=  (int)3000000/$infoc['huiben']/24/3600*$lqtime7;}else{$clzs7=0;}
			if($info['kc8']==1){$clzs8=  (int)5000000/$infoc['huiben']/24/3600*$lqtime8;}else{$clzs8=0;}
        }
		//echo $jink;exit;
		if($info['kc1']==1){
			$j1=$clzs1;
		}
		if($info['kc2']==1){
			$j2=$clzs2 ;
		}
		if($info['kc3']==1){
			$j3=$clzs3 ;
		}
		if($info['kc4']==1){
			$j4=$clzs4 ;
		}
		if($info['kc5']==1){
			$j5=$clzs5 ;
		}
		if($info['kc6']==1){
			$j6=$clzs6 ;
		}
		if($info['kc7']==1){
			$j7=$clzs7 ;
		}
		if($info['kc8']==1){
			$j8=$clzs8 ;
		}
				
  //echo $j1;exit;		
		//更新数据
     $db=M("userlist");
	 $data['clzs1'] = $j1;
	 $data['clzs2'] = $j2;
	 $data['clzs3'] = $j3;
	 $data['clzs4'] = $j4;
	 $data['clzs5'] = $j5;
	 $data['clzs6'] = $j6;
	 $data['clzs7'] = $j7;
	 $data['clzs8'] = $j8;
     $db->where($where)->save($data); // 根据条件更新记录
  
	if($sign_time > $jt3){
       $data['sign']=1;
    }else{
       $data['sign']=0;
    }	
	$db->where($where)->save($data);
    $field = array('tiekz','jinkz','zhuanshi','lv','type','djcs','islogin','bdj','sunshi','machine','run');
    $obj = $db->where($where)->select();
    $arr = $db->where($where)->field()->find(); 
   
        if(!session('uid') or !session('username')){
          $arr['login']=0;  
        }		
         $this->ajaxReturn ($arr,'JSON');
         $this->display();
    }
	   
	   
         //激活矿机
		 public function activate_mine(){
			 $db=M("userlist");
             $where = array('userid' => session('uid'));
             $info = $db->where($where)->field('ati')->find();
			 $data['ati']=0;
			 $db->where($where)->field('ati')->save($data);
			 
		 }
		 //碎片兑换
		 public function loaddh(){
			$db=M("userlist");
          $where = array('userid' => session('uid'));
           $info=$db->where($where)->find(); 
		   if($info['sjsp']<100000){
			   $this->error('10万水晶碎片可换1万水晶');
		   }else{
			   $data['sjsp']=$info['sjsp']-100000;
			   $data['jinkz']=$info['jinkz']+10000;
			   $aa=$db->where($where)->save($data);
			   if($aa){
				   $this->error('兑换成功，增加水晶10000个');
			   }else{
				   $this->error('兑换失败');
			   }
		   }
			 
		 }
		 
		 //人民币换钻石	
	public function rmb_zhuanshi(){		
	$db=M("userlist");	
	$where = array('userid' => session('uid'));
	$info=$db->where($where)->find();
	if($info['rmb']<1){
		$this->error('人民币不足，请先充值');
	}else{
		$data['zhuanshi']=$info['zhuanshi']+$info['rmb']*10;
		if($db->where($where)->save($data)){
		$data['rmb']=0;	
		 if($db->where($where)->save($data)){
			 $this->success('兑换成功');
		 }else{
			 $this->success('兑换失败');
		 }
		}
	}
	
	}
	
	public function kk(){
     $id=I('post.id2');
	 if($id==1){
		 $cost=30;
	 }
	  if($id==2){
		 $cost=100;
	 }
	  if($id==3){
		 $cost=300;
	 }
	  if($id==4){
		 $cost=500;
	 }
	  if($id==5){
		 $cost=1000;
	 } 	
	  if($id==6){
		 $cost=1500;
	 }
	  if($id==7){
		 $cost=2000;
	 }
	  if($id==8){
		 $cost=3000;
	 }
	 $db=M("userlist");	
	 $db2=M("config");
     $where2['id']=1;
     $info2=$db2->where($where2)->find();	 
	 $where = array('userid' => session('uid'));
	 $info=$db->where($where)->find();
	 $cost=$info2['kk'.$id]*$info2['zs_bl'];
	 $zong_touzi=$info['touzi1']+$info['touzi2']+$info['touzi3']+$info['touzi4']+$info['touzi5']+$info['touzi6']+$info['touzi7']+$info['touzi8'];
	 if($info['kc'.$id] == 1 ){
		 $arr['r']=1;
	    $arr['rd']='不要重复开矿！';
		
	 }else{
		 
		 
     if($info['zong_zhuanshi'] < $cost ){	 
	 	$arr['r']=1;
	    $arr['rd']='钻石不足，需要'.$cost.'钻石！请充值';
	 }else{
		 $data['zong_zhuanshi']=$info['zong_zhuanshi']-$cost;
		 $data['kc'.$id]=1;
		 $data['kttime'.$id]=date('y-m-d h:i:s');
		 $data['kcnum']=$info['kcnum']+1;
		 $data['touzi'.$id]=$info['touzi'.$id]+$info2['kk'.$id];
		 $data['zong_lv']=$info['zong_lv']+$info2['tree_lx'.$id];
		 $arr['r']=0;
		 $arr['kcnum']=$info['kcnum']+1;
		 $arr['zong_lv']=$info['zong_lv']+1;
		 $arr['zong_touzi']=$zong_touzi.'元';
		 $arr['zs']=$info['zong_zhuanshi'];
		 $arr['rd']='开矿成功!扣除钻石'.$cost.'个';
	 }
	 }
	   $db->where($where)->save($data);
	   $this->ajaxReturn($arr,'JSON');
	   $this->display();
	 
	}
	
	public function beans(){
     $id=I('post.id2');
	 $db=M("userlist");	
	 $db2=M("config");
     $where2['id']=1;
     $info2=$db2->where($where2)->find();	 
	 $where = array('userid' => session('uid'));
	 $info=$db->where($where)->find();
	 //$cost=$info2['kk'.$id]*$info2['zs_bl'];
     $arr['r']=0;
	 $arr['kk'.$id]=$info2['kk'.$id];
	 $arr['touzi'.$id]=$info['touzi'.$id];
	  $db->where($where)->save($data);
	   $this->ajaxReturn($arr,'JSON');
	   $this->display();
	 
	}
    
 //收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿收矿
    public function get_shouyi() {
	  $id=I('post.id2');
	  //$id=$_GET['id2'];	  
	
	  $dbc=M("config");
     $wherec['id'] = 1;
      $infoc = $dbc->where($wherec)->find();	
	  //echo $infoc['sjchanliang'];exit;

	  $db=M("userlist");
      $where = array('userid' => session('uid'));	  
      $info = $db->where($where)->find(); 
	  

      $data['logtime'] = date("Y-m-d H:i:s"); 
      $db->where($where)->save($data); // 
	  
	 $startdate[$id]=$info['lqtime'.$id];
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate[$id]))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate[$id]))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate[$id]))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate[$id]))%86400%60);
     $lqtime[$id]=$date*86400+$hour*3600+$minute*60+$second;
	   $bei=$info['kuangchu_num']*1;
	   if($bei==0){
		   $bei=1;
	   }     
       if ($lqtime[$id]>= 86400) {
	   $clzs[$id]=0;
	   $data['lqtime'.$id] = date("Y-m-d H:i:s");
        }else{


            if($info['kc1']==1){$clzs[$id]=  (int)39000/$infoc['huiben']/24/3600*$lqtime1;}else{$clzs[$id]=0;}
			if($info['kc2']==1){$clzs[$id]=  (int)130000/$infoc['huiben']/24/3600*$lqtime2;}else{$clzs[$id]=0;}
			if($info['kc3']==1){$clzs[$id]=  (int)390000/$infoc['huiben']/24/3600*$lqtime3;}else{$clzs[$id]=0;}
			if($info['kc4']==1){$clzs[$id]=  (int)650000/$infoc['huiben']/24/3600*$lqtime4;}else{$clzs[$id]=0;}
			if($info['kc5']==1){$clzs[$id]=  (int)1300000/$infoc['huiben']/24/3600*$lqtime5;}else{$clzs[$id]=0;}
			if($info['kc6']==1){$clzs[$id]=  (int)2000000/$infoc['huiben']/24/3600*$lqtime6;}else{$clzs[$id]=0;}
			if($info['kc7']==1){$clzs[$id]=  (int)3000000/$infoc['huiben']/24/3600*$lqtime7;}else{$clzs[$id]=0;}
			if($info['kc8']==1){$clzs[$id]=  (int)5000000/$infoc['huiben']/24/3600*$lqtime8;}else{$clzs[$id]=0;}
	   
       $jb=$clzs[$id]*$info['bei']/100;	       
        }
		$fl=$clzs[$id]*$info['zong_lv'];
		//echo $jink;exit;	
        if($info['kc1']==0){
		 $arr['e']=1;
		 $arr['zs']=$clzs[$id];
		}		 
		 if($clzs[$id]<0){
		 $arr['e']=1;
		 $arr['zs']=$clzs[$id];
	    }else{	
         $db=M("userlist");		
      //$data['clzs'.$id] = $clzs[$id];		 
	 $data['lqtime'.$id] = date("Y-m-d H:i:s");
     $db->where($where)->save($data); // 根据条件更新记录
	 
	 $where3 = array('userid' => session('uid'));      
     $data2['zong_zhuanshi']=$info['zong_zhuanshi']+$clzs[$id]+$fl+$jb;	 
	 $db->where($where3)->save($data2);
	 
		 $arr['e']=0;
		 $arr['zs']=floor($clzs[$id]);
		 $arr['fl']=floor($fl);
		 $arr['kh']=floor($jb);
		}
  //echo $j[$id];exit;
     $this->ajaxReturn ($arr,'JSON');	
	 $this->display();		
    
 }
 
 
 //一键收矿一键收矿一键收矿一键收矿一键收矿一键收矿一键收矿一键收矿一键收矿一键收矿一键收矿一键收矿 
      public function yjsk() {
	//每天产量，配置读取
	  $dbc=M("config");
      $wherec['id'] = 1;
      $infoc = $dbc->where($wherec)->find();	  
	  //echo $infoc['sjchanliang'];exit;

	  $db=M("userlist");
      $where = array('userid' => session('uid'));	  
      $info = $db->where($where)->find(); 
	  
//更新用户登陆时间
      $data['logtime'] = date("Y-m-d H:i:s"); 
      $db->where($where)->save($data); // 根据条件更新记录
    
	 if($info['kc1']==0 && $info['kc2']==0 && $info['kc3']==0 && $info['kc4']==0 && $info['kc5']==0 && $info['kc6']==0 && $info['kc7']==0 && $info['kc8']==0){
		$e=1; 
		$arr['rd']="亲，您还没开通矿场，请先开通";
	 }else{
		 $e=0;
	 }
     if($info['yjsk']==0){
		 $e=1;
		 $arr['rd']="亲，您还没开通一键收矿服务";
	 }else{
		 $e=0;
		 
		 //算出挖矿相隔的秒数
//PHP计算两个时间差的方法 
     $startdate1=$info['lqtime1'];
     $startdate2=$info['lqtime2'];
	 $startdate3=$info['lqtime3'];
	 $startdate4=$info['lqtime4'];
	 $startdate5=$info['lqtime5'];
	 $startdate6=$info['lqtime6'];
	 $startdate7=$info['lqtime7'];
	 $startdate8=$info['lqtime8'];

     $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate1))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate1))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate1))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate1))%86400%60);
     $lqtime1=$date*86400+$hour*3600+$minute*60+$second;
     //echo $tiektime1;exit;
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate2))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate2))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate2))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate2))%86400%60);
     $lqtime2=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate3))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate3))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate3))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate3))%86400%60);
     $lqtime3=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate4))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate4))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate4))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate4))%86400%60);
     $lqtime4=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate5))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate5))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate5))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate5))%86400%60);
     $lqtime5=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate6))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate6))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate6))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate6))%86400%60);
     $lqtime6=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate7))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate7))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate7))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate7))%86400%60);
     $lqtime7=$date*86400+$hour*3600+$minute*60+$second;
	 
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate8))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate8))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate8))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate8))%86400%60);
     $lqtime8=$date*86400+$hour*3600+$minute*60+$second; 
	  $bei=$info['kuangchu_num']*1;
	   if($bei==0){
		   $bei=1;
	   }
	   if($bei>=8){
		   $bei=8;
	   }

//计算出挖矿数量
       if ($lqtime1>= 86400) {       
       $clzs1=0;
	   $clzs2=0;
	   $clzs3=0;
	   $clzs4=0;
	   $clzs5=0;
	   $clzs6=0;
	   $clzs7=0;
	   $clzs8=0;
        }else{
			if($info['kc1']==1){$clzs1=  (int)39000/$infoc['huiben']/24/3600*$lqtime1;}else{$clzs1=0;}
			if($info['kc2']==1){$clzs2=  (int)130000/$infoc['huiben']/24/3600*$lqtime2;}else{$clzs2=0;}
			if($info['kc3']==1){$clzs3=  (int)390000/$infoc['huiben']/24/3600*$lqtime3;}else{$clzs3=0;}
			if($info['kc4']==1){$clzs4=  (int)650000/$infoc['huiben']/24/3600*$lqtime4;}else{$clzs4=0;}
			if($info['kc5']==1){$clzs5=  (int)1300000/$infoc['huiben']/24/3600*$lqtime5;}else{$clzs5=0;}
			if($info['kc6']==1){$clzs6=  (int)2000000/$infoc['huiben']/24/3600*$lqtime6;}else{$clzs6=0;}
			if($info['kc7']==1){$clzs7=  (int)3000000/$infoc['huiben']/24/3600*$lqtime7;}else{$clzs7=0;}
			if($info['kc8']==1){$clzs8=  (int)5000000/$infoc['huiben']/24/3600*$lqtime8;}else{$clzs8=0;}
        }
		//echo $jink;exit;
		$jb=$j*$info['bei']/100;
	   $j=floor($clzs1+$clzs2+$clzs3+$clzs4+$clzs5+$clzs6+$clzs7+$clzs8+$jb);	   
	   $fl=$j * $infoc['zong_lv'];
	   //echo $fl;exit;
		
//更新数据
     $db=M("userlist");	     
     $data['lqtime1'] = date("Y-m-d H:i:s");
	 $data['lqtime2'] = date("Y-m-d H:i:s");
	 $data['lqtime3'] = date("Y-m-d H:i:s");
	 $data['lqtime4'] = date("Y-m-d H:i:s");
	 $data['lqtime5'] = date("Y-m-d H:i:s");
	 $data['lqtime6'] = date("Y-m-d H:i:s");
	 $data['lqtime7'] = date("Y-m-d H:i:s");
	 $data['lqtime8'] = date("Y-m-d H:i:s");
	 $data['sy1'] = $info['sy1']-$clzs1;
	 $data['sy2'] = $info['sy2']-$clzs2;
	 $data['sy3'] = $info['sy3']-$clzs3;
	 $data['sy4'] = $info['sy4']-$clzs4;
	 $data['sy5'] = $info['sy5']-$clzs5;
	 $data['sy6'] = $info['sy6']-$clzs6;
	 $data['sy7'] = $info['sy7']-$clzs7;
	 $data['sy8'] = $info['sy8']-$clzs8;
     $data['j'] = $j;	 
	 $data['tiekz'] = $info['tiekz']+$j+$fl;
     $db->where($where)->save($data); // 根据条件更新记录
	 }
	
 //插入新公告
          if($j > 0){
            $data = array(
            'userid' => session('uid'),
            'username' => session('username'),
			'tiek' => $j,
			//'jink' => $jink,
            'record' =>  '收获了',            
            'time' => date("Y-m-d H:i:s"),
            );
        M('Kuanglist')->data($data)->add();
		$e=0;
		
		$arr['rd']="收获矿石".$j.""; 
		if($fl>0){
		$arr['rd']="收获矿石".$j."个，复利+".$fl;	
		}
		if($jb>0){
		$arr['rd']="收获矿石".$j."个，矿镐额外加成+".$jb;	
		}
		if($jb>0 && $fl>0){
		$arr['rd']="收获矿石".$j."个，复利+".$fl."矿镐+".$jb;	
		}
		
		$arr['sy1']=floor($info['sy1']-$clzs1);
		$arr['sy2']=floor($info['sy2']-$clzs2);
		$arr['sy3']=floor($info['sy3']-$clzs3);
		$arr['sy4']=floor($info['sy4']-$clzs4);
		$arr['sy5']=floor($info['sy5']-$clzs5);
		$arr['sy6']=floor($info['sy6']-$clzs6);
		$arr['sy7']=floor($info['sy7']-$clzs7);
		$arr['sy8']=floor($info['sy8']-$clzs8);
		  }else{
			$e=1;
 			$arr['rd']="亲！还没挖到矿呢。";
		  }

    $arr['e']=$e;
    
    $this->ajaxReturn ($arr,'JSON');	
	$this->display();
	}
 
  public function plunder(){
	  
			$this->display();
		
	  //$this->display();
  }
  //每日签到
  public function sign(){
	  //检测是否签到
	$db=M("sign");
	$where = array('userid' => session('uid'));
	$info=$db->where($where)->find();
	//矿场表
	$dba=M("Userlist");
	//随机加矿石
	$tiek=rand(1,500);
	$jink=rand(1,400);
	$wherea = array('userid' => session('uid'));
	$infoa=$dba->where($wherea)->select();
	if($infoa['sign']==0){
		$data['sign']=1;
		$data['tiekz']=$info['tiekz']+$tiek;//加铁矿
		$data['tiekz']=$info['jinkz']+$jink;//加水晶
		$data['sign_time']=date('y-m-d h:i:s');
		$aa=$dba->where($wherea)->data($data)->save();
		//记录到签到表    	
      $dbc=M("config");	//签到奖励表配置
	  $sign_jl=$dbc->where(1==1)->find();
	   $dbb=M("sign_record");
	   $whereb = array('userid' => session('uid'));
	   $datab['userid']=session('uid');
	   $datab['username']=session('username');
	   $datab['reward']=$sign_jl['sign_jl'];
	   $datab['note']='签到';
	   $datab['time']=date('y-m-d h:i:s');
	   $ab=$dbb->data($datab)->add();
	   if($aa && $ab){
		   $this->success('签到成功');
	   }else{
		  $this->error('签到失败'); 
	   }
	}else{
		$this->error('今日已经签到了，明天再来！');
	}
	
	
	
	
  }
  public function loadplunder(){
	  $d=$_GET['d'];
	  //配置表
	$dbb=M("config");
	$whereb['id']=1;
	$infob=$dbb->where($whereb)->find();
	  //被打劫会员表
	$db=M("Userlist");
	$where['userid'] != session('uid');	//对方的
	$wherea['userid'] = session('uid');	//自己的
	$info = $db->where($where)->limit(1)->order('rand()')->find();//对方的
	$infoa = $db->where($wherea)->find();//自己的
	  //BOSS的机率
	  $boss=rand(0,100);
	  if($boss==$infob['boss_num']){
		  $uid=0;//是BOSS
	  }else{
		  $uid=$info['userid'];
	  }
	  if($info['type']=='矿工'){
		  $juese='0';
	  }
	  if($info['type']=='矿头'){
		  $juese='1';
	  }
	  if($info['type']=='矿长'){
		  $juese='2';
	  }
	  if($info['type']=='矿老板'){
		  $juese='3';
	  }
	  if($infoa['djcs']<1){
		  $arr['e']=1;//体力不足
	  }else{
		  $arr['e']=0;
		  //被打劫信息
		  $arr['uid']=$uid;
		  //$arr['uid']=$info['username'];//矿主名
		  $arr['tks']=$info['tiekz'];
		  $arr['shuijing']=$info['jinkz'];
		  $arr['zuanshi']=$info['zhuanshi'];
		  $arr['juese']=$juese;
	  }
	  
	  $this->ajaxReturn($arr,'JSON');
	  
			$this->display();
		
	  //$this->display();
  }
  
 //打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫打劫
    public function actionplunder() {
	//自己的会员表
	$id=$_GET['id'];	
	$aa=M("Userlist");
	$whereaa = array('userid' => session('uid'));
	$info = $aa->where($whereaa)->find();
	//配置表
	$bb=M("config");
	$whereb['id'] = 1;
	$infob = $bb->where($whereb)->find();
	$djnum=$info['dj_lvl']*1000/4;	
	//随机矿石，水晶
     $djks=rand(1,$djnum);	
	 //$djsj=rand(1,$info['dj_lvl']*100);	      	 
	 if($info['dj_lvl']>=$infob['dj_yessjsp']){//水晶碎片
		 $sjsp=rand(1,$djnum/20);
	 }else{
		 $sjsp=0;
	 }
	 if($info['dj_lvl']>=$infob['dj_yessj']){//水晶
		 $djsj=rand(1,$djnum/50);
	 }else{
		 $djsj=0;
	 }
	 //echo $djnum;exit;
	$tiekz=$info['tiekz'] + $djks;
	//被打劫会员表
	$db=M("Userlist");
	$where['userid'] != session('uid');	
	$rebate = $db->where($where)->limit(1)->order('rand()')->find();
	$tks=$rebate['tiekz'];
	$shuijing=$rebate['jinkz'];
	$zuanshi=$rebate['zhuanshi'];
	$fang=$rebate['dj_lvl']*10;//对方防御
     $pof=$fang/$info['dj_lvl']*10;//破防：对方防御/自己的防御	
	if($pof>1){
		$pof=1;
	}else{
		$pof=$fang/$info['dj_lvl']*10;//破防：对方防御/自己的防御
	}
	$djks=rand(1,$djnum-$fang);
	if($info['djcs']<1){
		$arr['e']=1;  //体力不足
		$this->ajaxReturn ($arr,'JSON');
         $this->display();
		 exit;
		}else{//以下是有体力了，执行
	if ($rebate['userid']){
		
		//算出被别人打劫的间隔时间
    $currentTime=date("Y-m-d H:i:s");//当前时间  
     $bdj_lasttime = $db->where($where)->select();
    $a=strtotime($bdj_lasttime);  
    $bdj_lasttime2=$currentTime - $a;
    
//如果被打劫时间大于1这时，相隔1天以上则，打劫次数=1，否则打劫+1,更新被打劫
    if ($bdj_lasttime2 < 86400*365) {
	        $data1 = array(
            'dajienum2' => $rebate['dajienum2'] + 1 ,
            'sunshi' => $rebate['sunshi'] + $djks,  			
			'bdj_lasttime' => date("Y-m-d H:i:s"),  
			'tiekz' => $rebate['tiekz'] - $djks,
			'dj_nengliang'=>$rebate['dj_nengliang']-10,//减去被打劫的能量
            );
			 $db->where($where = array('userid' => $rebate['userid']))->data($data1)->save();    //更新数据	
			}
			

		//打劫任务
		if ($info['dajie_next'] < 6){
		$data3['dajie_next'] = $info['dajie_next'] + 1;
		$aa->data($data3)->save();
		}
		//更新进攻者的数据
		$jg=M("Dajielist");
		$wherejg = array('userid' => session('uid'));
		$infojg = $jg->where($wherejg)->select();
		$datajg['jg_time']=date("Y-m-d H:i:s");
		//更新打劫数据表
		$jg->data($datajg)->save();
		$datajg = array(
            'jg_userid' => session('uid'),
			 'jg_name' => session('username'),	
			  'jg_ksnum' => $djks,	
			  'dj_sjsp' => $sjsp,
			  'dj_sj' => $djsj,
			   'dj_userid' => $rebate['userid'],	
			   'dj_name' => $rebate['username'],
			   'jg_time' => date("Y-m-d H:i:s"),				         
            );
            $jg->data($datajg)->add();
	     //插入公告
		 $datagg = array(
            'userid' => session('uid'),
            'username' => session('username'),
            'record' => '打劫了'.$info['userid'].'会员',
            'tiek' => $djks,
            'time' => time()
            );
        M('Kuanglist')->data($datagg)->add();	            
		  		
		   if($info['dj_jy']/1000 > $info['dj_lvl']){	
                //更新打劫级别
			$dataj['tiekz']=$info['tiekz'] + $djks;
			$dataj['djcs']=$info['djcs'] - 1;		 
		    $dataj['dj_jy']=0;//经验清0
		    $dataj['dj_lvl']=$info['dj_lvl']+1;//
			   $prlev=$info['dj_lvl'];
		   }else{
			   $dataj['tiekz']=$info['tiekz'] + $djks;
			   $dataj['djcs']=$info['djcs'] - 1;	
			   $dataj['dj_jy']=$info['dj_jy']+$djks;//加经验
			   $prlev=0;
		   }
		   $aa->where($whereaa)->data($dataj)->save();//更新
		   	//如果打劫成功给自己加矿石
	
		  
		  $arr['e']=0;
		  $arr['dj_jy']=$info['dj_jy'];
		  $arr['dj_lvl']=$info['dj_lvl'];
          $arr['djks']=$djks;
          $arr['djsj']=0;
          $arr['prlev']=$prlev;//打劫升级的控制 
		  $arr['pof']=$pof;//破解防御
		  
	       
	  }else{
	       $arr['e']=2;//没有搜索 到
	  }
		}//有体力结束 
	
		
	  
          

          $this->ajaxReturn ($arr,'JSON');
		  
			$this->display();
		
          //$this->display();
}
       
	   public function sq_cx(){
		   if($_GET['zt']==0){
			   header('Location:  index.php?m=ajax&a=install&zt=0  ');exit;
		   }
	   }
	   public function install(){
		   if($_GET['zt']==0){
			   $this->display();
		   }else{
			  header('Location:  index.php?m=ajax&a=install2&zt=1  ');exit; 
		   }
		   if($_GET['act']==1){
			   $sq_domain=I('sq_domain');
			   $sq_code=I('sq_code');
			   if($sq_domain=='' || $sq_code==''){
				   $this->error('域名和授权码不能为空');
			   }else{
		header('Location:  http://sq.yk676.com/index.php?m=ajax&a=install1&sq_domain='.$sq_domain.'&sq_code='.$sq_code);exit; 
				   
			   }
			   
		   }
		   
	   }
	   public function propchange(){
		   //会员背包
		   $dba=M("userbag");
           $wherea = array('userid' => session('uid'));
		   $infoa=$dba->where($wherea)->find(); 
		   
		   $db=M("Userlist");
           $where = array('userid' => session('uid'));
		   $info=$db->where($where)->find();
		   $num=I('num');//ajax传过来的
		   $id=I('id');//ajax传过来的
		   //echo $info['tieky'];exit;
		   if($id==1){
			   if($info['tieky']>=5000000){
				   $data['tieky']=$info['tieky']-5000000;
				   $data['auto']=1;
				   $arr['r']=4;	
                   //插入背包
				   $dataa['name']='自动收矿';
				   $dataa['buy_time']=date('y-m-d h:i:s');
				   $dataa['num']=$infoa['num']+1;
				   $dataa['userid']=session('uid');
				   $dataa['username']=session('username');				   
			   }else{
				   $arr['rd']='永久矿石不足500万，无法购买';
                    $arr['r']=100;					   
			   }
		   }//1自动收矿结束
		   if($id==2){
			   if($info['zhuanshi']>=30*$num){
				   $data['zhuanshi']=$info['zhuanshi']-30*$num;//减去钻石
				   $data['djcs']=$info['djcs']+$num;//打劫次数
				   //插入背包
				   $dataa['name']='矿工体力';
				   $dataa['buy_time']=date('y-m-d h:i:s');
				   $dataa['num']=$infoa['num']+1;
				   $dataa['userid']=session('uid');
				   $dataa['username']=session('username');
				   
				   $arr['rd']='购买成功，体力+1';
                   $arr['r']=100;	
				   
			   }else{				   
                   $arr['rd']='购买失败，钻石不足';
                    $arr['r']=100;					   
			   }
		   }//2体力结束
		   if($id==5){
			   if($info['zhuanshi']>=5*$num){
				   $data['zhuanshi']=$info['zhuanshi']-5*$num;//减去钻石
				   $data['3htl']=1;//打劫次数
				   //插入背包
				   $dataa['name']='3小时体力';
				   $dataa['buy_time']=date('y-m-d h:i:s');
				   $dataa['num']=$infoa['num']+1;
				   $dataa['userid']=session('uid');
				   $dataa['username']=session('username');
				   
				   $arr['rd']='购买3小时体力成功，可以采到水晶碎片';
                   $arr['r']=100;					   
			   }else{
				   $arr['rd']='钻石不足';
                   $arr['rd']='购买失败，钻石不足';
                    $arr['r']=100;					   
			   }
		   }//5-3小时体力结束
		   if($id==13){
			   if($info['tieky']>=50000*$num){
				   $data['tieky']=$info['tieky']-50000*$num;//减去钻石
				   $data['djcs']=$info['djcs']+$num;//打劫次数
                    //插入背包
				   $dataa['name']='打劫体力';
				   $dataa['buy_time']=date('y-m-d h:i:s');
				   $dataa['num']=$infoa['num']+1;
				   $dataa['userid']=session('uid');
				   $dataa['username']=session('username');				   
                   $arr['r']=3;					   
			   }else{				  
                   $arr['rd']='购买失败，永久矿石不足';
                    $arr['r']=100;					   
			   }
		   }//13 打劫矿车体力结束
		   if($id==12){
			   if($info['tieky']>=30000*$num){
				   $data['tieky']=$info['tieky']-30000*$num;//减去钻石
				   $data['yuanshi']=$info['yuanshi']+$num;//打劫次数
             				   
                   $arr['rd']='购买成功，原石+1';				   
                   $arr['r']=100;					   
			   }else{				  
                   $arr['rd']='购买失败，永久矿石不足';
                    $arr['r']=100;					   
			   }
		   }//12 结束
		   if($id==8){
			   if($info['jinkz']>=1000*$num){
				   $data['jinkz']=$info['jinkz']-10000*$num;//减去水晶
				   $data['zhuanshi']=$info['zhuanshi']+$num;//钻石	
                   $arr['rd']='购买成功';				   
                   $arr['r']=100;					   
			   }else{				  
                   $arr['rd']='购买失败，水晶不足';
                    $arr['r']=100;					   
			   }
		   }//12 结束
            
            			
		     $db->where($where)->save($data);//更新数据
			 $dba->add($dataa);//更新背包数据	
		     $this->ajaxReturn($arr,'JSON');
			 
			$this->display();
		
			 //$this->display();
	   }
	   
	   //钻石买秘银钻石买秘银钻石买秘银钻石买秘银钻石买秘银钻石买秘银钻石买秘银钻石买秘银
	   public function exchangepay(){
		   $db=M("Userlist");
           $where = array('userid' => session('uid'));
		   $info=$db->where($where)->find();
		   
		   
		   $id=I('id');//ajax传过来的
		   $srcid=I('srcid');//ajax传过来的
		   //echo $info['tieky'];exit;
		   if($id==1){
			   if($info['zhuanshi']>=30){
				   $data['zhuanshi']=$info['zhuanshi']-30;	
                   $data['tieky']=$info['tieky']+210000;				   
				   $arr['r']=0;				   			   
			   }else{
				   $arr['rd']='钻石不足';
                    $arr['r']=100;					   
			   }
		   }
		   if($id==2){
			   if($info['zhuanshi']>=60){
				   $data['zhuanshi']=$info['zhuanshi']-60;//减去钻石
				   $data['tieky']=$info['tieky']+420000;//打劫次数				   		   
				   $arr['rd']='购买成功,永久矿石+42万，钻石花费60个';
                   $arr['r']=100;					   
			   }else{				   
                   $arr['rd']='购买失败，钻石不足';
                    $arr['r']=100;					   
			   }
		   }//2体力结束
		   if($id==3){
			   if($info['zhuanshi']>=100){
				   $data['zhuanshi']=$info['zhuanshi']-100;//减去钻石
				   $data['tieky']=$info['tieky']+700000;
				   $arr['rd']='购买成功，永久矿石+70万，钻石花费100个';
                   $arr['r']=100;					   
			   }else{				   
                   $arr['rd']='购买失败，钻石不足';
                    $arr['r']=100;					   
			   }
		   }//5-3小时体力结束
		   if($id==4){
			   if($info['zhuanshi']>=200){
				   $data['zhuanshi']=$info['zhuanshi']-200;//减去钻石
				   $data['tieky']=$info['tieky']+1400000;//打劫次数				   
                   $arr['r']=0;					   
			   }else{				  
                   $arr['rd']='购买失败，钻石不足';
                    $arr['r']=100;					   
			   }
		   }//13 打劫矿车体力结束
		   if($id==5){
			   if($info['zhuanshi']>=500){
				   $data['zhuanshi']=$info['zhuanshi']-500;//减去钻石
				   $data['tieky']=$info['tieky']+3500000;	                   				   
                   $arr['r']=0;					   
			   }else{				  
                   $arr['rd']='购买失败，钻石不足';
                    $arr['r']=100;					   
			   }
		   }//12 结束
		   if($id==6){
			   if($info['zhuanshi']>=1000){
				   $data['zhuanshi']=$info['zhuanshi']-10000*$num;//减去水晶
				   $data['tieky']=$info['tieky']+7000000;	
                   $arr['rd']='购买成功，永久矿石+700万，花费了1000个钻石';				   
                   $arr['r']=100;					   
			   }else{				  
                   $arr['rd']='购买失败，钻石不足';
                    $arr['r']=100;					   
			   }
		   }//12 结束
            
             		
		     $db->where($where)->save($data);//更新矿场数据
		     $this->ajaxReturn($arr,'JSON');
			 
			$this->display();
		
			 //$this->display();
	   }
//道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表道具列表
    public function proplist() {
	$t2=$_GET['t2'];
	
	$db=M("Userlist");
    $where = array('userid' => session('uid'));
    $field = array('tiekz','jinkz','zhuanshi','lv','type','djcs','islogin','bdj','sunshi','machine','run');
    $info = $db->where($where)->select();

    if($t2==1){
    if ($info['rmb'] < 10){
	 $arr['r']=2;
	}else{
	 $data = array(
            'rmb' => $info['rmb'] - 10,           
            );
        $db->data($data)->save();
		$arr['r']=0;
	}
          
        }
		
		$arr['r']=0;
    $this->ajaxReturn ($arr,'JSON');
    $this->display();
    }
    
   public function newplunder(){
	$aa=M("Userlist");
	$whereaa = array('userid' => session('uid'));
	$info = $aa->where($whereaa)->find();
	$tiekz=$info['tiekz'] + 5000;
	//被打劫会员表
	if($info['djcs']>0){
		$arr['e']=0;
		$this->ajaxReturn($arr,'JSON');
		$this->display();
	}else{
		$arr['e']=2;
		$this->ajaxReturn($arr,'JSON');
		$this->display();
	}
	   
   }	
	//恢复体力
	public function physical(){
	$aa=M("Userlist");
	$where = array('userid' => session('uid'));
	$info = $aa->where($where)->find();
	//配置表
	    $dba = M("config");	
        $wherea['id']=1;
        $infoa = $dba->where($wherea)->find();	
		if($info['jinkz']>$infoa['tili_cost']){//花费水晶配置
			$data=array(
			'jinkz'=>$info['jinkz']-$infoa['tili_cost'],
			'djcs'=>$infoa['tili_num'],//打劫次数
			);
			$aa->where($where)->save($data);
		$arr['r']=0;
		$arr['jinkz']=$info['jinkz'];
		$arr['rd']='花费1000水晶，体力已满';
		$this->ajaxReturn($arr,'JSON');
		$this->display();
	     }else{
		$arr['r']=1;
		$arr['jinkz']=$info['jinkz'];
		$arr['rd']='水晶不足购买';
		$this->ajaxReturn($arr,'JSON');
		
			$this->display();
		
		//$this->display();
	}
	}
	
	

	
    
}
?>