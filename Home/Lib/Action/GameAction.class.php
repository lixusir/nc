<?php
//游戏控制器
class GameAction extends CommonAction {
   //大厅动态 
    public function index(){
        $db = M('Kuanglist');        
        $field = array('userid','record','tiek','jink','time');
        import('ORG.Util.Page');
        $count = $db->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();

        $task = $db
        ->field($field)
        ->limit($Page->firstRow.','.$Page->listRows)
        ->order('time desc')
        ->select();

        $this->assign('task',$task);
        $this->assign('page',$show);
		
		
			$this->display();
		
		
        //$this->display();
    }	
	
	//game enter
	public function game_enter(){
		$db = M('user');
		$where['id'] =  session('uid');  
        $info=$db->where($where)->find();
		//写入游戏记录
		$dba = M('game_record');
		
		$username=$info['username'];
		$password=$info['password'];		
		$s="username=$username&password=$password ";
		//echo $s;exit;
		//echo $username;exit;
	    if($info['username']  && $info['password'] ){
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$data['userid']=session('uid');
		$data['username']=session('username');
		$data['game_time']=date('y-m-d h:i:s');
		$data['recharge']=0;
		$data['recharge_money']=0;
		$data['fc']=0;
		$dba->add($data);//写入结束
		
	    //echo $_SESSION['password'];exit;
	    header("Location:  http://user.yk676.com/index.php?m=ajax&a=game_url&".$s   );
		
		exit;
		//}}else{{
		//	echo 1;
	}
		
	}
	//打劫
	 public function stealSilverHistory(){
       $db=M("Dajielist");
       $where = array('userid' => session('uid'));       
       $obj = $db->where($where)->select();
       $arr = $db->where($where)->field()->find();
       $this->ajaxReturn ($arr,'JSON');
	   
			$this->display();
		
       //$this->display();
    }
	//竞猜GUESS
	public function phtype4(){
		
		echo '{""r"":0}';
	}
	public function getrank4(){
		
		echo ' {""r"":0,""left"":0,""top"":[{""minerid"":""114945"",""income"":""1815975000"",""award"":""100000000""},{""minerid"":""24346"",""income"":""1665600000"",""award"":""30000000""},{""minerid"":""17898"",""income"":""1566685000"",""award"":""10000000""},{""minerid"":""139421"",""income"":""1558290000"",""award"":""5000000""},{""minerid"":""125504"",""income"":""424995000"",""award"":""5000000""},{""minerid"":""129419"",""income"":""340140000"",""award"":""5000000""},{""minerid"":""74208"",""income"":""285800000"",""award"":""5000000""},{""minerid"":""13255"",""income"":""276200000"",""award"":""5000000""},{""minerid"":""18345"",""income"":""169900000"",""award"":""5000000""},{""minerid"":""120341"",""income"":""144600000"",""award"":""5000000""},{""minerid"":""133952"",""income"":""15000"",""award"":""5000000""}],""my"":""10"",""myid"":""170583""} ';
	}
	public function getdata4(){
		
		
       echo ' {"r":0,"status":0,"lastround":["1","2","1","1"],"round":["1","2","1","1","3","3","2","1","2","3","2","1","1","1","1","2","1","2","2","2","1","1","1","1","1","1","3","2","1","2","1","2","3"],"myturn":{"1":0,"2":0,"3":0,"4":0},"cost":10000,"amazing":[{"mid":123,"rid":54245,"award":124554}]} ';		
		
	}
		
