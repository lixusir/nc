<?php
//矿场大厅动态 
class JiaoyiAction extends Action {
	
	
	//大厅动态 
    public function index(){
        $db = M('trade');
        $cur_date = strtotime(date('Y-m-d'));
        $low=M('trade')->where("buy_time >= '{$cur_date}'")->order('price asc')->find();
        $high=M('trade')->where("buy_time >= '{$cur_date}'")->order('price desc')->find();
        $cjl=M('trade')->where("buy_time >= '{$cur_date}'")->order('price desc')->count(); 
		$new=M('trade')->where("buy_time >= '{$cur_date}'")->order('buy_time desc')->find();
        $fu=($high['price']-$low['price'])/$low['price'];		
        $where1['type'] = 1;
        $where2['type'] = 2;
        $info1=$db->where($where1)->select();
		$info2=$db->where($where2)->select();
       

        $this->assign('info1',$info1);
        $this->assign('info2',$info2);
        $this->assign('low',$low['price']);	
        $this->assign('high',$high['price']);	
        $this->assign('cjl',$cjl);	
        $this->assign('fu',$fu);	
        $this->assign('newcj',$new['price']);
		$this->display();
		
        //$this->display();
    }
	public function market(){//交易市场首页
		$db = M('trade');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		$this->assign('info',$info); 
		
		$this->display();
	}
	public function market2(){//交易市场首页
		$db = M('trade');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		$this->assign('info',$info); 
		
		$this->display();
	}
	public function market_Detail(){//交易市场详情
	$id=$_GET['id'];
		$db = M('trade');
		$db_b=M('config');//配置表
		$where_b['id']=1;//开盘价
		$info_b=$db_b->where($where_b)->find();
		$kp_b=$info_b['kp'.$id];
		$cur_date = strtotime(date('Y-m-d'));//今日成交量
        $today_cjnum=M('trade')->where("buy_time >= '{$cur_date}'")->sum('num');//今日成交量
		//echo $today_cjnum;exit;
		$where2['userid']=session('uid');
		$user=M('userlist')->where($where2)->find();
		$where_a['gsid']=$_GET['id'];
		$info_a=$db->where($where_a,'zt=1')->order('buy_time desc')->find();//当前最新成交的价格，现价info_a['price']
		$x_price=$info_a['price'];
		$info_c=$db->where($where_a,'zt=1')->order('price asc')->find();//最低
		$info_d=$db->where($where_a,'zt=1')->order('price desc')->find();//最高
		
		            if($id==2){$gsnum=$user['hetao'];$guoshi='核桃';}else{
					if($id==8){$gsnum=$user['shiliu'];$guoshi='石榴';}
					if($id==9){$gsnum=$user['hongzao'];$guoshi='红枣';}
					if($id==10){$gsnum=$user['putao'];$guoshi='葡萄';}
					if($id==14){$gsnum=$user['hamigua'];$guoshi='哈密瓜';}
					if($id==15){$gsnum=$user['xiangli'];$guoshi='香梨';}
					if($id==16){$gsnum=$user['shamoguo'];$guoshi='沙漠果';}
					if($id==17){$gsnum=$user['renshenguo'];$guoshi='人参果';}
					if($id==18){$gsnum=$user['xunyichao'];$guoshi='薰衣草';}
					if($id==19){$gsnum=$user['shamorenshen'];$guoshi='沙漠人参';}
					if($id==20){$gsnum=$user['badanmu'];$guoshi='巴旦木';}
					if($id==21){$gsnum=$user['hetianyu'];$guoshi='和田玉';}
					if($id==0){$gsnum=$user['zhongzi'];$guoshi='种子';}
					}
		
		
		$info=$db->where("sell_userid=".session('uid') )->select();
		$info2=$db->where("buy_userid=".session('uid')  )->select();
		
		
		$this->assign('info',$info);//我的委托交易，买和卖 
		$this->assign('info2',$info2);
		$this->assign('gsnum',$gsnum);
		$this->assign('gold',$user['gold']);
		$this->assign('guoshi',$guoshi);//果实名
		$this->assign('x_price',$info_a['price']);
		$this->assign('kp_b',$kp_b);//当前的各个果实的开盘价
		$this->assign('low',$info_c['price']);//最低价
		$this->assign('high',$info_d['price']);//最高价
		$this->assign('today_cjnum',$today_cjnum);//今日成交量
		$this->assign('zf',($x_price-$kp_b)/$kp_b);//涨幅%
		
		$this->display();
	}
	public function buyNow(){//买入
		$db = M('trade');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		$price=I('param.buyPrice');//买入价
		$num=I('param.buyNums');//买入数量
		$id=I('param.crops_id');//买入ID		
		
		//会员表
        $db = M('trade');
		$dbc = M('game_config');
		$wherec['id'] = 1;
		$infoc=$dbc->where($wherec)->find();
		$low=$infoc['open_price'.$id]-$infoc['open_price'.$id]*cfg_data(config_limit_down)/100;//最低价
		$high=$infoc['open_price'.$id]+$infoc['open_price'.$id]*cfg_data(config_limit_up)/100;//最高价
		$db4 = M('userlist');
        $where = array('userid' => session('uid'));
		$infou=M('userlist')->where($where)->find();
		
        $info2=$db->where('price=$price and  num=$num and gsid=.$id and type=2 and zt=0')->find();
		$info4=$db4->where($where)->find();
		$where4['userid'] = $info2['userid'] ;        	
        $info = $db->where($where)->find();
		
			if($info2['price']){//有买入的价格和数量
				if( $info4['gold']  < $price*$num+$price*$num*cfg_data(config_trade_cost)/100 ){ 
				$arr['code']=1;
			    $arr['message']='金币不足请充值';						
				}else{//人民币够
				$data['zfb']=$infou['zfb'];
				$data['buy_time']=date('y-m-d H:i:s');
				$data['buy_userid']=session('uid');
			    $data['buy_username']=session('username');
				$data['zt']=1;				
				 //给求购求加
                $data4['gold']=$info['gold']-$price*$num; //求购者减gold
				$data4['dong']=$info['dong']+$num;
				if($id==2){$data4['hetao']=$info['hetao']+$num;}else{
					if($id==8){$data4['shiliu']=$info['shiliu']+$num;}
					if($id==9){$data4['hongzao']=$info['hongzao']+$num;}
					if($id==10){$data4['putao']=$info['putao']+$num;}
					if($id==14){$data4['hamigua']=$info['hamigua']+$num;}
					if($id==15){$data4['xiangli']=$info['xiangli']+$num;}
					if($id==16){$data4['shamoguo']=$info['shamoguo']+$num;}
					if($id==17){$data4['renshenguo']=$info['renshenguo']+$num;}
					if($id==18){$data4['xunyichao']=$info['xunyichao']+$num;}
					if($id==19){$data4['shamorenshen']=$info['shamorenshen']+$num;}
					if($id==20){$data4['badanmu']=$info['badanmu']+$num;}
					if($id==21){$data4['hetianyu']=$info['hetianyu']+$num;}
					}
                 //求购者加
				$db4->where($where)->save($data4);
				//卖家加
				 $datas['gold']=$info['gold']+$price*$num; //卖家加加人民币，卖家挂售时已经扣除了果实，这里不再扣除。               
				$db4->where($where4)->save($datas);
				//加入总买数量与总花的人民币
				$datam['zong_mai_num'.$id]=$info4['zong_mai_num'.$id]+$num;
				$datam['zong_cost_'.$id]=$info4['zong_cost_'.$id]+$num*$price;
				$db4->where($where)->save($datam);				
				if($db->where("id=".$info2['id'] and "zt=0")->save($data)){//购买成功。以此相同价格ID更新
				$arr['code']=2;
			    $arr['message']='买入成功';
				}else{					
				   $arr['code']=1;
			       $arr['message']='数据保存失败';	 
				}
			}
			  }else{//没有此价格和数量
				if($price < $low || $price > $high){$arr['code']=1;$arr['message']='单价不能偏离市价';}else{
				
				$data['zfb']=$infou['zfb'];
				$data['buy_userid']=session('uid');
				$data['username']=session('username');
				$data['price']=$price;
				$data['num']=$num;
				$data['gsid']=$id;//果实ID
				$data['money']=$num*$price;
				$data['type']=1;//挂售
				$data['add_time']=date('y-m-d H:i:s');
				if($db->add($data)){
					$arr['code']=1;$arr['message']='已加入委托交易';					
				}else{
					$arr['code']=1;$arr['message']='委托交易数据保存失败';
				}
				 }
			}		
		$this->ajaxReturn($arr,'JSON');		
		$this->display();
	}
	public function sellNow(){//卖出
		$db = M('trade');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		$price=I('param.sellPrice');//卖出价
		$num=I('param.sellNums');//卖出数量
		$id=I('param.crops_id');//卖出ID		
		
		//会员表
        $db = M('trade');
		$dbc = M('game_config');
		$wherec['id'] = 1;
		$infoc=$dbc->where($wherec)->find();
		$low=$infoc['open_price'.$id]-$infoc['open_price'.$id]*cfg_data(config_limit_down)/100;//最低价
		$high=$infoc['open_price'.$id]+$infoc['open_price'.$id]*cfg_data(config_limit_up)/100;//最高价
		$db4 = M('userlist');
        $where = array('userid' => session('uid'));
		$infou=M('userlist')->where($where)->find();		
        $info2=$db->where('price=$price and  num=$num and gsid=.$id and type=1 and zt=0')->find();
		$info4=$db4->where($where)->find();
		$where4['userid'] = $info2['buy_userid'] ;        	
        $info = $db->where($where)->find();
		
			if($info2['price']){//有买入的价格和数量
				if( $info4['gold']  < $price*$num+$price*$num*cfg_data(config_trade_cost)/100 ){ 
				$arr['code']=1;
			    $arr['message']='金币不足请充值';						
				}else{//人民币够
				$data['zfb']=$infou['zfb'];
				$data['sell_time']=date('y-m-d H:i:s');
				$data['sell_userid']=session('uid');			    
				$data['zt']=1;	
                $db->where($where4)->save($data4);				
				 //给求购求加
                $data4['gold']=$info['gold']+$price*$num; //求购者加gold				
				if($id==2){$data4['hetao']=$info['hetao']-$num;}else{
					if($id==8){$data4['shiliu']=$info['shiliu']-$num;}
					if($id==9){$data4['hongzao']=$info['hongzao']-$num;}
					if($id==10){$data4['putao']=$info['putao']-$num;}
					if($id==14){$data4['hamigua']=$info['hamigua']-$num;}
					if($id==15){$data4['xiangli']=$info['xiangli']-$num;}
					if($id==16){$data4['shamoguo']=$info['shamoguo']-$num;}
					if($id==17){$data4['renshenguo']=$info['renshenguo']-$num;}
					if($id==18){$data4['xunyichao']=$info['xunyichao']-$num;}
					if($id==19){$data4['shamorenshen']=$info['shamorenshen']-$num;}
					if($id==20){$data4['badanmu']=$info['badanmu']-$num;}
					if($id==21){$data4['hetianyu']=$info['hetianyu']-$num;}
					}
                 //卖家减
				$db4->where($where4)->save($data4);
				//买家加
				 $datas['gold']=$info['gold']+$price*$num; //               
				$db4->where($where)->save($datas);
				//加入总买数量与总花的人民币
				$datam['zong_mai_num'.$id]=$info4['zong_mai_num'.$id]+$num;
				$datam['zong_cost_'.$id]=$info4['zong_cost_'.$id]+$num*$price;
				$db4->where($where)->save($datam);				
				if($db->where("id=".$info2['id'] and "zt=0")->save($data)){//购买成功。以此相同价格ID更新
				$arr['code']=2;
			    $arr['message']='买入成功';
				}else{					
				   $arr['code']=1;
			       $arr['message']='数据保存失败';	 
				}
			}
			  }else{//没有此价格和数量
				if($price < $low || $price > $high){$arr['code']=1;$arr['message']='单价不能偏离市价';}else{
				
				$data['zfb']=$infou['zfb'];
				$data['sell_userid']=session('uid');				
				$data['price']=$price;
				$data['num']=$num;
				$data['gsid']=$id;//果实ID
				$data['money']=$num*$price;
				$data['type']=2;//挂售
				$data['add_time']=date('y-m-d H:i:s');
				if($db->add($data)){
					$arr['code']=1;$arr['message']='已加入委托交易';					
				}else{
					$arr['code']=1;$arr['message']='委托交易数据保存失败';
				}
				 }
			}		
		$this->ajaxReturn($arr,'JSON');		
		$this->display();
	}
	public function revoked_order(){
		$db = M('trade');
        $where['id'] = I('param.code');
		$data['zt']=2;
		if($db->where($where)->delete()){
			$arr['code']=1;
			$arr['msg']='撤消成功';
		}else{
			$arr['code']=0;
			$arr['msg']='撤消数据保存失败';
		}
		$this->ajaxReturn($arr,'JSON');
		$this->display();
	}
	public function cropsEntrust(){//委托管理
		$db = M('trade');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		$this->assign('info',$info); 
		
		$this->display();
	}
	public function cropsTrade(){//交易记录
		$db = M('trade');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		$this->assign('info',$info); 
		
		$this->display();
	}
	public function cropsReborn(){//果实重生
		$db = M('userlist');
        $where['userid'] = session('uid');
		$info=$db->where($where)->find();
		$this->assign('info',$info);
		
		$this->assign('hetao',$info['hetao']);
		$this->assign('shiliu',$info['shiliu']);
		$this->assign('hongzao',$info['hetao']);
		$this->assign('putao',$info['putao']);
		$this->assign('hamigua',$info['hamigua']);
		$this->assign('xiangli',$info['xiangli']);
		$this->assign('shamoguo',$info['shamoguo']);
		$this->assign('renshenguo',$info['renshenguo']);
		$this->assign('xunyichao',$info['xunyichao']);
		$this->assign('shamorenshen',$info['shamorenshen']);
		$this->assign('badanmu',$info['badanmu']);
		$this->assign('hetianyu',$info['hetianyu']);
		//echo session('uid');exit;
		$this->display();
	}
	public function cropsRebornList(){//果实重生记录
		$db = M('congsheng');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		$this->assign('info',$info); 
		//echo session('uid');exit;
		$this->display();
	}
	

