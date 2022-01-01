<?php
//矿场大厅动态 
class ShouyiAction extends Action {
	//大厅动态 
    public function index(){
        $db = M('userlist'); 
		$where = array('userid' => session('uid'));		
        $info = $db->where($where)->limit(1)->select();
		$info2 = $db->where($where)->find();
		//更新打劫级别
		   //$dataj['dj_lvl']=$info['dj_jy']/500;//每级500打劫经验
        //$db->where($where)->data($dataj)->save();		
        $this->assign('info',$info); 
        $djmax=$info2['dj_lvl']*500;		
        $this->assign('djmax',$djmax); 
		//echo $djmax;exit;		
		$cur_date = strtotime(date('Y-m-d'));
        M('kuanglist')->where("time >= '{$cur_date}'")->find();		
		$sum = $db->where($whereg)->sum('tiek');
		$this->assign('sum',$sum);
			$this->display();		
        //$this->display();
    }
	public function shouyi2(){
		
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->select();
		$info2=$db->where($where)->find();
		$wheresx['userid']=$info2['upxianid'];//上线的ID
		$infosx=$db->where($wheresx)->find();
		//算出挖矿相隔的秒数
//PHP计算两个时间差的方法 
     $startdate1=$info2['lqtime1'];
     $startdate2=$info2['lqtime2'];
	 $startdate3=$info2['lqtime3'];
	 $startdate4=$info2['lqtime4'];
	 $startdate5=$info2['lqtime5'];

     $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate1))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate1))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate1))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate1))%86400%60);
     $cha1=$date*86400+$hour*3600+$minute*60+$second;
     //echo $cha1;exit;
     $date2=floor((strtotime($enddate)-strtotime($startdate2))/86400);
     $hour2=floor((strtotime($enddate)-strtotime($startdate2))%86400/3600);
     $minute2=floor((strtotime($enddate)-strtotime($startdate2))%86400/60);
     $second2=floor((strtotime($enddate)-strtotime($startdate2))%86400%60);
     $cha2=$date2*86400+$hour2*3600+$minute2*60+$second2;
	 
	 $date3=floor((strtotime($enddate)-strtotime($startdate3))/86400);
     $hour3=floor((strtotime($enddate)-strtotime($startdate3))%86400/3600);
     $minute3=floor((strtotime($enddate)-strtotime($startdate3))%86400/60);
     $second3=floor((strtotime($enddate)-strtotime($startdate3))%86400%60);
     $cha3=$date3*86400+$hour3*3600+$minute3*60+$second3;
	 
	 $date4=floor((strtotime($enddate)-strtotime($startdate4))/86400);
     $hour4=floor((strtotime($enddate)-strtotime($startdate4))%86400/3600);
     $minute4=floor((strtotime($enddate)-strtotime($startdate4))%86400/60);
     $second4=floor((strtotime($enddate)-strtotime($startdate4))%86400%60);
     $cha4=$date4*86400+$hour4*3600+$minute4*60+$second4;
	 
	 $date5=floor((strtotime($enddate)-strtotime($startdate5))/86400);
     $hour5=floor((strtotime($enddate)-strtotime($startdate5))%86400/3600);
     $minute5=floor((strtotime($enddate)-strtotime($startdate5))%86400/60);
     $second5=floor((strtotime($enddate)-strtotime($startdate5))%86400%60);
     $cha5=$date5*86400+$hour5*3600+$minute5*60+$second5;
	 if($info2['kc1']==1 || $info2['kc1']!=2){
	 $j1=0.01527778*$cha1/3600;
	 }else{
		 $j1=0;
	 }
	 if($info2['kc2']==1 || $info2['kc2']!=2){
	 $j2=0.16666667*$cha2/3600;
	 }else{
		 $j2=0;
	 }
	 if($info2['kc3']==1 || $info2['kc3']!=2){
	 $j3=1.80555556*$cha3/3600;
	 }else{
		 $j3=0;
	 }
	 if($info2['kc4']==1 || $info2['kc4']!=2){
	 $j4=19.44444445*$cha4/3600;
	 }else{
		 $j4=0;
	 }
	 if($info2['kc5']==1 || $info2['kc5']!=2){
	 $j5=208.333333*$cha5/3600;
	 }else{
		 $j5=0;
	 }
	 if($info2['kc1']==2){$data['stop_lq1']=$ifno2['stop_lq1']+$j1;}
	 if($info2['kc2']==2){$data['stop_lq2']=$ifno2['stop_lq2']+$j2;}
	 if($info2['kc3']==2){$data['stop_lq3']=$ifno2['stop_lq3']+$j3;}
	 if($info2['kc4']==2){$data['stop_lq4']=$ifno2['stop_lq4']+$j4;}
	 if($info2['kc5']==2){$data['stop_lq5']=$ifno2['stop_lq5']+$j5;}
 //echo $j1;exit;
        if($_GET['act']==1){
			$id=$_GET['act'];			
			if($id==1){$chan=0.01527778;$cha=$cha1;}
			if($id==2){$chan=0.16666667;$cha=$cha2;}
			if($id==3){$chan=1.80555556;$cha=$cha3;}
			if($id==4){$chan=19.44444445;$cha=$cha4;}
			if($id==5){$chan=208.333333;$cha=$cha5;}			
	        $j=$chan*$cha/3600;
			if($j<0.015){
				$this->success('未到结算时间');exit;
			}
			$data['tiekz']=$infosx['tiekz']+$j*5/100;
			$db->where($wheresx)->save($data);  //一代上线上交5%
			$data['runtime'.$id]=$info2['runtime'.$id]+$cha;
			$data['sy'.$id]=$info2['sy'.$id]+$j;
			$data['tiekz']=$info2['tiekz']+$j;			
			//echo $info2['tiekz'];exit;
			$aa=$db->where($where)->save($data);
			if($aa){
				$data2['lqtime'.$id]=date('y-m-d H:i:s');
				$db->where($where)->save($data2);
				$this->success('结算已完成！');exit;
				 }else{$this->error('结算失败！');exit;}
		}
		if($_GET['act']==2){
			$id=$_GET['act'];			
			if($id==1){$chan=0.01527778;$cha=$cha1;}
			if($id==2){$chan=0.16666667;$cha=$cha2;}
			if($id==3){$chan=1.80555556;$cha=$cha3;}
			if($id==4){$chan=19.44444445;$cha=$cha4;}
			if($id==5){$chan=208.333333;$cha=$cha5;}			
	        $j=$chan*$cha/3600;
			if($j<0.166){
				$this->success('未到结算时间');exit;
			}
			$data['runtime'.$id]=$info2['runtime'.$id]+$cha;
			$data['sy'.$id]=$info2['sy'.$id]+$j;
			$data['tiekz']=$info2['tiekz']+$j;			
			//echo $info2['tiekz'];exit;
			$aa=$db->where($where)->save($data);
			if($aa){
				$data2['lqtime'.$id]=date('y-m-d H:i:s');
				$db->where($where)->save($data2);
				$this->success('结算已完成！');exit;
				 }else{$this->error('结算失败！');exit;}
		}
		if($_GET['act']==3){
			$id=$_GET['act'];			
			if($id==1){$chan=0.01527778;$cha=$cha1;}
			if($id==2){$chan=0.16666667;$cha=$cha2;}
			if($id==3){$chan=1.80555556;$cha=$cha3;}
			if($id==4){$chan=19.44444445;$cha=$cha4;}
			if($id==5){$chan=208.333333;$cha=$cha5;}			
	        $j=$chan*$cha/3600;
			if($j<1.805){
				$this->success('未到结算时间');exit;
			}
			$data['runtime'.$id]=$info2['runtime'.$id]+$cha;
			$data['sy'.$id]=$info2['sy'.$id]+$j;
			$data['tiekz']=$info2['tiekz']+$j;			
			//echo $info2['tiekz'];exit;
			$aa=$db->where($where)->save($data);
			if($aa){
				$data2['lqtime'.$id]=date('y-m-d H:i:s');
				$db->where($where)->save($data2);
				$this->success('结算已完成！');exit;
				 }else{$this->error('结算失败！');exit;}
		}
		if($_GET['act']==4){
			$id=$_GET['act'];			
			if($id==1){$chan=0.01527778;$cha=$cha1;}
			if($id==2){$chan=0.16666667;$cha=$cha2;}
			if($id==3){$chan=1.80555556;$cha=$cha3;}
			if($id==4){$chan=19.44444445;$cha=$cha4;}
			if($id==5){$chan=208.333333;$cha=$cha5;}			
	        $j=$chan*$cha/3600;
			if($j<19.444){
				$this->success('未到结算时间');exit;
			}
			$data['runtime'.$id]=$info2['runtime'.$id]+$cha;
			$data['sy'.$id]=$info2['sy'.$id]+$j;
			$data['tiekz']=$info2['tiekz']+$j;			
			//echo $info2['tiekz'];exit;
			$aa=$db->where($where)->save($data);
			if($aa){
				$data2['lqtime'.$id]=date('y-m-d H:i:s');
				$db->where($where)->save($data2);
				$this->success('结算已完成！');exit;exit;
				 }else{$this->error('结算失败！');}exit;exit;
		}
		if($_GET['act']==5){
			$id=$_GET['act'];			
			if($id==1){$chan=0.01527778;$cha=$cha1;}
			if($id==2){$chan=0.16666667;$cha=$cha2;}
			if($id==3){$chan=1.80555556;$cha=$cha3;}
			if($id==4){$chan=19.44444445;$cha=$cha4;}
			if($id==5){$chan=208.333333;$cha=$cha5;}			
	        $j=$chan*$cha/3600;
			if($j<208.333){
				$this->success('未到结算时间');
			}
			$data['runtime'.$id]=$info2['runtime'.$id]+$cha;
			$data['sy'.$id]=$info2['sy'.$id]+$j;
			$data['tiekz']=$info2['tiekz']+$j;			
			//echo $info2['tiekz'];exit;
			$aa=$db->where($where)->save($data);
			if($aa){
				$data2['lqtime'.$id]=date('y-m-d H:i:s');
				$db->where($where)->save($data2);
				$this->success('结算已完成！');exit;
				 }else{$this->error('结算失败！');}exit;
		}


		
		$arr['kc1']=$info2['kc1'];
		$arr['kc2']=$info2['kc2'];
		$arr['kc3']=$info2['kc3'];
		$arr['kc4']=$info2['kc4'];
		$arr['kc5']=$info2['kc5'];
		$arr['cha1']=floor($cha1/3600 *100)/100;
		$arr['cha2']=floor($cha2/3600 *100)/100;
		$arr['cha3']=floor($cha3/3600 *100)/100;
		$arr['cha4']=floor($cha4/3600 *100)/100;
		$arr['cha5']=floor($cha5/3600 *100)/100;
		$arr['j1']=sprintf("%1\$.8f",$j1);
		$arr['j2']=sprintf("%1\$.8f",$j2);
		$arr['j3']=sprintf("%1\$.8f",$j3);
		$arr['j4']=sprintf("%1\$.8f",$j4);
		$arr['j5']=sprintf("%1\$.8f",$j5);
		$arr['r']=0;

		$this->ajaxreturn($arr,'JSON');
		$this->assign('info',$info);
		$this->display();
		
	}
	public function stop(){
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->select();
		$info2=$db->where($where)->find();
		
		//PHP计算两个时间差的方法 
     $startdate1=$info2['kc_kjtime1'];
     $startdate2=$info2['kc_kjtime2'];
	 $startdate3=$info2['kc_kjtime3'];
	 $startdate4=$info2['kc_kjtime4'];
	 $startdate5=$info2['kc_kjtime5'];

     $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate1))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate1))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate1))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate1))%86400%60);
     $cha1=$date*86400+$hour*3600+$minute*60+$second;
     //echo $info2['kc_kjtime1'];exit;
	 
     $date2=floor((strtotime($enddate)-strtotime($startdate2))/86400);
     $hour2=floor((strtotime($enddate)-strtotime($startdate2))%86400/3600);
     $minute2=floor((strtotime($enddate)-strtotime($startdate2))%86400/60);
     $second2=floor((strtotime($enddate)-strtotime($startdate2))%86400%60);
     $cha2=$date2*86400+$hour2*3600+$minute2*60+$second2;
	 
	 $date3=floor((strtotime($enddate)-strtotime($startdate3))/86400);
     $hour3=floor((strtotime($enddate)-strtotime($startdate3))%86400/3600);
     $minute3=floor((strtotime($enddate)-strtotime($startdate3))%86400/60);
     $second3=floor((strtotime($enddate)-strtotime($startdate3))%86400%60);
     $cha3=$date3*86400+$hour3*3600+$minute3*60+$second3;
	 
	 $date4=floor((strtotime($enddate)-strtotime($startdate4))/86400);
     $hour4=floor((strtotime($enddate)-strtotime($startdate4))%86400/3600);
     $minute4=floor((strtotime($enddate)-strtotime($startdate4))%86400/60);
     $second4=floor((strtotime($enddate)-strtotime($startdate4))%86400%60);
     $cha4=$date4*86400+$hour4*3600+$minute4*60+$second4;
	 
	 $date5=floor((strtotime($enddate)-strtotime($startdate5))/86400);
     $hour5=floor((strtotime($enddate)-strtotime($startdate5))%86400/3600);
     $minute5=floor((strtotime($enddate)-strtotime($startdate5))%86400/60);
     $second5=floor((strtotime($enddate)-strtotime($startdate5))%86400%60);
     $cha5=$date5*86400+$hour5*3600+$minute5*60+$second5;
	 
	 if($cha1>=86400*30){$data['kc1']=2;}else{$data['kc1']=1;}
	 if($cha2>=86400*30){$data['kc2']=2;}else{$data['kc2']=1;}
	 if($cha3>=86400*30){$data['kc3']=2;}else{$data['kc3']=1;}
	 if($cha4>=86400*30){$data['kc4']=2;}else{$data['kc4']=1;}
	 if($cha5>=86400*30){$data['kc5']=2;}else{$data['kc5']=1;}
		$db->where($where)->save($data);		
		$this->assign('info',$info);
		$this->display();
	}
	
	
	
	
	
}
?>