	public function gemtap4(){
		$db = M('userlist');
		$where['userid'] =  session('uid');  
        $info=$db->where($where)->find();
		
echo'{""r"":1,""rd"":""15425"",""tiekz"":"'.$info['tiekz'].'",""gs_znum1"":"'.$info['tiekz'].'",""gs_znum2"":"'.$info['tiekz'].'",""gs_znum3"":"'.$info['tiekz'].'",""gs_znum4"":"'.$info['tiekz'].'"}';	
		
    } 
	public function getPep4(){
		$db = M('userlist');
		$where['userid'] =  session('uid');  
        $info=$db->where($where)->find();
		
       echo '  {""r"":0,""time"":20,""tieky"":'.$info['tieky'].',""tiekz"":'.$info['tiekz'].',""gs_znum1"":'.$info['tiekz'].',""gs_znum2"":'.$info['tiekz'].',""gs_znum3"":'.$info['tiekz'].',""gs_znum4"":'.$info['tiekz'].'}  ';		
		
    }
	public function getopen4(){
		$db = M('userlist');
		$where['userid'] =  session('uid');  
        $info=$db->where($where)->find();
		
       echo '   {""r"":0,""zj_yes"":"1",""god"":10,""resultid"":1,""gs_znum1"":'.$info['tiekz'].',""gs_znum2"":'.$info['tiekz'].',""gs_znum3"":'.$info['tiekz'].',""gs_znum4"":'.$info['tiekz'].',""tiekz"":'.$info['tiekz'].'}   ';		
	}
	//上庄
	public function bkadd(){
		echo '{""r"":0,""tj"":0,"rs":1} ';		
	}
	//下庄
	public function bksub(){
		echo '{""r"":0,""isbk"":0} ';		
	}
	//原石对切新手场
	public function ysdq(){
		//echo '{""r"":0,""isbk"":0} ';	

      $this->display();		
	}
	//原石对切豪华场
	public function ysdqs(){
		$this->display();				
	}
	//单人版
	//原石对切豪华场
	public function guess_dan_new(){
		//配置表
		$db2 = M('config');
		$where2['userid'] =  session('uid');  
        $info2=$db2->where($where2)->find();		
		//玩家动态表，单人版的
		$dba = M("game_bscdr_record");
		$wherea['userid']=session('uid');
		$infoa=$dba->where($wherea)->find();
		$infob=$dba->where($wherea)->select();
		//$wan_time=($infoa['wan_time']|substr=0,10);
		$wan_time=strtotime($infoa['wan_time']);
        $jt=strtotime(date('Y-m-d',time()).' 00:00:00');
	    //echo $wan_time - $jt;exit;
        if($wan_time<$jt){
          
        }else{
			//一天只能玩多少次判断
		if($infoa['cs'] > $info2['cs1_ctrl_ptcs']){
			header('location : index.php?m=game');
		}else{
			
		}
          //$dba->where($wherea)->delete();    //删除
        }
		
		
		
		if($info['gs_num1']==0){
			$dataa['ya']='';
		$dba->where($wherea)->save($dataa);
		}
		
		$this->assign('infoa',$infoa);
		$this->assign('infob',$infob);
		
			$this->display();
		
		//$this->display();
						
	}
	