	public function cropsGive(){//果实赠送
		$db = M('userlist');
        $where['userid'] = session('uid');
		$info=$db->where($where)->find();
		$where2['userid'] = $recieve;
		$info2=$db->where($where2)->find();
		$crops_id=I('param.crops_id');
		$recieve=I('param.recieve');
		$number=I('param.number');
		
		if(!$info2['userid']){$arr['status']=0;$arr['info']='没有此会员ID';}
		else{
		  if($_GET['act']==1){
		if($crops_id==16){$data['shamoguo']=$info['shamoguo']-$number-$number*10/100;$data2['shamoguo']=$info['shamoguo']+$number;}
		if($crops_id==17){$data['renshenguo']=$info['renshenguo']-$number-$number*10/100;$data2['renshenguo']=$info['renshenguo']+$number;}
		if($crops_id==18){$data['xunyichao']=$info['xunyichao']-$number-$number*10/100;$data2['xunyichao']=$info['xunyichao']+$number;}
		if($crops_id==19){$data['shamorenshen']=$info['shamorenshen']-$number-$number*10/100;$data2['shamorenshen']=$info['shamorenshen']+$number;}
		if($crops_id==20){$data['badanmu']=$info['badanmu']-$number-$number*10/100;$data2['badanmu']=$info['badanmu']+$number;}
		if($crops_id==21){$data['hetianyu']=$info['hetianyu']-$number-$number*10/100;$data2['hetianyu']=$info['hetianyu']+$number;}
		if($crops_id==8){$data['shiliu']=$info['shiliu']-$number-$number*10/100;$data2['shiliu']=$info['shiliu']+$number;}
		if($crops_id==15){$data['xiangli']=$info['xiangli']-$number-$number*10/100;$data2['xiangli']=$info['xiangli']+$number;}
		
		$a=$db->where($where2)->save($data2);
		    if($db->where($where)->save($data) && $a){//对方加
				$arr['status']=1;
				$arr['info']='赠送成功';
			}else{
				$arr['status']=0;
				$arr['info']='数据保存失败';
			}
		
			$this->ajaxReturn($arr,'JSON');
		  }
		
		
		
		
		$this->assign('info',$info);

		}		
		//echo session('uid');exit;
		$this->display();
	}
	public function cropsGive_act(){
		$crops_id=I('param.crops_id');
		$recieve=I('param.recieve');
		$number=I('param.number');
        $db = M('userlist');
        $where['userid'] = session('uid');
		$info=$db->where($where)->find();
		$where2['userid'] = $recieve;
		$info2=$db->where($where2)->find();
		if($number<10){$arr['status']=0;
		$this->error('数量必须大于10');}
		
		if(!$info2['userid']){
			$arr['status']=0;
		$this->error('没有此会员ID');
		}
		else{
		  //if($_GET['act']==1){
		if($crops_id==16){$guoshi='沙漠果';$data['shamoguo']=$info['shamoguo']-$number-$number*10/100;$data2['shamoguo']=$info['shamoguo']+$number;}
		if($crops_id==17){$guoshi='人参果';$data['renshenguo']=$info['renshenguo']-$number-$number*10/100;$data2['renshenguo']=$info['renshenguo']+$number;}
		if($crops_id==18){$guoshi='薰衣草';$data['xunyichao']=$info['xunyichao']-$number-$number*10/100;$data2['xunyichao']=$info['xunyichao']+$number;}
		if($crops_id==19){$guoshi='沙漠人能';$data['shamorenshen']=$info['shamorenshen']-$number-$number*10/100;$data2['shamorenshen']=$info['shamorenshen']+$number;}
		if($crops_id==20){$guoshi='巴旦木';$data['badanmu']=$info['badanmu']-$number-$number*10/100;$data2['badanmu']=$info['badanmu']+$number;}
		if($crops_id==21){$guoshi='和田玉';$data['hetianyu']=$info['hetianyu']-$number-$number*10/100;$data2['hetianyu']=$info['hetianyu']+$number;}
		if($crops_id==8){$guoshi='石榴';$data['shiliu']=$info['shiliu']-$number-$number*10/100;$data2['shiliu']=$info['shiliu']+$number;}
		if($crops_id==15){$guoshi='香梨';$data['xiangli']=$info['xiangli']-$number-$number*10/100;$data2['xiangli']=$info['xiangli']+$number;}
		//赠送记录
		$data3['userid']=session('uid');
		$data3['jieshou']=$recieve;
		$data3['guoshi']=$guoshi;
		$data3['num']=$number*10/100;
		$data3['shouxu']=$number*10/100;
		$data3['time']=date('y-m-d H:i:s');
		$b=M('songlog')->add($data3);
		$a=$db->where($where2)->save($data2);
		    if($db->where($where)->save($data) && $a && $b){//对方加
				$this->success('赠送成功');
			}else{
				$this->error('数据保存失败');
			}
		
			
		 // }
		}
         

	}
	public function cropsGiveList(){//赠送记录
		$db = M('songlog');
        $where['userid'] = session('uid');
		$info=$db->where($where)->select();
		
		
		$this->assign('info',$info);
		$this->display();
	}
	public function jyact2(){//买入挂单，
		$db = M('trade');
        $where['id']=$_GET['id'];		
        $info=$db->where($where)->find();
		$db2 = M('userlist');
        $where2['userid']=session('uid');        			
        $info2=$db2->where($where2)->find();
		$where3['userid']=$info['userid'];
		if($info2['tiekz']<$_GET['num']+$_GET['num']*30/100){
			$this->error('你的帐户余额不足');
		}else{
			$data['tiekz']=$info2['tiekz']-$_GET['num']-$_GET['num']*30/100;//自己减
			$aa=$db2->where($where2)->save($data);
			$data2['tiekz']=$info2['tiekz']+$_GET['num'];//买家加
			$bb=$db2->where($where3)->save($data2);
			$data3['zt']=2;//更新状态 交易完成 
			$data3['buy_userid']=session('uid');
			$data3['buy_username']=session('username');
			$data3['buy_time']=date('y-m-d H:i:s');
			$cc=$db->where($where)->save($data3);
			if($aa && $bb && $cc){
				$this->success('交易成功');//还未扣除手续费
			}else{$this->error('交易失败');}
		}
		
		
	}
	public function buy_kj1(){
		$db = M('userlist');
        $where['userid']=session('uid');		
        $info=$db->where($where)->find();
		if($_GET['act']==1){
		if($info['tiekz']<10){
			$arr['info']=1;			
		}else{
			
			$data['tiekz']=$info['tiekz']-10;
            $data['kc_kjtime1']=date('y-m-d H:i:s');
            $data['kc1']=1;
            $db->where($where)->save($data);
$arr['info']=2; 			
		}
		$this->ajaxReturn($arr,'JSON');
		
		}
		$this->display();
	}
	public function buy_kj2(){
		$db = M('userlist');
        $where['userid']=session('uid');		
        $info=$db->where($where)->find();
		if($_GET['act']==1){
		if($info['tiekz']<100){
			$arr['info']=1;			
		}else{
			
			$data['tiekz']=$info['tiekz']-100;
            $data['kc_kjtime2']=date('y-m-d H:i:s');
            $data['kc2']=1; 
            $db->where($where)->save($data);
            $arr['info']=2; 			
		}
		$this->ajaxReturn($arr,'JSON');
		}
		$this->display();
	}
	public function buy_kj3(){
		$db = M('userlist');
        $where['userid']=session('uid');		
        $info=$db->where($where)->find();
		if($_GET['act']==1){
		if($info['tiekz']<1000){
			$arr['info']=1;			
		}else{
			
			$data['tiekz']=$info['tiekz']-1000;
            $data['kc_kjtime3']=date('y-m-d H:i:s');
            $data['kc3']=1; 
$db->where($where)->save($data);
$arr['info']=2; 			
		}
		$this->ajaxReturn($arr,'JSON');
		}
		$this->display();
	}
	public function buy_kj4(){
		$db = M('userlist');
        $where['userid']=session('uid');		
        $info=$db->where($where)->find();
		if($_GET['act']==1){
		if($info['tiekz']<10000){
			$arr['info']=1;		
		}else{
			
			$data['tiekz']=$info['tiekz']-10000;
            $data['kc_kjtime4']=date('y-m-d H:i:s');
             $data['kc4']=1; 
$db->where($where)->save($data); 
$arr['info']=2;			 
		}
		$this->ajaxReturn($arr,'JSON');
		}
		$this->display();
	}
	public function buy_kj5(){
		$db = M('userlist');
        $where['userid']=session('uid');		
        $info=$db->where($where)->find();
		if($_GET['act']==1){
		if($info['tiekz']<100000){
			$arr['info']=1;		
		}else{
			
			$data['tiekz']=$info['tiekz']-100000;
            $data['kc_kjtime5']=date('y-m-d H:i:s');
            $data['kc5']=1; 
$db->where($where)->save($data);
$arr['info']=2;  			
		}
		$this->ajaxReturn($arr,'JSON');
		}
		$this->display();
	}
	    public function kjsc(){
		$db = M('userlist');
        $where['userid']=session('uid');		
        $info=$db->where($where)->find();
		$kc1=$info['kc1'];
		$kc2=$info['kc2'];
		$kc3=$info['kc3'];
		$kc4=$info['kc4'];
		$kc5=$info['kc5'];
        $this->assign('kc1',$kc1);
		$this->assign('kc2',$kc2);
		$this->assign('kc3',$kc3);
		$this->assign('kc4',$kc4);
		$this->assign('kc5',$kc5);
		$this->display();
		}
	//出售会员帐号
	public function sell_acc(){
		$dba = M('user');
        $wherea['id']=session('uid');		
        $infoa=$dba->where($wherea)->find();		
		
        $db = M('trade');        
        
		//$price=$_GET['price'];
		$price=I('price');
		if(empty($price)){
			$this->error('价格不能为空');exit;
		}else{
		$data['userid']=session('uid');  
        $data['username']=session('username');	
		$data['account']=session('username');
		$data['pwd']=$infoa['password'];
		$data['type']='会员帐号';
		$data['price']=$price;
        $data['goodname']='会员帐号';
        $data['zhuanshi']=$price;
        $data['add_time']=date('y-m-d h:i:s');		 
        if($db->add($data)){
			$this->success('出售成功，交易市场查看');
		}else{
			$this->success('出售失败');
		}
		}
       		
		
        
    }
	
