<?php
//矿场大厅动态 
class ToshareAction extends Action {
	
	
//首页 
    public function index(){
        $db = M('userlist');        
		$dbb = M('config');    //配置表
        $whereb['id'] = 1;  
        $where = array('userid' => session('uid'));   
        $wherea = array('upxianid' => session('uid'));  		
        $info = $db->where($where)->select();
		$info2 = $db->where($where)->find();
		$infob = $dbb->where($whereb)->select();
         //echo $info2['zliaonum'];exit;
        if($info2['weixin']==0 || $info2['zfb']==0 ){
		     $data['zliaonum']=1;  //去完成
		   }else{
             if($info2['zliaonum']!=1){			   
		     $data['zliaonum']=0;  //可领奖
			 }else{}
		   }
            $db->where($where)->save($data);		   
        
        $count=$db->where($wherea)->count();	
        $this->assign('info',$info); 
		$this->assign('zl',$zl); 
        $this->assign('count',$count); 
        $this->assign('invite',$info); 		//招聘获得多少奖励输出到模板	
        
			$this->display();
			
        //$this->display();
    }
	//领取奖励
	public function tasklq(){
		$db = M('userlist');        
        $where = array('userid' => session('uid'));        
        $info = $db->where($where)->find();
		//echo $info['zliaonum'];exit;
		if(I('t2')==1){//1.资料填写任务	            	
			$arr['r']=0;//js控制
			$arr['id']=1;//js控制
			$data['zliaonum']=0;
			$db->where($where)->save($data);
		}else{
		if(I('t2')==2){//2.招聘任务	            	
			$arr['r']=0;//js控制
			$arr['id']=2;//js控制
			$data['tiekz']=$info['tiekz']+$info['zpsj_lq_tiek'];
			$data['jinkz']=$info['jinkz']+$info['zpsj_lq_jink'];
			$data['tieky']=$info['tieky']+$info['zpsj_lq_tieky'];
			$data['zhuanshi']=$info['zhuanshi']+$info['zpsj_lq_zhuanshi'];
			if($db->where($where)->save($data)){
				$data['zpsj_lq_tiek']=0;
				$data['zpsj_lq_jink']=0;
				$data['zpsj_lq_tieky']=0;
				$data['zpsj_lq_zhuanshi']=0;
				$db->where($where)->save($data);
			}
		}
		}
		$this->ajaxReturn($arr,'JSON');
		if(check_sq(1)){
			$this->display();
		}else{
			$this->check_sq();
		}		
		//$this->display();
	}
//数据初始获取 
    public function getdata(){
        $db = M('userlist');        
        $where = array('userid' => session('uid'));        
        $info = $db
		->where($where)
        ->field()
        ->find();
		session('zp_sj_nums3', $info['zp_sj_nums3']);
		$db2 = M('user');        
        $where2 = array('id' => session('uid'));        
        $info2 = $db2
		->where($where2)
        ->field()
        ->find();
		session('userendsnum', $info2['userendsnum']);
		//1.签到任务
		if ($info['qd_numz'] == $info['qd_next'] * 3 ){
		    $e1='1';  //领奖
			$arr['e1']=$e1;
			}else{
			
			if ($info['qiandao']=='0') {
		    $e1='0';	 //可签到
			$arr['e1']=$e1;
		   }
		   if ($info['qiandao']=='1') {
		    $e1='2';	 //可签到
			$arr['e1']=$e1;
		   }
		   
			}
		//2.完善帐号任务
		
		if($info['zliaonum'] ==0){		
		$arr['e2']='1';  //已领奖
		}else{
		
		if($info2['weixin'] == 0 && $info2['zfb'] == 0 && $info2['phone'] == 0){
		$arr['e2']='0';  //去完成
		}else{		
		 $arr['e2']='2';  //可领奖
		}
		
		}
		//3.第1次领取矿石		
		if($info['firstlq'] != 0 ){		
		$arr['e3']='1';  //已领奖
		}else{		
		if($info['tiekz'] > 0 ){
		$arr['e3']='2';  //可领奖
		}else{		
		 $arr['e3']='0';  //去完成
		}		
		}
		//4.每日打劫6次任务		
		if($info['dajie_next'] > 6 ){		
		$arr['e4']='1';  //已领奖
		}else{		
		if($info['dajie_next'] == 6 ){
		$arr['e4']='2';  //可领奖
		}else{		
		 $arr['e4']='0';  //去完成
		}		
		}
		//5.每日招聘		
		if($info['zp_next'] == 3 ){		
		$arr['e5']='1';  //已领奖
		}else{		
		if($info['zp_next'] == 2 ){
		$arr['e5']='2';  //可领奖
		}else{		
		 $arr['e5']='0';  //去完成
		}		
		}
		//7.矿工升级		
		if($info['lv_next']  < $info['lv_next'] * 3 ){		
		$arr['e7']='0';  //去完成
		}else{			
		$arr['e7']='2';  //可领奖
		}
		//8.矿工招聘		
		if($info['zp_ks_nums1']  == 0 ){		
		$arr['e8']='0';  //去完成
		}else{			
		$arr['e8']='2';  //可领奖
		}
		//9.矿头招聘		
		if($info['zp_lq_tieky']  == 0 ){		
		$arr['e9']='0';  //去完成
		}else{			
		$arr['e9']='2';  //可领奖
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        
        $this->ajaxReturn ($arr,'JSON');           
        $this->display();
    }
	
	
	public function newtask(){
    //矿工表	
        $db = M('userlist');        
        $where = array('userid' => session('uid'));        
        $info = $db
		->where($where)
        ->field()
        ->find();
	//会员表
		$db2 = M('user');        
        $where2 = array('id' => session('uid'));        
        $info2 = $db2
		->where($where2)
        ->field()
        ->find();
		if(IS_GET)
        {
            $id=$_GET["id"];				
        }
//1.签到任务
		if ($id==100){
		$data = array(
		'tiekz' => $info['tiekz']+500,
		'jinkz' => $info['jinkz']+100,
		'tieky' => $info['tieky']+20,
		'qiandao' => 1,
		'qd_numz' => $info['qd_numz']+1,
		);
		$db->where($where)->data($data)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='签到成功'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}
		//领取签到奖励
		if ($id==0){
		$data = array(
		'tiekz' => $info['tiekz']+10000,		
		'qd_next' => $info['qd_next']+1,
		);
		$db->where($where)->data($data)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得1万衰变矿石！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}
//2.完善帐户任务
        if ($id==1){        
		if($info2['weixin'] != 0 && $info2['zfb'] != 0 && $info2['phone'] != 0){
		$data2 = array(
		'tiekz' => $info['tiekz']+200000,		
		'zliaonum' => 0,
		);
		$db->where($where)->data($data2)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得20万衰变矿石！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}	
		}
//3.第1次领取矿石任务
        if ($id==2){     
		$data2 = array(
		'tiekz' => $info['tiekz']+5000,		
		'firstlq' => $info['firstlq']+1,
		);
		$db->where($where)->data($data2)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得5000衰变矿石！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}	
//4.每日打劫6次任务
        if ($id==3){     
		$data2 = array(
		'zhuanshi' => $info['zhuanshi']+5,		
		'dajie_next' => $info['dajie_next']+1,
		);
		$db->where($where)->data($data2)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得5钻石！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}	
//5.每日招聘任务
        if ($id==4){     
		$data2 = array(
		'zhuanshi' => $info['zhuanshi']+5,		
		'dajie_next' => $info['dajie_next']+1,
		);
		$db->where($where)->data($data2)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得5钻石！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}	
//7.矿工升级任务
        if ($id==6){     
		$data2 = array(
		'jinkz' => $info['jinkz']+300,		
		'lv_next' => $info['lv_next']+1,
		);
		$db->where($where)->data($data2)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得300水晶！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}	
//8.矿工招聘
        if ($id==7){     
		$data2 = array(
		'tieky' => $info['tieky']+$info['zp_ks_nums1'],		
		'zp_ks_nums1' => 0,
		);
		$db->where($where)->data($data2)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得永久矿石！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}			
//9.矿头招聘
        if ($id==8){     
		$data2 = array(
		'tieky' => $info['tieky']+$info['zp_lq_tieky'],			
		);
		$db->where($where)->data($data2)->save();		
        //输出数组json		
        $arr['r']=$id;
		$arr['rd']='获得永久矿石！'; 
		$this->ajaxReturn ($arr , 'json');
		$this->display();
		}			
		
			
		
		
		
		
		
		
		
		
		
		
		//功能结束	
		}
		
		
//首页 
    public function invite(){
        $db = M('userlist');        
        $where = array('userid' => session('uid'));        
        $info = $db
        ->field()
        ->select();		
        $this->assign('info',$info);        
        $this->display();
    }		
		
		
		
		
	
	
}
?>