	public function gemtap(){//投注
	    $db = M('userlist');
		$where['userid'] =  session('uid');  
        $info=$db->where($where)->find();
		if($info['gs_num1']!=0){//清0
			$data['gs_num1']=0;
			$db->where($where)->save($data);
		}
		//配置表
		$db2 = M('config');
		$where2['userid'] =  session('uid');  
        $info2=$db2->where($where2)->find();		
		//玩家动态表，单人版的
		$dba = M("game_bscdr_record");
		$wherea['userid']=session('uid');
		$infoa=$dba->where($wherea)->find();
		//echo $infoa['userid'];exit;
		if($info['gs_num1']==0){
			$dataa['ya']='';
		$dba->where($wherea)->save($dataa);
		}
		//一天只能玩多少次判断
		if($infoa['cs'] >= $info2['cs1_ctrl_ptcs']){
			$r=2;   //关闭游戏
			$data['gs_num1']=0;
			$rd='已达到每日限制次数，游戏关闭，投注无效，请升级矿工等级，等级越高，可玩次数越多';
			$db->where($where)->save($data);
			$cs=$infoa['cs']+1;
		}else{
			$r=0;
			$cs=$infoa['cs']+1;
			
		}
		//如果是第二天，则开启
		$wan_time=strtotime($infoa['wan_time']);
        $jt=strtotime(date('Y-m-d',time()).' 00:00:00');
		if($jt > $wan_time){
			$dataa['cs']=0;
			$dataa['zjcs']=0;
			$dataa['shucs']=0;
			$dataa['wan_time']=date('y-m-d h:i:s');
			$dba->where($wherea)->save($dataa);//更新
			
		if($clickid==1){
			$ya='红色';
		}
		if($clickid==2){
			$ya='绿色';
		}
		if($clickid==3){
			$ya='蓝色';
		}
		if($clickid==4){
			$ya='紫色';
		}
		}else{
			$ya=0;
		}
		
	    $clickid=$_GET['clickid'];
		$bei1=$_GET['super2'];
		$tiekz=$info['tiekz'];
		if($clickid!='' || $bei!=''){
			//投注的写进数据库
		$data['gs_num1']=$clickid;
		$data['bei1']=$bei1;
		$db->where($where)->save($data);
		}
		$kj=rand(1,4);   //开奖号
		//echo $tiekz;exit;
		
		//减去投注的铁矿
		If($bei1==0){
			$type='普通模式';
			$cost=$info2['cs1_ctrl_pttiek'];
	      If ($info["tiekz"] < $info2['cs1_ctrl_pttiek']){
	       $r=-2;
		   }else{
			   $data["tiekz"]=$info["tiekz"]-$info2['cs1_ctrl_pttiek'];
		   }
	     }else{
			$type='超级模式';
			$cost=$info['cs1_ctrl_cjtiek'];
			If ($info["tiekz"] < $info2['cs1_ctrl_cjtiek']){
	         $r=-2;
		   }else{
			   $data["tiekz"]=$info["tiekz"]-$info2['cs1_ctrl_cjtiek'];
		   }		 
	   }
	    $db->where($where)->save($data);//更新
		
		
		
		//写入游戏记录表
		$dataa['userid']=session('uid');
		$dataa['username']=session('username');
		$dataa['type']=$type;
		$dataa['cost']=$infoa['cost'] + $cost;
		$dataa['wan_time']=date('y-m-d h:i:s');
		$dataa['cs']=$cs;
		$dataa['ya']=$ya;
		if(!$infoa['userid']){  //判断是否已经有此玩家的记录
			$dba->add($dataa);   //没有，添加 
		}else{
			
		}
		
		$dba->where($wherea)->save($dataa);   //有，更新
	     
		echo '{"r":'.$r.',"rd":"'.$rd.'","myturn":{"1":0,"2":0,"3":0,"4":0},"silver":'.$info['tiekz'].'} ';	
			//$this->display();
		
		//echo '{"r":'.$r.',"rd":"'.$rd.'","myturn":{"1":0,"2":0,"3":0,"4":0},"silver":'.$info['tiekz'].'} ';	

			 
	}
	public function getData(){//数据
		
       echo ' {"r":0,"status":0,"lastround":["1","2","1","1"],"round":["1","2","1","1","3","3","2","1","2","3","2","1","1","1","1","2","1","2","2","2","1","1","1","1","1","1","3","2","1","2","1","2","3"],"myturn":{"1":0,"2":0,"3":0,"4":0},"cost":10000,"amazing":[{"mid":123,"rid":54245,"award":124554}]} ';		
		
    } 
	public function getPep(){
		$db = M('userlist');
		$where['userid'] =  session('uid');  
        $info=$db->where($where)->find();
		
		
       echo '  {"r":0,"silver":'.$info['tiekz'].'}   ';	
		
    }
	