	//购买列表
    public function buy(){
        $db = M('selllist');
        $where['status']=0;
        $info = $db->where($where)->order('addtime desc')->select();	
        $this->assign('info',$info); 
			$this->display();
    }
	
	
	public function buyact(){
		$id=$_GET['id'];
		$db = M('selllist'); 
		$where['id']=$id;
          if($_GET['userid']==session('uid')){
			  $this->error('不能购买自己的商品');
		  }		
			
				$data2['selled_time']=date('y-m-d h:i:s');
			    $data2['status']=1;//卖出为1，0为出售中。
			    $data2['buy_username']=session('username');
				$data2['buy_userid']=session('uid');
				$ab=$db->where($where)->save($data2);
				if($ab){
				$this->success('购买成功');
			     }else{
					 $this->error('购买成功');
					 }
			
	}
	public function ok_fukuan(){
		$id=$_GET['id'];
		$db = M('selllist'); 
		$where['id']=$id;
		$data2['status']=2;//卖出为1，0为出售中。
		$ab=$db->where($where)->save($data2);
		if($ab){
				$this->success('已付款');
			     }else{
					 $this->error('错误');
					 }
	}
	public function ok_shoukuan(){
		$id=$_GET['id'];
		$db = M('selllist'); 
		$where['id']=$id;		
		$info=$db->where($where)->find();
		$buy_userid=$info['buy_userid'];
		
		$db2 = M('userlist'); 
		$where2['userid']=$buy_userid;
		$info2=$db2->where($where2)->find();
		$data3['zong_zhuanshi']=$info2['zong_zhuanshi']+$info['cost_silver'];
		$bb=$db2->where($where2)->save($data3);
		
		$data2['status']=3;//卖出为1，0为出售中。
		$ab=$db->where($where)->save($data2);
		if($ab && $bb){
				$this->success('交易成功');
			     }else{
					 $this->error('错误');
					 }
	}
	//出售记录表
	public function selljl(){
		$db=M('selllist');
		$where['userid']=session('uid');
		$info=$db->where($where)->order('addtime desc')->select();
		
		$this->assign('info',$info);
		$this->display();
	}
	//基金分红
	public function fh(){
		$db=M('fh');
		$where['userid']=session('uid');
		$info=$db->where($where)->order('tz_time desc')->select();
		
		$this->assign('info',$info);
		$this->display();
	}
	//购买记录表
	public function buyjl(){
		$db=M('selllist');
		$where['buy_userid']=session('uid');
		$info=$db->where($where)->order('buy_time desc')->select();
		
		$this->assign('info',$info);
		$this->display();
		
		
	}
	