	public function getopen(){	//开奖
		$db = M('userlist');
		$where['userid'] =  session('uid');  
        $info=$db->where($where)->find();
		//配置表
		$dba = M('config');
		$wherea['id'] =  1;  
        $infoa=$dba->where($wherea)->find();
		//玩家动态表，单人版的
		$db2 = M("game_bscdr_record");
		$where2['userid']=session('uid');
		$info2=$db2->where($where2)->find();
		
     $id=$_GET['id'];
     $kj=rand(1,4);
     $super=$info['bei1'];	 
	 $gs_num1=$info['gs_num1'];
	 
	  If ($info["gs_cs1"]<$infoa['cs1_ctrl_ju']) {	  //控制前面几局不出蓝色，紫色
	  If ($kj==4) {
	   $kj=1;
	   }
	     If ($kj==3) {
	      $kj=2;
	       }
	        If ($kj==2){
	         $kj=1;
	       }
	        }	
	
		 if($gs_num1==$kj){
		
        If ($gs_num1==1) {
		$bei=2;//倍数
		If ($super==0) {//普通还是超级模式
			$gods=$bei*$infoa['cs1_ctrl_pttiek'];
		 }else{
			$gods=$bei*$infoa['cs1_ctrl_cjtiek'];
	   }	  
	  }	  
	 If($gs_num1==2) {
	   $bei=3;
	   If ($super==0) {
			$gods=$bei*$infoa['cs1_ctrl_pttiek']; 
		
		 }else{
			$gods=$bei*$infoa['cs1_ctrl_cjtiek'];
	   }
	 }	 
	  If ($gs_num1=3) {
	   $bei=4;
	   If ($super==0) {
			$gods=$bei*$infoa['cs1_ctrl_pttiek']; 
		 
		 }else{
			$gods=$bei*$infoa['cs1_ctrl_cjtiek'];
	   }
	 }
	  If ($gs_num1==4) {
	  $bei=5;
	   If ($super==0) {
			$gods=$bei*$infoa['cs1_ctrl_pttiek']; 
		 
		 }else{
			$gods=$bei*$infoa['cs1_ctrl_cjtiek']; 		 
	   }
	 }
		 }else{
			$gods=0; 
		 }
		 
	             
	  $data['tiekz']=$info['tiekz']+$gods;  //中奖加铁矿
					    //$data['gs_num1']=0;                   //清0
						$data['gs_cs1']=$info['gs_cs1']+1;   //猜石次数        
			     		$db->where($where)->save($data);
		
        if($kj == $info2['ya']){
			$zt='中奖';
			$zjcs=$info2['zjcs']+1;
		}else{
			$zt='未中';
			$shucs=$info2['shucs']+1;
		}
        if($kj==1){
			$kjs='红色';
		}
		if($kj==2){
			$kjs='绿色';
		}
		if($kj==3){
			$kjs='蓝色';
		}
		if($kj==4){
			$kjs='紫色';
		}		
        //写入游戏记录表		
		$data2['reward']=$info2['reward'] + $gods;
		$data2['kj']=$kjs;
		$data2['zt']=$zt;
		$data2['zjcs']=$zjcs;
		$data2['shucs']=$shucs;
		if(!$info2['userid']){  //判断是否已经有此玩家的记录
			$db2->add($data2);   //没有，添加 
		}else{
			$db2->where($where2)->save($data2);   //有，更新
		}		
		
		echo '   {"r":0,"resultid":'.$kj.',"god":'.$gods.',"gs_num1":'.$info['gs_num1'].',"bei1":'.$info['bei1'].',"gs_cs1":'.$info['gs_cs1'].'}   ';

		//$this->display();
	
		
		//echo '   {"r":0,"resultid":'.$kj.',"god":'.$gods.',"gs_num1":'.$info['gs_num1'].',"bei1":'.$info['bei1'].',"gs_cs1":'.$info['gs_cs1'].'}   ';
	
	}
	
	
	
	
}
?>