	//出售处理 
    public function sellact(){
        $db = M('userlist');        
		//配置数据库
		$dba = M('config');
         $infoa=$dba->where(1==1)->find();		
        $where = array('userid' => session('uid'));
		$info=$db->where($where)->find();
		
		if(IS_GET)
        {
            $p2=$_GET["p2"];
			$j2=$_GET["j2"];
			$n2=$_GET["n2"];	
        }		
		if ($infoa['kg_sell'] == 0){		
		$e=3;	//如果不是矿长，不能出售				
		}		
		else{
		
		if ($info['tieky'] - $n2 < 0){	
		//永久矿石不够出售	
		$e=2	;
			
		}else{
		
		//满足条件执行
		     $data = array(
            'tieky' => $info['tieky'] - $n2,           
            );
			$db->data($data)->save();
		//插入公告？
		//新增出售记录
		 $data2 = array(
            'saleid' => $p2, 
			'userid' => session('uid'), 
			'username' => session('username'),
			'cost_silver' => $n2,
			'money' => $j2,
			'status' => 0,
			'addtime' => date("Y-m-d H:i:s"),
			          
            );
	     M('selllist')->data($data2)->add();
		
		$e=1;    //出售成功
		
		
		}
		
		}
		
		 
		
		$arr['status']=$e;
        $arr['num']=$n2;    
        
        $this->ajaxReturn ($arr,'JSON');
        $this->display();
    }
	
	//出售 
    public function sell(){
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
    }
	
	
	
	
	
}
?>