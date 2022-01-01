<?php
//会员中心控制器
class UserAction extends CommonAction {
	public function index(){
		$db = M('Userlist');
        $where = array('userid' => session('uid'));		    
        $info = $db->where($where)->select();
		$info2 = $db->where($where)->find();
		
		$this->assign('info',$info); 
		$this->assign('gold',$info2['gold']); 
		$this->display();
	}
	public function getNowHouseImg(){
		$db = M('userlist');
        $where = array('userid'=>session('uid'));
		$info=$db->where($where)->field('fangwu')->find();
		$arr['img']='house_list/'.$info['fangwu'].'.png';
        $this->ajaxreturn($arr,'json');       
        $this->display();
	}
	public function tou($uid=null){
		$uid=$_GET['userid'];
		
		if(autotou($uid)==1){
			$this->success('偷摘成功！');
		}else{
			$this->success('偷摘失败！');
		}
		
	}
	public function notice(){
		$db = M('notice');        
		$info=$db->order('id desc')->select();
		
        $this->assign('info',$info);
        $this->display();
	}
	public function newview(){//淘金内容新闻页
		$db = M('notice');
        $where['id']=$_GET['id'];		    
        $info = $db->where($where)->find();
		
		$this->assign('title',$info['title']);
		$this->assign('content',$info['content']);
		$this->assign('time',$info['time']);
		$this->display();		
	}
	public function newlist(){
        $db = M('notice');
        

        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

        $info = $db
       
        ->limit($Page->firstRow.','.$Page->listRows)
        ->order('id desc')
        ->select();

        $this->assign('info',$info);
        $this->assign('page',$show);
        $this->display();
    }
	
	
	
	
	public function notice2(){
		$db = M('gonglue');        
		$info=$db->order('id desc')->select();
		
        $this->assign('info',$info);
        $this->display();
	}
	public function newview2(){//淘金内容新闻页
		$db = M('gonglue');
        $where['id']=$_GET['id'];		    
        $info = $db->where($where)->find();
		
		$this->assign('title',$info['title']);
		$this->assign('content',$info['content']);
		$this->assign('time',$info['time']);
		$this->display();		
	}
	public function newlist2(){
        $db = M('gonglue');
        

        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

        $info2 = $db
       
        ->limit($Page->firstRow.','.$Page->listRows)
        ->order('id desc')
        ->select();

        $this->assign('info2',$info2);
        $this->assign('page',$show);
        $this->display();
    }
	
	public function memberGoFriendHouse(){
		$db=M("userlist");
		$where['userid'] =  $_GET['userid'];
		$db3=M("config");
		$where3['id']=1;
		$info3=$db3->where($where3)->select();
		$info = $db->where($where)->select();
		$info4 = $db->where($where)->find();
		
       	$dbr=M("rizhi");
		$wherer = array('userid' => session('uid'));
        $infor = $dbr->where($wherer)->select();
        $infop = $db->order('gold desc')->limit(10)->select();//排行		
		$db_cw=M("congwu");
		$where_cw = array('userid' => session('uid'));
		$info_cw=$db_cw->where($where_cw)->find();
		if(!$info_cw){$cw=0;}else{$cw=1;}
		$jypec=$info_cw['jinyan']/5*$info_cw['lvl']*($info_cw['lvl']+1);
	//自动收获
		$startdate1=$info4['autoshou_kttime'];
        $enddate=date("Y-m-d H:i:s");
        $date=floor((strtotime($enddate)-strtotime($startdate1))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate1))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate1))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate1))%86400%60);
     $jindutime1=$date*86400+$hour*3600+$minute*60+$second;
	 //echo $jindutime1;exit;
	    if($jindutime1>3600){$data['autoshou']=0;$db->where($where)->save($data);$sy1=0;}else{$sy1=3600-$jindutime1;}
	//自动播种	
		$startdate2=$info4['autoshou_kttime'];
        $enddate=date("Y-m-d H:i:s");
        $date=floor((strtotime($enddate)-strtotime($startdate2))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate2))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate2))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate2))%86400%60);
     $jindutime2=$date*86400+$hour*3600+$minute*60+$second;
	 //echo $jindutime1;exit;
	    if($jindutime2>3600){$data['autobozong']=0;$db->where($where)->save($data);$sy2=0;}else{$sy2=3600-$jindutime2;}
		//同步房屋与土地
		if($info4['fangwu']==1){
			if($info4['zt1']==-1){$data2['zt1']=0;}
		}else{
			if($info4['fangwu']==2){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				}
				if($info4['fangwu']==3){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				}
				if($info4['fangwu']==4){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				}
				if($info4['fangwu']==5){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				}
				if($info4['fangwu']==6){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				if($info4['zt6']==-1){$data2['zt6']=0;$data2['tudi6']=1;}
				}
				if($info4['fangwu']==7){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				if($info4['zt6']==-1){$data2['zt6']=0;$data2['tudi6']=1;}
				if($info4['zt7']==-1){$data2['zt7']=0;$data2['tudi7']=1;}
				}
				if($info4['fangwu']==8){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				if($info4['zt6']==-1){$data2['zt6']=0;$data2['tudi6']=1;}
				if($info4['zt7']==-1){$data2['zt7']=0;$data2['tudi7']=1;}
				if($info4['zt8']==-1){$data2['zt8']=0;$data2['tudi8']=1;}
				}
				if($info4['fangwu']==9){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				if($info4['zt6']==-1){$data2['zt6']=0;$data2['tudi6']=1;}
				if($info4['zt7']==-1){$data2['zt7']=0;$data2['tudi7']=1;}
				if($info4['zt8']==-1){$data2['zt8']=0;$data2['tudi8']=1;}
				if($info4['zt9']==-1){$data2['zt9']=0;$data2['tudi9']=1;}
				}
				if($info4['fangwu']==10){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				if($info4['zt6']==-1){$data2['zt6']=0;$data2['tudi6']=1;}
				if($info4['zt7']==-1){$data2['zt7']=0;$data2['tudi7']=1;}
				if($info4['zt8']==-1){$data2['zt8']=0;$data2['tudi8']=1;}
				if($info4['zt9']==-1){$data2['zt9']=0;$data2['tudi9']=1;}
				if($info4['zt10']==-1){$data2['zt10']=0;$data2['tudi10']=1;}
				}
				if($info4['fangwu']==11){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				if($info4['zt6']==-1){$data2['zt6']=0;$data2['tudi6']=1;}
				if($info4['zt7']==-1){$data2['zt7']=0;$data2['tudi7']=1;}
				if($info4['zt8']==-1){$data2['zt8']=0;$data2['tudi8']=1;}
				if($info4['zt9']==-1){$data2['zt9']=0;$data2['tudi9']=1;}
				if($info4['zt10']==-1){$data2['zt10']=0;$data2['tudi10']=1;}
				if($info4['zt11']==-1){$data2['zt11']=0;$data2['tudi11']=1;}
				}
				if($info4['fangwu']==12){
				if($info4['zt1']==-1){$data2['zt1']=0;$data2['tudi1']=1;}
				if($info4['zt2']==-1){$data2['zt2']=0;$data2['tudi2']=1;}
				if($info4['zt3']==-1){$data2['zt3']=0;$data2['tudi3']=1;}
				if($info4['zt4']==-1){$data2['zt4']=0;$data2['tudi4']=1;}
				if($info4['zt5']==-1){$data2['zt5']=0;$data2['tudi5']=1;}
				if($info4['zt6']==-1){$data2['zt6']=0;$data2['tudi6']=1;}
				if($info4['zt7']==-1){$data2['zt7']=0;$data2['tudi7']=1;}
				if($info4['zt8']==-1){$data2['zt8']=0;$data2['tudi8']=1;}
				if($info4['zt9']==-1){$data2['zt9']=0;$data2['tudi9']=1;}
				if($info4['zt10']==-1){$data2['zt10']=0;$data2['tudi10']=1;}
				if($info4['zt11']==-1){$data2['zt11']=0;$data2['tudi11']=1;}
				if($info4['zt12']==-1){$data2['zt12']=0;$data2['tudi12']=1;}
				}
		}
		$db->where($where)->save($data2);
		$db_cfg=M("game_config");
		$where_cfg['id']=1;
		$info_cfg=$db_cfg->where($where_cfg)->find();	

    	//载入模板	
        $this->assign('info',$info);
		$this->assign('username',$info4['username']);
		$this->assign('userid',$info4['userid']);
		$this->assign('lvl',$info4['lvl']);
		$this->assign('fangwu',$info4['fangwu']);//房屋
		$this->assign('gold',$info4['gold']);
		$this->assign('zs',$info4['zs']);
		$this->assign('bg1',$info4['bg1']);
		$this->assign('bg2',$info4['bg2']);
		$this->assign('bg3',$info4['bg3']);
		$this->assign('infor',$infor);//日志
		$this->assign('infop',$infop);//排行
		$this->assign('xuhao',1);//序号 
        $this->assign('sign',$info4['sign']);//序号	
         $this->assign('congwu',$cw);//宠物	
        $this->assign('nickname',$info_cw['nickname']);//宠物昵称
		$this->assign('cw_lvl',$info_cw['lvl']);
		$this->assign('cw_hp',$info_cw['hp']);
		
		$this->assign('cw_defense',$info_cw['defense']);
		$this->assign('cw_attak',$info_cw['attak']);
		$this->assign('cw_shudu',$info_cw['shudu']);
		$this->assign('cw_xinyun',$info_cw['xinyun']);
		$this->assign('cw_tili',$info_cw['tili']);
		$this->assign('cw_jinyan',$jypec);
		$this->assign('cw_pingfen',$info_cw['pingfen']);
		$this->assign('cw_zt',$info_cw['zt']);//宠物状态
		$this->assign('cw_sy1',$sy1);//宠物自动收获 剩余时间
		$this->assign('cw_sy2',$sy2);//宠物自动播种 剩余时间
		$this->assign('tudi1',$info4['tudi1']);
		$this->assign('tudi2',$info4['tudi2']);
		$this->assign('tudi3',$info4['tudi3']);
		$this->assign('tudi4',$info4['tudi4']);
		$this->assign('tudi5',$info4['tudi5']);
		$this->assign('tudi6',$info4['tudi6']);
		$this->assign('tudi7',$info4['tudi7']);
		$this->assign('tudi8',$info4['tudi8']);
		$this->assign('tudi9',$info4['tudi9']);
		$this->assign('tudi10',$info4['tudi10']);
		$this->assign('tudi11',$info4['tudi11']);
		$this->assign('tudi12',$info4['tudi12']);
		$this->assign('config_till_price',$info_cfg['config_till_price']);//播种花费金币
		$this->assign('config_seed_count',$info_cfg['config_seed_count']);//播种花费种子
		
        
			$this->display();
		
	}
	
    public function Zhsz(){
        //检测是否已登录
        if(!session('uid') or !session('username')){
            $this->error('还没有登录，请登录后查看！',U('Login/index'));
        }
        //会员表
        $db = M('Userlist');
        $where = array('userid' => session('uid'));		    
        $user = $db->where($where)->select();
		//矿工表
		$db2 = M('Userlist');
        $where2 = array('userid' => session('uid'));
		$field = array ('rmb');	
        $info = $db2->where($where2)->find();	    
        $user2 = $db2->where($where2)->select();
		$zfb=$info['zfb'];
		$nickname=$info['nickname'];
        
		session('password', $user['password']);
		session('userqq', $user['userqq']);
        session('zfb', $user['zfb']);
        session('weixin', $user['weixin']);  
		session('phone', $user['phone']); 
		session('rmb', $user2['rmb']); 
		$this->assign('zfb',$zfb); 
		$this->assign('nickname',$nickname);
		$this->assign('user',$user);
		$this->assign('user2',$user2); 
        $this->display();
    }
	public function forget(){
		
		$this->display();
	}
	public function plantSeeds(){//播种
	    $cost_gold=cfg_data(config_till_price);//花费金币
		$cost_zznum=cfg_data(config_seed_count);//花费种子
	    $landNum=I('param.landNum');
		$id='tudi'.$landNum;		
		$tudiid=cha_userlist($id);//0是戈壁滩，1，2，3升级
		if($tudiid==0){$rand0=2;}else{if($tudiid==1){$rand0=4;}if($tudiid==2){$rand0=6;}if($tudiid==3){$rand0=12;}}
		$rands=rand(1,$rand0);
		if($rands==1){$gs='hetao';}else{if($rands==2){$gs='shiliu';}if($rands==3){$gs='hongzao';}if($rands==4){$gs='putao';}
		if($rands==5){$gs='hamigua';}if($rands==6){$gs='xiangli';}if($rands==7){$gs='shamoguo';}if($rands==8){$gs='renshenguo';}
		if($rands==9){$gs='xunyichao';}if($rands==10){$gs='shamorenshen';}if($rands==11){$gs='badanmu';}if($rands==12){$gs='hetianyu';}
		}
		
		
		//echo $gs;exit;
		$db = M('userlist');
		$where['userid'] = session('uid');		
		$info=$db->where($where)->find();
		if($info['zt'.$landNum]==1){
			$arr['code']=0;$arr['msg']='已经播种了，不要重复';
			}else{
		//echo $info['zhongzi'];exit;
		if($info['gold']<$cost_gold || $info['zhongzi']<$cost_zznum){
			$arr['code']=0;$arr['msg']='种子或金币不足'; 
		 }else{
		$data['sc'.$landNum]=0;//杀虫恢复未杀
		$data['js'.$landNum]=0;//浇水恢复
		$data['cc'.$landNum]=0;//除草恢复
		$data['sf'.$landNum]=0;//施肥恢复
		$data['zz_count'.$landNum]=$info['zz_count'.$landNum]+1;//计算每块地的种植次数  	 
		$data['land_gs'.$landNum]=$gs;//播种 时根据土地等级，该 播种哪些种子，收获也按这个	 
        $data['zt'.$landNum]=1;	
		$data['gold']=$info['gold']-$cost_gold;
		$data['zhongzi']=$info['zhongzi']-$cost_zznum;
        $data['jinyan'.$landNum]=$info['jinyan'.$landNum]+$info['lvl'];	//加经验	
		//$data['nc'.$landNum]=1;
		$data['kttime'.$landNum]=date('y-m-d H:i:s');
		
		$data2['userid']=session('uid');
		$data2['time']=date('y-m-d H:i:s');
		$data2['landid']=$landNum;
		$data2['record']='在地块'.$x.'播种了'.$gs.'种子';
		M('rizhi')->add($data2);
		
		if($db->where($where)->save($data)){$arr['code']=1;$arr['msg']='播种成功！';$arr['gold']=$info['gold'];}else{$arr['code']=0;$arr['msg']='播种失败！';}		
		
		}
			}
		 
		
		$this->ajaxreturn($arr,'JSON');	
		$this->display();
	}
	public function getLandCropsImg(){ //播种后返回的图片
		$db = M('trade');
		$where['id'] = $_GET['id'];
		$info=$db->where($where)->find();
		$db2 = M('userlist');
		$where2['userid'] = session('uid');
		$where3['userid'] = $info['buy_userid'];
		$info3=$db->where($where3)->find();
		$info2=$db->where($where2)->find();
		$arr['reStatus']=0;
		$arr['reCtrl']='zuowu';
		$arr['reImg']='/gold/img/index/zz.png';
		$this->ajaxreturn($arr,'JSON');	
		$this->display();
		
	}
	public function getWarehouseForMyStockData(){ //播种后返回的图片
		$db = M('trade');
		$where['id'] = $_GET['id'];
		$info=$db->where($where)->find();
		$db2 = M('userlist');
		$where2['userid'] = session('uid');
		$where3['userid'] = $info['buy_userid'];
		$info3=$db->where($where3)->find();
		$info2=$db->where($where2)->find();
		$arr['reStatus']=0;
		$arr['reCtrl']='zuowu';
		$arr['reImg']='/gold/img/index/zz.png';
		$this->ajaxreturn($arr,'JSON');	
		$this->display();
		
	}
	public function ajaxReborn(){//重生
		$db = M('Userlist');
		$where['userid'] =  session('uid');			
        $info = $db->where($where)->find();
		$goods_id=I('param.goods_id');
		if($goods_id==1){$goods='hetao';}if($goods_id==4){$goods='putao';}if($goods_id==7){$goods='shamoguo';}if($goods_id==10){$goods='shamorenshen';}
		if($goods_id==2){$goods='shiliu';}if($goods_id==5){$goods='hamigua';}if($goods_id==8){$goods='renshenguo';}if($goods_id==11){$goods='badanmu';}
		if($goods_id==3){$goods='hongzao';}if($goods_id==6){$goods='xiangli';}if($goods_id==9){$goods='xunyichao';}if($goods_id==12){$goods='hetianyu';}
		$count=I('param.count');
		$bili=cfg_data(config_reborn_odds);
		$shouxu=cfg_data(config_reborn_cost);
		$data[$goods]=$info[$goods]-$info[$goods]*$bili/100-$info[$goods]*$shouxu/100;
		$data['zhongzi']=$info['zhongzi']+$count*$bili/100;
		if($db->where($where)->save($data)){
            $data2['userid']=session('uid');
			$data2['username']=session('username');			
			$data2['good_name']=$goods;
			$data2['num']=$count*$bili/100;
			$data2['get_zz']=$count*$bili/100;
			$data2['shouxu']=$info[$goods]*$shouxu/100;
			$data2['time']=date('y-m-d H:i:s');
			if(M('congsheng')->add($data2)){
			$arr['code']=1;
			$arr['msg']='重生成功';
			}else{
				$arr['code']=0;
			$arr['msg']='写入重生记录失败';
			}
		}else{
			$arr['code']=0;
			$arr['msg']='数据保存失败';
		}
		$this->ajaxReborn($arr,'json');
		$this->display();
	}
	public function get_user(){
		$db = M('Userlist');
		$where['userid'] =  session('uid');			
        $info = $db->where($where)->find(); 
		
		    //$data['userid']=session('uid');
			//$data['username']=session('username');
			//$db->add($data);
		//echo (int)time_cha($info['wy_time'])/3600*cfg_data(config_pet_hour);exit;
    $sign_time=strtotime($info['sign_time']);
    $jt3=strtotime(date('Y-m-d',time()).' 00:00:00');
	
    if($sign_time-$jt3<0){$data['dhzs']=0;$data['sign']=0;$db->where($where)->save($data);}	
		//PHP计算两个时间差的方法 
     $lqtime1=time_cha(kttime1);$lqtime2=time_cha(kttime2);$lqtime3=time_cha(kttime3);$lqtime4=time_cha(kttime4);
	 $lqtime5=time_cha(kttime5);$lqtime6=time_cha(kttime6);$lqtime7=time_cha(kttime7);$lqtime8=time_cha(kttime8);
	 $lqtime9=time_cha(kttime9);$lqtime10=time_cha(kttime10);$lqtime11=time_cha(kttime11);$lqtime12=time_cha(kttime12);
	 //echo $info['kttime1'];exit;
	 //更新经验
	 if($info['jinyan'] >= 5*$info['lvl']*($info['lvl']+1)){$data['lvl']=$info['lvl']+1; $db->where($where)->save($data);}
     //查当前果实生长期	 
	 $arr['zz1']=cha_crops_zz($info['land_gs1']);$arr['zz2']=cha_crops_zz($info['land_gs2']);$arr['zz3']=cha_crops_zz($info['land_gs3']);
	 $arr['zz4']=cha_crops_zz($info['land_gs4']);$arr['zz5']=cha_crops_zz($info['land_gs5']);$arr['zz6']=cha_crops_zz($info['land_gs6']);
	 $arr['zz7']=cha_crops_zz($info['land_gs7']);$arr['zz8']=cha_crops_zz($info['land_gs8']);$arr['zz9']=cha_crops_zz($info['land_gs9']);
	 $arr['zz10']=cha_crops_zz($info['land_gs10']);$arr['zz11']=cha_crops_zz($info['land_gs11']);$arr['zz12']=cha_crops_zz($info['land_gs12']);
	 
	 $arr['fy1']=cha_crops_fy($info['land_gs1']);$arr['fy2']=cha_crops_fy($info['land_gs2']);$arr['fy3']=cha_crops_fy($info['land_gs3']);
	 $arr['fy4']=cha_crops_fy($info['land_gs4']);$arr['fy5']=cha_crops_fy($info['land_gs5']);$arr['fy6']=cha_crops_fy($info['land_gs6']);
	 $arr['fy7']=cha_crops_fy($info['land_gs7']);$arr['fy8']=cha_crops_fy($info['land_gs8']);$arr['fy9']=cha_crops_fy($info['land_gs9']);
	 $arr['fy10']=cha_crops_fy($info['land_gs10']);$arr['fy11']=cha_crops_fy($info['land_gs11']);$arr['fy12']=cha_crops_fy($info['land_gs12']);
	 
	 $arr['sz1']=cha_crops_sz($info['land_gs1']);$arr['sz2']=cha_crops_sz($info['land_gs2']);$arr['sz3']=cha_crops_sz($info['land_gs3']);
	 $arr['sz4']=cha_crops_sz($info['land_gs4']);$arr['sz5']=cha_crops_sz($info['land_gs5']);$arr['sz6']=cha_crops_sz($info['land_gs6']);
	 $arr['sz7']=cha_crops_sz($info['land_gs7']);$arr['sz8']=cha_crops_sz($info['land_gs8']);$arr['sz9']=cha_crops_sz($info['land_gs9']);
	 $arr['sz10']=cha_crops_sz($info['land_gs10']);$arr['sz11']=cha_crops_sz($info['land_gs11']);$arr['sz12']=cha_crops_sz($info['land_gs12']);
	 
	 
	 $config_pest_odds=(int)100/cfg_data(config_pest_odds);
	 //echo cha_crops_sz();
	 //echo $info['zz_count1'];
	 //exit;
	 if($info['zz_count1']==$config_pest_odds && $info['sc1']==0 && $info['tuchongsx']==0){$arr['ch1']=1;}else{$arr['ch1']=0;}//虫害发生
	 if($info['zz_count2']==$config_pest_odds && $info['sc2']==0 && $info['tuchongsx']==0){$arr['ch2']=1;}else{$arr['ch2']=0;}//虫害发生
	 if($info['zz_count3']==$config_pest_odds && $info['sc3']==0 && $info['tuchongsx']==0){$arr['ch3']=1;}else{$arr['ch3']=0;}//虫害发生
	 if($info['zz_count4']==$config_pest_odds && $info['sc4']==0 && $info['tuchongsx']==0){$arr['ch4']=1;}else{$arr['ch4']=0;}//虫害发生
	 if($info['zz_count5']==$config_pest_odds && $info['sc5']==0 && $info['tuchongsx']==0){$arr['ch5']=1;}else{$arr['ch5']=0;}//虫害发生
	 if($info['zz_count6']==$config_pest_odds && $info['sc6']==0 && $info['tuchongsx']==0){$arr['ch6']=1;}else{$arr['ch6']=0;}//虫害发生
	 if($info['zz_count7']==$config_pest_odds && $info['sc7']==0 && $info['tuchongsx']==0){$arr['ch7']=1;}else{$arr['ch7']=0;}//虫害发生
	 if($info['zz_count8']==$config_pest_odds && $info['sc8']==0 && $info['tuchongsx']==0){$arr['ch8']=1;}else{$arr['ch8']=0;}//虫害发生
	 if($info['zz_count9']==$config_pest_odds && $info['sc9']==0 && $info['tuchongsx']==0){$arr['ch9']=1;}else{$arr['ch9']=0;}//虫害发生
	 if($info['zz_count10']==$config_pest_odds && $info['sc10']==0 && $info['tuchongsx']==0){$arr['ch10']=1;}else{$arr['ch10']=0;}//虫害发生
	 if($info['zz_count11']==$config_pest_odds && $info['sc11']==0 && $info['tuchongsx']==0){$arr['ch11']=1;}else{$arr['ch11']=0;}//虫害发生
	 if($info['zz_count12']==$config_pest_odds && $info['sc12']==0 && $info['tuchongsx']==0){$arr['ch12']=1;}else{$arr['ch12']=0;}//虫害发生
	 $config_drought_odds=(int)100/cfg_data(config_drought_odds);
	 if($info['zz_count1']==$config_drought_odds && $info['js1']==0 && $info['yulusx']==0){$arr['gh1']=1;}else{$arr['gh1']=0;}//干旱发生
	 if($info['zz_count2']==$config_drought_odds && $info['js2']==0  && $info['yulusx']==0){$arr['gh2']=1;}else{$arr['gh2']=0;}//干旱发生
	 if($info['zz_count3']==$config_drought_odds && $info['js3']==0  && $info['yulusx']==0){$arr['gh3']=1;}else{$arr['gh3']=0;}//干旱发生
	 if($info['zz_count4']==$config_drought_odds && $info['js4']==0  && $info['yulusx']==0){$arr['gh4']=1;}else{$arr['gh4']=0;}//干旱发生
	 if($info['zz_count5']==$config_drought_odds && $info['js5']==0  && $info['yulusx']==0){$arr['gh5']=1;}else{$arr['gh5']=0;}//干旱发生
	 if($info['zz_count6']==$config_drought_odds && $info['js6']==0  && $info['yulusx']==0){$arr['gh6']=1;}else{$arr['gh6']=0;}//干旱发生
	 if($info['zz_count7']==$config_drought_odds && $info['js7']==0  && $info['yulusx']==0){$arr['gh7']=1;}else{$arr['gh7']=0;}//干旱发生
	 if($info['zz_count8']==$config_drought_odds && $info['js8']==0  && $info['yulusx']==0){$arr['gh8']=1;}else{$arr['gh8']=0;}//干旱发生
	 if($info['zz_count9']==$config_drought_odds && $info['js9']==0  && $info['yulusx']==0){$arr['gh9']=1;}else{$arr['gh9']=0;}//干旱发生
	 if($info['zz_count10']==$config_drought_odds && $info['js10']==0  && $info['yulusx']==0){$arr['gh10']=1;}else{$arr['gh10']=0;}//干旱发生
	 if($info['zz_count11']==$config_drought_odds && $info['js11']==0  && $info['yulusx']==0){$arr['gh11']=1;}else{$arr['gh11']=0;}//干旱发生
	 if($info['zz_count12']==$config_drought_odds && $info['js12']==0  && $info['yulusx']==0){$arr['gh12']=1;}else{$arr['gh12']=0;}//干旱发生
	 $config_weed_odds=(int)100/cfg_data(config_weed_odds);//杂草发生
	 if($info['zz_count1']==$config_weed_odds && $info['cc1']==0  && $info['shichaosx']==0){$arr['zc1']=1;}else{$arr['zc1']=0;}
	 if($info['zz_count2']==$config_weed_odds && $info['cc2']==0  && $info['shichaosx']==0){$arr['zc2']=1;}else{$arr['zc2']=0;}
	 if($info['zz_count3']==$config_weed_odds && $info['cc3']==0  && $info['shichaosx']==0){$arr['zc3']=1;}else{$arr['zc3']=0;}
	 if($info['zz_count4']==$config_weed_odds && $info['cc4']==0  && $info['shichaosx']==0){$arr['zc4']=1;}else{$arr['zc4']=0;}
	 if($info['zz_count5']==$config_weed_odds && $info['cc5']==0  && $info['shichaosx']==0){$arr['zc5']=1;}else{$arr['zc5']=0;}
	 if($info['zz_count6']==$config_weed_odds && $info['cc6']==0  && $info['shichaosx']==0){$arr['zc6']=1;}else{$arr['zc6']=0;}
	 if($info['zz_count7']==$config_weed_odds && $info['cc7']==0  && $info['shichaosx']==0){$arr['zc7']=1;}else{$arr['zc7']=0;}
	 if($info['zz_count8']==$config_weed_odds && $info['cc8']==0  && $info['shichaosx']==0){$arr['zc8']=1;}else{$arr['zc8']=0;}
	 if($info['zz_count9']==$config_weed_odds && $info['cc9']==0  && $info['shichaosx']==0){$arr['zc9']=1;}else{$arr['zc9']=0;}
	 if($info['zz_count10']==$config_weed_odds && $info['cc10']==0  && $info['shichaosx']==0){$arr['zc10']=1;}else{$arr['zc10']=0;}
	 if($info['zz_count11']==$config_weed_odds && $info['cc11']==0  && $info['shichaosx']==0){$arr['zc11']=1;}else{$arr['zc11']=0;}
	 if($info['zz_count12']==$config_weed_odds && $info['cc12']==0  && $info['shichaosx']==0){$arr['zc12']=1;}else{$arr['zc12']=0;}
	 //播种次数检查，满10归0	
	 zz_count();
	 //自动 收获 检查状态 ,如果 大于成熟期,ZT=1.5
	
	//神像到期检测	
	 if($info['shichaosx']==1 && time_cha(shichaosx_kttime)>cfg_data(config_weed_reduce2)*3600){$data['shichaosx']==0;}//弑草神像到期归0
	 if($info['tuchongsx']==1 && time_cha(tuchongsx_kttime)>cfg_data(config_weed_time3)*3600){$data['tuchongsx']==0;}//杀虫神像到期归0
	 if($info['yulusx']==1 && time_cha(yulusx_kttime)>cfg_data(config_weed_odds2)*3600){$data['yulusx']==0;}//雨露神像到期归0
	 if($info['fengshousx']==1 && time_cha(fengshousx_kttime)>cfg_data(config_weed_time2)*3600){$data['fengshousx']==0;}//丰收神像到期归0
	 //自动收获,播种
     if(time_cha(autoshou_kttime)>cfg_data(config_auto_harvest_time)*3600){$data2['autoshou']=0;}if(time_cha(autobozong_kttime)>cfg_data(config_auto_seed_time)*3600){$data2['autobozong']=0;}	 
	 $db->where($where)->save($data2);//更新
	//echo $info['zz_count1'];exit;
	//宠物升级,宠物每小时消耗体力
	cwupate();cw_cost_tili();
	
	 $arr['sys_name']=cfg_data(sys_name);//网站名配置
	 $arr['cw_jy']=cw_info(jinyan);//宠物现在的经验
	 $arr['cw_name']=cw_info(nickname);//宠物名
	 $arr['cw_pingfen']=cw_info(cw_pingfen);
	 $arr['cw_luck']=cw_info(xinyun);
	 $arr['cw_speed']=cw_info(shudu);
	 $arr['cw_attak']=cw_info(attak);
	 $arr['cw_defense']=cw_info(defense);
	 $arr['cw_lvl']=cw_info(lvl);
	 $arr['cw_hp']=cw_info(hp);
	 $arr['cw_pingfen']=cw_info(pingfen);
	 $arr['cw_tili_t']=cw_info(tili);
	 $arr['cw_jinyan']=cw_info(jinyan);
	 $arr['cw_jinyan_t']=cw_info(jinyan)/5*cw_info(lvl)*(cw_info(lvl)+1)*100;
	 $arr['next_jy']=5*cw_info(lvl)*(cw_info(lvl)+1);//宠物级别
	 $arr['sf1']=$info['sf1'];
	 $arr['sf2']=$info['sf2'];
	 $arr['sf3']=$info['sf3'];
	 $arr['sf4']=$info['sf4'];
	 $arr['sf5']=$info['sf5'];
	 $arr['sf6']=$info['sf6'];
	 $arr['sf7']=$info['sf7'];
	 $arr['sf8']=$info['sf8'];
	 $arr['sf9']=$info['sf9'];
	 $arr['sf10']=$info['sf10'];
	 $arr['sf11']=$info['sf11'];
	 $arr['sf12']=$info['sf12'];
	 $arr['youjifei']=$info['youjifei'];
	 $arr['zt1']=$info['zt1'];
	 $arr['zt2']=$info['zt2'];
	 $arr['zt3']=$info['zt3'];
	 $arr['zt4']=$info['zt4'];
	 $arr['zt5']=$info['zt5'];
	 $arr['zt6']=$info['zt6'];
	 $arr['zt7']=$info['zt7'];
	 $arr['zt8']=$info['zt8'];
	 $arr['zt9']=$info['zt9'];
	 $arr['zt10']=$info['zt10'];
	 $arr['zt11']=$info['zt11'];
	 $arr['zt12']=$info['zt12'];
	 $arr['lqtime1']=$lqtime1;//播种了多少时间,秒
	 $arr['lqtime2']=$lqtime2;
	 $arr['lqtime3']=$lqtime3;
	 $arr['lqtime4']=$lqtime4;
	 $arr['lqtime5']=$lqtime5;
	 $arr['lqtime6']=$lqtime6;
	 $arr['lqtime7']=$lqtime7;
	 $arr['lqtime8']=$lqtime8;
	 $arr['lqtime9']=$lqtime9;
	 $arr['lqtime10']=$lqtime10;
	 $arr['lqtime11']=$lqtime11;
	 $arr['lqtime12']=$lqtime12;
	 $arr['lvl']=$info['lvl'];$arr['fangwu']=$info['fangwu'];$arr['f_img']=$info['fangwu'];
	 $arr['jinyan']=$info['jinyan'];
	 $arr['hetao']=$info['hetao'];//核桃
	 $arr['hongzao']=$info['hongzao'];//红枣
	 $arr['putao']=$info['putao'];
	 $arr['hamigua']=$info['hamigua'];
	 $arr['shamoguo']=$info['shamoguo'];
	 $arr['renshenguo']=$info['renshenguo'];
	 $arr['xunyichao']=$info['xunyichao'];
	 $arr['shamorenshen']=$info['shamorenshen'];
	 $arr['badanmu']=$info['badanmu'];
	 $arr['hetianyu']=$info['hetianyu'];
	 $arr['shiliu']=$info['shiliu'];
	 $arr['xiangli']=$info['xiangli'];
	 $arr['muban']=$info['muban'];
	 $arr['shitou']=$info['shitou'];
	 $arr['gangchai']=$info['gangchai'];
	 $arr['lvbaoshi']=$info['lvbaoshi'];
	 $arr['zhibaoshi']=$info['zhibaoshi'];
	 $arr['lanbaoshi']=$info['lanbaoshi'];
	 $arr['huangbaoshi']=$info['huangbaoshi'];
	 $arr['zhongzi']=$info['zhongzi'];
	 $arr['shashuihu']=$info['shashuihu'];
	 $arr['tongbaox']=$info['tongbaox'];
	 $arr['yinbaox']=$info['yinbaox'];
	 $arr['jinbaox']=$info['jinbaox'];
	 $arr['chutou']=$info['chutou'];
	 $arr['chuchaoji']=$info['chuchaoji'];
	 $arr['fengshousx']=$info['fengshousx'];//4神像
	 $arr['yulusx']=$info['yulusx'];
	 $arr['shichaosx']=$info['shichaosx'];
	 $arr['tuchongsx']=$info['tuchongsx'];
	 $arr['zs']=$info['zs'];
	 $arr['gold']=$info['gold'];
	 $arr['config_pest_time']=cfg_data(config_pest_time);//虫害产生时间小时
	 $arr['config_pest_odds']=cfg_data(config_pest_odds);//虫害产生时间几率
	 $arr['config_pest_reduce']=cfg_data(config_pest_reduce);//虫害减少
	 $arr['config_drought_time']=cfg_data(config_drought_time);//干旱产生时间小时
	 $arr['config_drought_odds']=cfg_data(config_drought_odds);//几率
	 $arr['config_drought_reduce']=cfg_data(config_drought_reduce);//减少
	 $arr['config_weed_time']=cfg_data(config_weed_time);//杂草产生时间小时
	 $arr['config_weed_odds']=cfg_data(config_weed_odds);//几率
	 $arr['config_weed_reduce']=cfg_data(config_weed_reduce);//减少
	 $arr['config_weed_time2']=cfg_data(config_weed_time2);//丰收女神持续时间
	 $arr['config_weed_odds2']=cfg_data(config_weed_odds2);//雨露女神持续时间
	 $arr['config_weed_reduce2']=cfg_data(config_weed_reduce2);// 弑草女神持续时间：  
	 $arr['config_weed_time3']=cfg_data(config_weed_time3);// 屠虫女神持续时间：  
	 $arr['config_bumper_count']=cfg_data(config_bumper_count);//丰收女神增加产量
	 $arr['land_gs1']=$info['land_gs1'];//播种了什么果实种子
	 $arr['land_gs2']=$info['land_gs2'];//播种了什么果实种子
	 $arr['land_gs3']=$info['land_gs3'];//播种了什么果实种子
	 $arr['land_gs4']=$info['land_gs4'];//播种了什么果实种子
	 $arr['land_gs5']=$info['land_gs5'];//播种了什么果实种子
	 $arr['land_gs6']=$info['land_gs6'];//播种了什么果实种子
	 $arr['land_gs7']=$info['land_gs7'];//播种了什么果实种子
	 $arr['land_gs8']=$info['land_gs8'];//播种了什么果实种子
	 $arr['land_gs9']=$info['land_gs9'];//播种了什么果实种子
	 $arr['land_gs10']=$info['land_gs10'];//播种了什么果实种子
	 $arr['land_gs11']=$info['land_gs11'];//播种了什么果实种子
	 $arr['land_gs12']=$info['land_gs12'];//播种了什么果实种子
	 $arr['zz_count1']=$info['zz_count1'];//种植了多少次，以此计算虫害，干旱，杂草 ，几率
	 $arr['zz_count2']=$info['zz_count2'];
	 $arr['zz_count3']=$info['zz_count3'];
	 $arr['zz_count4']=$info['zz_count4'];
	 $arr['zz_count5']=$info['zz_count5'];
	 $arr['zz_count6']=$info['zz_count6'];
	 $arr['zz_count7']=$info['zz_count7'];
	 $arr['zz_count8']=$info['zz_count8'];
	 $arr['zz_count9']=$info['zz_count9'];
	 $arr['zz_count10']=$info['zz_count10'];
	 $arr['zz_count11']=$info['zz_count11'];
	 $arr['zz_count12']=$info['zz_count12'];
	 $arr['pet_rose_heart']=cw_info(pet_rose_heart);//玫瑰之心
	 $arr['pet_rose_heart_t']=cw_info(pet_rose_heart)/1000;//玫瑰之心
	 
	$this->ajaxreturn($arr,'JSON');
	$this->display();
		
	}
	public function get_user2(){//偷菜的信息
		$db = M('Userlist');		
        $where['userid'] =  $_GET['userid'];	
        $info = $db->where($where)->find(); 
		
    $sign_time=strtotime($info['sign_time']);
    $jt3=strtotime(date('Y-m-d',time()).' 00:00:00');
	//echo sign_time-jt3;exit;
    if($sign_time-$jt3<0){$data['sign']=0;$db->where($where)->save($data);}	
		//PHP计算两个时间差的方法 
      $lqtime1=time_cha(kttime1);$lqtime2=time_cha(kttime2);$lqtime3=time_cha(kttime3);$lqtime4=time_cha(kttime4);
	 $lqtime5=time_cha(kttime5);$lqtime6=time_cha(kttime6);$lqtime7=time_cha(kttime7);$lqtime8=time_cha(kttime8);
	 $lqtime9=time_cha(kttime9);$lqtime10=time_cha(kttime10);$lqtime11=time_cha(kttime11);$lqtime12=time_cha(kttime12);
	 //更新经验
	 if($info['jinyan'] >= 5*$info['lvl']*($info['lvl']+1)){$data['lvl']=$info['lvl']+1; $db->where($where)->save($data);}
     //查当前果实生长期	 
	 $arr['zz1']=cha_crops_zz($info['land_gs1']);$arr['zz2']=cha_crops_zz($info['land_gs2']);$arr['zz3']=cha_crops_zz($info['land_gs3']);
	 $arr['zz4']=cha_crops_zz($info['land_gs4']);$arr['zz5']=cha_crops_zz($info['land_gs5']);$arr['zz6']=cha_crops_zz($info['land_gs6']);
	 $arr['zz7']=cha_crops_zz($info['land_gs7']);$arr['zz8']=cha_crops_zz($info['land_gs8']);$arr['zz9']=cha_crops_zz($info['land_gs9']);
	 $arr['zz10']=cha_crops_zz($info['land_gs10']);$arr['zz11']=cha_crops_zz($info['land_gs11']);$arr['zz12']=cha_crops_zz($info['land_gs12']);
	 
	 $arr['fy1']=cha_crops_fy($info['land_gs1']);$arr['fy2']=cha_crops_fy($info['land_gs2']);$arr['fy3']=cha_crops_fy($info['land_gs3']);
	 $arr['fy4']=cha_crops_fy($info['land_gs4']);$arr['fy5']=cha_crops_fy($info['land_gs5']);$arr['fy6']=cha_crops_fy($info['land_gs6']);
	 $arr['fy7']=cha_crops_fy($info['land_gs7']);$arr['fy8']=cha_crops_fy($info['land_gs8']);$arr['fy9']=cha_crops_fy($info['land_gs9']);
	 $arr['fy10']=cha_crops_fy($info['land_gs10']);$arr['fy11']=cha_crops_fy($info['land_gs11']);$arr['fy12']=cha_crops_fy($info['land_gs12']);
	 
	 $arr['sz1']=cha_crops_sz($info['land_gs1']);$arr['sz2']=cha_crops_sz($info['land_gs2']);$arr['sz3']=cha_crops_sz($info['land_gs3']);
	 $arr['sz4']=cha_crops_sz($info['land_gs4']);$arr['sz5']=cha_crops_sz($info['land_gs5']);$arr['sz6']=cha_crops_sz($info['land_gs6']);
	 $arr['sz7']=cha_crops_sz($info['land_gs7']);$arr['sz8']=cha_crops_sz($info['land_gs8']);$arr['sz9']=cha_crops_sz($info['land_gs9']);
	 $arr['sz10']=cha_crops_sz($info['land_gs10']);$arr['sz11']=cha_crops_sz($info['land_gs11']);$arr['sz12']=cha_crops_sz($info['land_gs12']);
	 
	 $config_pest_odds=(int)100/cfg_data(config_pest_odds);
	 if($info['zz_count1']==$config_pest_odds && $info['sc1']==0 && $info['tuchongsx']==0){$arr['ch1']=1;}else{$arr['ch1']=0;}//虫害发生
	 if($info['zz_count2']==$config_pest_odds && $info['sc2']==0 && $info['tuchongsx']==0){$arr['ch2']=1;}else{$arr['ch2']=0;}//虫害发生
	 if($info['zz_count3']==$config_pest_odds && $info['sc3']==0 && $info['tuchongsx']==0){$arr['ch3']=1;}else{$arr['ch3']=0;}//虫害发生
	 if($info['zz_count4']==$config_pest_odds && $info['sc4']==0 && $info['tuchongsx']==0){$arr['ch4']=1;}else{$arr['ch4']=0;}//虫害发生
	 if($info['zz_count5']==$config_pest_odds && $info['sc5']==0 && $info['tuchongsx']==0){$arr['ch5']=1;}else{$arr['ch5']=0;}//虫害发生
	 if($info['zz_count6']==$config_pest_odds && $info['sc6']==0 && $info['tuchongsx']==0){$arr['ch6']=1;}else{$arr['ch6']=0;}//虫害发生
	 if($info['zz_count7']==$config_pest_odds && $info['sc7']==0 && $info['tuchongsx']==0){$arr['ch7']=1;}else{$arr['ch7']=0;}//虫害发生
	 if($info['zz_count8']==$config_pest_odds && $info['sc8']==0 && $info['tuchongsx']==0){$arr['ch8']=1;}else{$arr['ch8']=0;}//虫害发生
	 if($info['zz_count9']==$config_pest_odds && $info['sc9']==0 && $info['tuchongsx']==0){$arr['ch9']=1;}else{$arr['ch9']=0;}//虫害发生
	 if($info['zz_count10']==$config_pest_odds && $info['sc10']==0 && $info['tuchongsx']==0){$arr['ch10']=1;}else{$arr['ch10']=0;}//虫害发生
	 if($info['zz_count11']==$config_pest_odds && $info['sc11']==0 && $info['tuchongsx']==0){$arr['ch11']=1;}else{$arr['ch11']=0;}//虫害发生
	 if($info['zz_count12']==$config_pest_odds && $info['sc12']==0 && $info['tuchongsx']==0){$arr['ch12']=1;}else{$arr['ch12']=0;}//虫害发生
	 $config_drought_odds=(int)100/cfg_data(config_drought_odds);
	 if($info['zz_count1']==$config_pest_odds && $info['js1']==0 && $info['yulusx']==0){$arr['gh1']=1;}else{$arr['gh1']=0;}//干旱发生
	 if($info['zz_count2']==$config_pest_odds && $info['js2']==0  && $info['yulusx']==0){$arr['gh2']=1;}else{$arr['gh2']=0;}//干旱发生
	 if($info['zz_count3']==$config_pest_odds && $info['js3']==0  && $info['yulusx']==0){$arr['gh3']=1;}else{$arr['gh3']=0;}//干旱发生
	 if($info['zz_count4']==$config_pest_odds && $info['js4']==0  && $info['yulusx']==0){$arr['gh4']=1;}else{$arr['gh4']=0;}//干旱发生
	 if($info['zz_count5']==$config_pest_odds && $info['js5']==0  && $info['yulusx']==0){$arr['gh5']=1;}else{$arr['gh5']=0;}//干旱发生
	 if($info['zz_count6']==$config_pest_odds && $info['js6']==0  && $info['yulusx']==0){$arr['gh6']=1;}else{$arr['gh6']=0;}//干旱发生
	 if($info['zz_count7']==$config_pest_odds && $info['js7']==0  && $info['yulusx']==0){$arr['gh7']=1;}else{$arr['gh7']=0;}//干旱发生
	 if($info['zz_count8']==$config_pest_odds && $info['js8']==0  && $info['yulusx']==0){$arr['gh8']=1;}else{$arr['gh8']=0;}//干旱发生
	 if($info['zz_count9']==$config_pest_odds && $info['js9']==0  && $info['yulusx']==0){$arr['gh9']=1;}else{$arr['gh9']=0;}//干旱发生
	 if($info['zz_count10']==$config_pest_odds && $info['js10']==0  && $info['yulusx']==0){$arr['gh10']=1;}else{$arr['gh10']=0;}//干旱发生
	 if($info['zz_count11']==$config_pest_odds && $info['js11']==0  && $info['yulusx']==0){$arr['gh11']=1;}else{$arr['gh11']=0;}//干旱发生
	 if($info['zz_count12']==$config_pest_odds && $info['js12']==0  && $info['yulusx']==0){$arr['gh12']=1;}else{$arr['gh12']=0;}//干旱发生
	 $config_weed_odds=(int)100/cfg_data(config_weed_odds);//杂草发生
	 if($info['zz_count1']==$config_pest_odds && $info['cc1']==0  && $info['shichaosx']==0){$arr['zc1']=1;}else{$arr['zc1']=0;}
	 if($info['zz_count2']==$config_pest_odds && $info['cc2']==0  && $info['shichaosx']==0){$arr['zc2']=1;}else{$arr['zc2']=0;}
	 if($info['zz_count3']==$config_pest_odds && $info['cc3']==0  && $info['shichaosx']==0){$arr['zc3']=1;}else{$arr['zc3']=0;}
	 if($info['zz_count4']==$config_pest_odds && $info['cc4']==0  && $info['shichaosx']==0){$arr['zc4']=1;}else{$arr['zc4']=0;}
	 if($info['zz_count5']==$config_pest_odds && $info['cc5']==0  && $info['shichaosx']==0){$arr['zc5']=1;}else{$arr['zc5']=0;}
	 if($info['zz_count6']==$config_pest_odds && $info['cc6']==0  && $info['shichaosx']==0){$arr['zc6']=1;}else{$arr['zc6']=0;}
	 if($info['zz_count7']==$config_pest_odds && $info['cc7']==0  && $info['shichaosx']==0){$arr['zc7']=1;}else{$arr['zc7']=0;}
	 if($info['zz_count8']==$config_pest_odds && $info['cc8']==0  && $info['shichaosx']==0){$arr['zc8']=1;}else{$arr['zc8']=0;}
	 if($info['zz_count9']==$config_pest_odds && $info['cc9']==0  && $info['shichaosx']==0){$arr['zc9']=1;}else{$arr['zc9']=0;}
	 if($info['zz_count10']==$config_pest_odds && $info['cc10']==0  && $info['shichaosx']==0){$arr['zc10']=1;}else{$arr['zc10']=0;}
	 if($info['zz_count11']==$config_pest_odds && $info['cc11']==0  && $info['shichaosx']==0){$arr['zc11']=1;}else{$arr['zc11']=0;}
	 if($info['zz_count12']==$config_pest_odds && $info['cc12']==0  && $info['shichaosx']==0){$arr['zc12']=1;}else{$arr['zc12']=0;}
	//神像到期检测	
	 if($info['shichaosx']==1 && time_cha(shichaosx_kttime)>cfg_data(config_weed_reduce2)*3600){$data['shichaosx']==0;}//弑草神像到期归0
	 if($info['tuchongsx']==1 && time_cha(tuchongsx_kttime)>cfg_data(config_weed_time3)*3600){$data['tuchongsx']==0;}//杀虫神像到期归0
	 if($info['yulusx']==1 && time_cha(yulusx_kttime)>cfg_data(config_weed_odds2)*3600){$data['yulusx']==0;}//雨露神像到期归0
	 if($info['fengshousx']==1 && time_cha(fengshousx_kttime)>cfg_data(config_weed_time2)*3600){$data['fengshousx']==0;}//丰收神像到期归0
	 //自动收获,播种
     if(time_cha(autoshou_kttime)>3600){$data2['autoshou']=0;}if(time_cha(autobozong_kttime)>3600){$data2['autobozong']=0;}	 
	 $db->where($where)->save($data2);//更新
	//echo $info['autoshou'];exit;
	//宠物升级
	cwupate();
	
	 $arr['sys_name']=cfg_data(sys_name);//网站名配置
	 $arr['cw_jy']=cw_info(jinyan);//宠物现在的经验
	 $arr['cw_name']=cw_info(nickname);//宠物名
	 $arr['cw_pingfen']=cw_info(cw_pingfen);
	 $arr['cw_luck']=cw_info(xinyun);
	 $arr['cw_speed']=cw_info(shudu);
	 $arr['cw_attak']=cw_info(attak);
	 $arr['cw_defense']=cw_info(defense);
	 $arr['cw_lvl']=cw_info(lvl);
	 $arr['cw_hp']=cw_info(hp);
	 $arr['cw_pingfen']=cw_info(pingfen);
	 $arr['cw_tili_t']=cw_info(tili);
	 $arr['cw_jinyan']=cw_info(jinyan);
	 $arr['cw_jinyan_t']=cw_info(jinyan)/5*cw_info(lvl)*(cw_info(lvl)+1)*100;
	 $arr['next_jy']=5*cw_info(lvl)*(cw_info(lvl)+1);//宠物级别
	 $arr['sf1']=$info['sf1'];
	 $arr['sf2']=$info['sf2'];
	 $arr['sf3']=$info['sf3'];
	 $arr['sf4']=$info['sf4'];
	 $arr['sf5']=$info['sf5'];
	 $arr['sf6']=$info['sf6'];
	 $arr['sf7']=$info['sf7'];
	 $arr['sf8']=$info['sf8'];
	 $arr['sf9']=$info['sf9'];
	 $arr['sf10']=$info['sf10'];
	 $arr['sf11']=$info['sf11'];
	 $arr['sf12']=$info['sf12'];
	 $arr['zt1']=$info['zt1'];
	 $arr['zt2']=$info['zt2'];
	 $arr['zt3']=$info['zt3'];
	 $arr['zt4']=$info['zt4'];
	 $arr['zt5']=$info['zt5'];
	 $arr['zt6']=$info['zt6'];
	 $arr['zt7']=$info['zt7'];
	 $arr['zt8']=$info['zt8'];
	 $arr['zt9']=$info['zt9'];
	 $arr['zt10']=$info['zt10'];
	 $arr['zt11']=$info['zt11'];
	 $arr['zt12']=$info['zt12'];
	 $arr['lqtime1']=$lqtime1;//播种了多少时间,秒
	 $arr['lqtime2']=$lqtime2;
	 $arr['lqtime3']=$lqtime3;
	 $arr['lqtime4']=$lqtime4;
	 $arr['lqtime5']=$lqtime5;
	 $arr['lqtime6']=$lqtime6;
	 $arr['lqtime7']=$lqtime7;
	 $arr['lqtime8']=$lqtime8;
	 $arr['lqtime9']=$lqtime9;
	 $arr['lqtime10']=$lqtime10;
	 $arr['lqtime11']=$lqtime11;
	 $arr['lqtime12']=$lqtime12;
	 $arr['lvl']=$info['lvl'];$arr['fangwu']=$info['fangwu'];$arr['f_img']=$info['fangwu'];
	 $arr['jinyan']=$info['jinyan'];
	 $arr['hetao']=$info['hetao'];//核桃
	 $arr['hongzao']=$info['hongzao'];//红枣
	 $arr['putao']=$info['putao'];
	 $arr['hamigua']=$info['hamigua'];
	 $arr['shamoguo']=$info['shamoguo'];
	 $arr['renshenguo']=$info['renshenguo'];
	 $arr['xunyichao']=$info['xunyichao'];
	 $arr['shamorenshen']=$info['shamorenshen'];
	 $arr['badanmu']=$info['badanmu'];
	 $arr['hetianyu']=$info['hetianyu'];
	 $arr['shiliu']=$info['shiliu'];
	 $arr['xiangli']=$info['xiangli'];
	 $arr['muban']=$info['muban'];
	 $arr['shitou']=$info['shitou'];
	 $arr['gangchai']=$info['gangchai'];
	 $arr['lvbaoshi']=$info['lvbaoshi'];
	 $arr['zhibaoshi']=$info['zhibaoshi'];
	 $arr['lanbaoshi']=$info['lanbaoshi'];
	 $arr['huangbaoshi']=$info['huangbaoshi'];
	 $arr['zhongzi']=$info['zhongzi'];
	 $arr['shashuihu']=$info['shashuihu'];
	 $arr['tongbaox']=$info['tongbaox'];
	 $arr['yinbaox']=$info['yinbaox'];
	 $arr['jinbaox']=$info['jinbaox'];
	 $arr['chutou']=$info['chutou'];
	 $arr['chuchaoji']=$info['chuchaoji'];
	 $arr['fengshousx']=$info['fengshousx'];//4神像
	 $arr['yulusx']=$info['yulusx'];
	 $arr['shichaosx']=$info['shichaosx'];
	 $arr['tuchongsx']=$info['tuchongsx'];
	 $arr['zs']=$info['zs'];
	 $arr['config_pest_time']=cfg_data(config_pest_time);//虫害产生时间小时
	 $arr['config_pest_odds']=cfg_data(config_pest_odds);//虫害产生时间几率
	 $arr['config_pest_reduce']=cfg_data(config_pest_reduce);//虫害减少
	 $arr['config_drought_time']=cfg_data(config_drought_time);//干旱产生时间小时
	 $arr['config_drought_odds']=cfg_data(config_drought_odds);//几率
	 $arr['config_drought_reduce']=cfg_data(config_drought_reduce);//减少
	 $arr['config_weed_time']=cfg_data(config_weed_time);//杂草产生时间小时
	 $arr['config_weed_odds']=cfg_data(config_weed_odds);//几率
	 $arr['config_weed_reduce']=cfg_data(config_weed_reduce);//减少
	 $arr['config_weed_time2']=cfg_data(config_weed_time2);//丰收女神持续时间
	 $arr['config_weed_odds2']=cfg_data(config_weed_odds2);//雨露女神持续时间
	 $arr['config_weed_reduce2']=cfg_data(config_weed_reduce2);// 弑草女神持续时间：  
	 $arr['config_weed_time3']=cfg_data(config_weed_time3);// 屠虫女神持续时间：  
	 $arr['config_bumper_count']=cfg_data(config_bumper_count);//丰收女神增加产量
	 $arr['land_gs1']=$info['land_gs1'];//播种了什么果实种子
	 $arr['land_gs2']=$info['land_gs2'];//播种了什么果实种子
	 $arr['land_gs3']=$info['land_gs3'];//播种了什么果实种子
	 $arr['land_gs4']=$info['land_gs4'];//播种了什么果实种子
	 $arr['land_gs5']=$info['land_gs5'];//播种了什么果实种子
	 $arr['land_gs6']=$info['land_gs6'];//播种了什么果实种子
	 $arr['land_gs7']=$info['land_gs7'];//播种了什么果实种子
	 $arr['land_gs8']=$info['land_gs8'];//播种了什么果实种子
	 $arr['land_gs9']=$info['land_gs9'];//播种了什么果实种子
	 $arr['land_gs10']=$info['land_gs10'];//播种了什么果实种子
	 $arr['land_gs11']=$info['land_gs11'];//播种了什么果实种子
	 $arr['land_gs12']=$info['land_gs12'];//播种了什么果实种子
	 $arr['zz_count1']=$info['zz_count1'];//种植了多少次，以此计算虫害，干旱，杂草 ，几率
	 $arr['zz_count2']=$info['zz_count2'];
	 $arr['zz_count3']=$info['zz_count3'];
	 $arr['zz_count4']=$info['zz_count4'];
	 $arr['zz_count5']=$info['zz_count5'];
	 $arr['zz_count6']=$info['zz_count6'];
	 $arr['zz_count7']=$info['zz_count7'];
	 $arr['zz_count8']=$info['zz_count8'];
	 $arr['zz_count9']=$info['zz_count9'];
	 $arr['zz_count10']=$info['zz_count10'];
	 $arr['zz_count11']=$info['zz_count11'];
	 $arr['zz_count12']=$info['zz_count12'];
	 
	$this->ajaxreturn($arr,'JSON');
	$this->display();
	}
	
	public function operationDisaster(){//浇水,除虫，施肥，除草
		$db = M('Userlist');
        $where = array('userid' => session('uid'));		    
        $info = $db->where($where)->find();
		$id=I('param.landNum');
		if(I('param.disasterType')=='goWater'){
			if($info['js'.$id]==1){
				$arr['reMsg']='已经浇水了';
			}else{
			if($info['shashuihu']<1){
				$arr['reMsg']='到商店购买洒水壶';
			}else{
				$data['shashuihu']=$info['shashuihu']-1;
				$data['js'.$id]=1;
				if($db->where($where)->save($data)){
				$arr['reTips']='Success';
				$arr['reMsg']='浇水成功';
				}else{$arr['reMsg']='浇水失败';}
			}}
		}else{
			if(I('param.disasterType')=='goWeed'){
				if($info['cc'.$id]==1){
				$arr['reMsg']='已经除草了';
			}else{
			if($info['chuchaoji']<1){
				$arr['reMsg']='到商店购买除草剂';
			}else{
				$data['chuchaoji']=$info['chuchaoji']-1;
				$data['cc'.$id]=1;
				if($db->where($where)->save($data)){
				$arr['reTips']='Success';
				$arr['reMsg']='除草成功';
				}else{$arr['reMsg']='除草失败';}
			}}
		}
		if(I('param.disasterType')=='goBug'){
			if($info['sc'.$id]==1){
				$arr['reMsg']='已经除虫了';
			}else{
			if($info['chuchongji']<1){
				$arr['reMsg']='到商店购买除虫剂';
			}else{
				$data['chuchongji']=$info['chuchongji']-1;
				$data['sc'.$id]=1;
				if($db->where($where)->save($data)){
				$arr['reTips']='Success';
				$arr['reMsg']='杀虫成功';
				}else{$arr['reMsg']='杀虫失败';}
			}}
		}
		if(I('param.disasterType')=='shifei'){
			if($id==null){$arr['reMsg']='ID为空';}else{
			if($info['sf'.$id]==1){
				$arr['reMsg']='已经施肥了';
			}else{
			if($info['youjifei']<1){
				$arr['reMsg']='到商店购买有机肥';
			}else{
				$data['youjifei']=$info['youjifei']-1;
				$data['sf'.$id]=1;
				if($db->where($where)->save($data)){
				$arr['reTips']='Success';                				
				$arr['reMsg']='+5果实';
				}else{$arr['reMsg']='施肥失败';}
			}}
		}}
			
			
		}
		$this->ajaxreturn($arr,'json');
		$this->display();
	}

	public function shop(){
		$db = M('Userlist');
        $where = array('userid' => session('uid'));		    
        $info = $db->where($where)->find();
		$type=I('param.commodityType');
		$id=I('param.commodityId');
		if($id==5){
			$cost=cfg_data(zongzhi_cost);//种子100个
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['zhongzi']=$info['zhongzi']+100;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得种子100个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==35){
			$cost=cfg_data(cost_bili)*100;//有机肥
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['youjifei']=$info['youjifei']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得肥料1包';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==7){
			$cost=cfg_data(cost_bili)*100;//锄头
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['chutou']=$info['chutou']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得锄头1把';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==8){
			$cost=5;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['shashuihu']=$info['shashuihu']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+酒水壶1把';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==9){
			$cost=5;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['chuchaoji']=$info['chuchaoji']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+除草剂1包';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==12){
			$cost=5;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['chuchongji']=$info['chuchongji']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+除虫剂1包';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==13){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['lvbaoshi']=$info['lvbaoshi']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+绿宝石1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==14){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['zhibaoshi']=$info['zhibaoshi']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+紫宝石1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==15){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['lanbaoshi']=$info['lanbaoshi']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+蓝宝石1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==24){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['huangbaoshi']=$info['huangbaoshi']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+黄宝石1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==16){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['tongbaox']=$info['tongbaox']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+铜宝箱1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==31){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['yinbaox']=$info['yinbaox']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+银宝箱1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==32){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data['jinbaox']=$info['jinbaox']+1;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='+金宝箱1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
			if($id==17){
			$cost=cfg_data(cost_bili)*100;
		    if($info['zs']<$cost){
			$arr['reTips']='Error';
			$arr['reMsg']='钻石不足，请充值';			
		     }else{
			$data2['userid']=session('uid');
			$data2['nickname']='松狮';
			
			$db_cw = M('congwu');
			
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data) && $db_cw->add($data2)){
			$arr['reTips']='success';$arr['reMsg']='+松狮1个';	
			 }else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			  }
		       }
		    }
         
		 



        $this->ajaxreturn($arr,'JSON');
	    $this->display();		 
	}
	
	public function buyCommodity(){
		$db = M('Userlist');
        $where = array('userid' => session('uid'));		    
        $info = $db->where($where)->find();
		if(I('param.commodityType')=='shop'){//商店 购买			
		$id=I('param.commodityId');
		if($id==5){$cost=cfg_data(zongzhi_cost);}//种子100个
		if($info['zs']<$cost){
			$arr['reTips']='Error';$arr['reMsg']='钻石不足，请充值';
			$this->ajaxreturn($arr,'JSON');
			$this->display();exit;
		}
		else{
			$data['zhongzi']=$info['zhongzi']+100;
			$data['zs']=$info['zs']-$cost;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得种子100个';	
			}else{
			$arr['reTips']='error';$arr['reMsg']='数据保存失败';	
			}
		} }else{//首页兑换
			if(I('param.commodityType')=='exchange'){//商店 购买			
		$id=I('param.commodityId');
		$num=I('param.commodityCount');
		if($id==10){
			$hongzao=$num*cfg_data(cost_bili)*100;$putao=$num*cfg_data(cost_bili)*100;			
		   if($info['hongzao']<$hongzao || $info['putao']<$putao){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['hongzao']=$info['hongzao']-$num*cfg_data(cost_bili)*100;
			$data['putao']=$info['putao']-$num*cfg_data(cost_bili)*100;
			$data['shitou']=$info['shitou']+$num;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得石头'.$num.'个';	
			}
		}
			}else{
			if($id==11){
			$hetao=$num*cfg_data(cost_bili)*100;$shiliu=$num*cfg_data(cost_bili)*100;			
		   if($info['hetao']<$hetao || $info['shiliu']<$shiliu){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['hetao']=$info['hetao']-$num*cfg_data(cost_bili)*100;
			$data['shiliu']=$info['shiliu']-$num*cfg_data(cost_bili)*100;
			$data['muban']=$info['muban']+$num;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得木板'.$num.'个';	
			}
		}
			}
            if($id==18){
			$hamigua=$num*cfg_data(cost_bili)*100;$xiangli=$num*cfg_data(cost_bili)*100;			
		    if($info['hamigua']<$hamigua || $info['xiangli']<$xiangli){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['hamigua']=$info['hamigua']-$num*cfg_data(cost_bili)*100;
			$data['xiangli']=$info['xiangli']-$num*cfg_data(cost_bili)*100;
			$data['gangchai']=$info['gangchai']+$num;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得钢材'.$num.'个';	
			}
		     }
			}
            if($id==19){//弑草神像
             if($info['shichaosx']==1){$arr['reTips']='Error';$arr['reMsg']='已经存在';}else{		
			$lvbaoshi=$num*5;;			
		    if($info['lvbaoshi']<$lvbaoshi){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['lvbaoshi']=$info['lvbaoshi']-$num*5;			
			$data['shichaosx']=$info['shichaosx']+$num;
			$data['shichaosx_kttime']=date('y-m-d H:i:s');
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得弑草神像'.$num.'个';	
			}
		     }
			}
			}					
			if($id==21){//屠虫神像
			if($info['tuchongsx']==1){$arr['reTips']='Error';$arr['reMsg']='已经存在';}else{
			$zhibaoshi=$num*5;;			
		    if($info['zhibaoshi']<$zhibaoshi){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['zhibaoshi']=$info['zhibaoshi']-$num*5;			
			$data['tuchongsx']=$info['tuchongsx']+$num;
			$data['tuchongsx_kttime']=date('y-m-d H:i:s');
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得弑草神像'.$num.'个';	
			}
			}}
			}	
            if($id==22){//雨露神像
			if($info['yulusx']==1){$arr['reTips']='Error';$arr['reMsg']='已经存在';}else{
			$lanbaoshi=$num*5;;			
		    if($info['zs']<$lanbaoshi){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['zs']=$info['zs']-$num*5;			
			$data['yulusx']=$info['yulusx']+$num;
			$data['yulusx_kttime']=date('y-m-d H:i:s');
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得雨露神像'.$num.'个';	
			}
			}}
			}	
            if($id==23){//丰收神像
			if($info['fengshousx']==1){$arr['reTips']='Error';$arr['reMsg']='已经存在';}else{
			$huangbaoshi=$num*5;;			
		    if($info['huangbaoshi']<$huangbaoshi){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['huangbaoshi']=$info['huangbaoshi']-$num*5;			
			$data['fengshousx']=$info['fengshousx']+$num;
			$data['fengshousx_kttime']=date('y-m-d H:i:s');
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得丰收神像'.$num.'个';	
			}
			}}
			}
              if($id==33){//背景2
			$hongzao=$num*cfg_data(cost_bili)*100;$putao=$num*cfg_data(cost_bili)*100;		
		    if($info['hongzao']<$hongzao || $info['putao']<$putao){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['hongzao']=$info['hongzao']-$num*cfg_data(cost_bili)*100;
            $data['putao']=$info['putao']-$num*cfg_data(cost_bili)*100;			
			$data['bg1']=0;
			$data['bg2']=1;
			$data['bg3']=0;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得背景二,请刷新查看效果';	
			}
		     }
			}		
            if($id==34){//背景3
			$hamigua=$num*cfg_data(cost_bili)*100;$xiangli=$num*cfg_data(cost_bili)*100;		
		    if($info['hamigua']<$hamigua || $info['xiangli']<$xiangli){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['hamigua']=$info['hamigua']-$num*cfg_data(cost_bili)*100;
            $data['xiangli']=$info['xiangli']-$num*cfg_data(cost_bili)*100;			
			$data['bg1']=0;
			$data['bg2']=0;
			$data['bg3']=1;
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='购买成功，获得背景三,请刷新查看效果';	
			}
		     }
			}		
            if($id==20){//普通狗粮
			$hetao=$num*cfg_data(cost_bili)*100;		
		    if($info['hetao']<$hetao){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['hetao']=$info['hetao']-$num*cfg_data(cost_bili)*100;
			$data['ptgouliang']=$info['ptgouliang']+$num;			
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得普通狗粮'.$num.'包';	
			}
		     }
			}	
            if($id==25){//高级狗粮
			$shiliu=$num*cfg_data(cost_bili)*100;		
		    if($info['shiliu']<$shiliu){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['shiliu']=$info['shiliu']-$num*cfg_data(cost_bili)*100;
			$data['gaojigouliang']=$info['gaojigouliang']+$num;			
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得高级狗粮'.$num.'包';	
			}
		     }
			}	
            if($id==26){//攻击狗粮
			$shiliu=$num*cfg_data(cost_bili)*100;		
		    if($info['shiliu']<$shiliu){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['shiliu']=$info['shiliu']-$num*cfg_data(cost_bili)*100;
			$data['gongjigouliang']=$info['gongjigouliang']+$num;			
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得攻击狗粮'.$num.'包';	
			}
		     }
			}	
            if($id==27){//防御狗粮
			$shiliu=$num*cfg_data(cost_bili)*100;		
		    if($info['shiliu']<$shiliu){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['shiliu']=$info['shiliu']-$num*cfg_data(cost_bili)*100;
			$data['fygouliang']=$info['fygouliang']+$num;			
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得防御狗粮'.$num.'包';	
			}
		     }
			}	
            if($id==28){//速度狗粮
			$shiliu=$num*cfg_data(cost_bili)*100;		
		    if($info['shiliu']<$shiliu){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['shiliu']=$info['shiliu']-$num*cfg_data(cost_bili)*100;
			$data['sdgouliang']=$info['sdgouliang']+$num;			
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得速度狗粮'.$num.'包';	
			}
		     }
			}		
            if($id==29){//幸运狗粮
			$shiliu=$num*cfg_data(cost_bili)*100;		
		    if($info['shiliu']<$shiliu){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['shiliu']=$info['shiliu']-$num*cfg_data(cost_bili)*100;
			$data['xygouliang']=$info['xygouliang']+$num;			
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得幸运狗粮'.$num.'包';	
			}
		     }
			}	
            if($id==30){//生命狗粮
			$shiliu=$num*cfg_data(cost_bili)*100;		
		    if($info['shiliu']<$shiliu){
			$arr['reTips']='Error';$arr['reMsg']='库存不足';
			}else{
			$data['shiliu']=$info['shiliu']-$num*cfg_data(cost_bili)*100;
			$data['smgouliang']=$info['smgouliang']+$num;			
			if($db->where($where)->save($data)){
			$arr['reTips']='success';$arr['reMsg']='获得生命狗粮'.$num.'包';	
			}
		     }
			}
				
				
				
				
			}
    			
			
		}
		 
        $this->ajaxreturn($arr,'JSON');
		$this->display();
		
		
	}
	}
	
	public function updateCangku(){
		//会员表
        $db = M('cangku');
        $where = array('userid' => session('uid'));
		$info=$db->where($where)->find();
		$this->ajaxreturn($info,'JSON');
		$this->display();
		
	}
	
	
	
	
	public function hintInfo(){//作物信息
        $db = M('userlist');
        $where = array('userid' => session('uid'));
		$info=$db->where($where)->find();
        $id=I('param.landid');
		if($info['land_gs'.$id]=='hetao'){$zz_name='核桃';}if($info['land_gs'.$id]=='hongzao'){$zz_name='红枣';}
		if($info['land_gs'.$id]=='putao'){$zz_name='葡萄';}if($info['land_gs'.$id]=='hamigua'){$zz_name='哈密瓜';}
		if($info['land_gs'.$id]=='shamoguo'){$zz_name='沙漠果';}if($info['land_gs'.$id]=='renshenguo'){$zz_name='人参果';}
		if($info['land_gs'.$id]=='xunyichao'){$zz_name='薰衣草';}if($info['land_gs'.$id]=='shamorenshen'){$zz_name='沙漠人参';}
		if($info['land_gs'.$id]=='badanmu'){$zz_name='巴旦木';}if($info['land_gs'.$id]=='hetianyu'){$zz_name='和田玉';}
		if($info['land_gs'.$id]=='shiliu'){$zz_name='石榴';}if($info['land_gs'.$id]=='xiangli'){$zz_name='香梨';}
		//PHP计算两个时间差的方法 
     $startdate=$info['kttime'.$id];
	 
	 $where_gs['name']=$info['land_gs'.$id];
	 $gs=M('crops_list')->where($where_gs)->find();
	 $zz=$gs['crops_seed'];$fy=$gs['crops_sprout'];$sz=$gs['crops_grow'];
	 
	 
     
	 $enddate=date("Y-m-d H:i:s");
     $date=floor((strtotime($enddate)-strtotime($startdate))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);
     $jindu=$date*86400+$hour*3600+$minute*60+$second;
	 //echo $jindu;exit;
		if($jindu<$zz*3600){$shiqi='种子期';$basetime=$zz*3600;$crops=$zz_name.'种子';$info='后发芽期';}
		if($jindu>=$zz*3600 && $jindu<$fy*3600){$shiqi='发芽期';$basetime=$fy*3600;$info='后生长期';}
		if($jindu>=$fy*3600 && $jindu<$sz*3600){$shiqi='生长期';$basetime=$sz*3600;$info='后成熟期';}
		if($jindu>=$sz*3600 ){$shiqi='成熟期';$basetime=$sz*3600;}
		
		$arr['code']=1;
		$arr['jindu']=$jindu;
		$arr['basetime']=$basetime;
		$arr['info']=$info;
		$arr['shiqi']=$shiqi;
		$arr['crops']=$crops;		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	
	}
	//收割
	public function gainCrops(){
        $id=I('param.landNum');		//id
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		
		
		$config_pest_odds=(int)100/cfg_data(config_pest_odds);
	 if($info['zz_count.$id']==$config_pest_odds && $info['sc'.$id]==0){$jian1=cfg_data(config_pest_reduce);}else{$jian1=0;}//虫害发生	
	 $config_drought_odds=(int)100/cfg_data(config_drought_odds);
	 if($info['zz_count.$id']==$config_pest_odds && $info['js'.$id]==0){$jian2=cfg_data(config_drought_reduce);}else{$jian2=0;}//干旱发生
	 $config_weed_odds=(int)100/cfg_data(config_weed_odds);//杂草发生
	 if($info['zz_count.$id']==$config_pest_odds && $info['cc'.$id]==0){$jian3=cfg_data(config_weed_reduce);}else{$jian3=0;}
     
	 $chan=cha_crops_chan($info['land_gs'.$id]);
	 $j=rand(1,5);
	 if($info['sf'.$id]==1){$sfj=$j;}else{$sfj=0;}	//施肥+产量
	 if($info['fengshousx']==1){$sfj2=cfg_data(config_bumper_count);}else{$sfj2=0;}	//丰收神像+产量
		
		
		//会员级另1级为 核桃,石榴,2级:葡萄,核桃		
		$gs_type=$info['land_gs'.$id];
		$gs_num=$chan-$jian1-$jian2-$jian3+$sfj+$chan*cw_info(pet_rose_heart)/100;
		//给上级交佣金
		$where1['userid']=$info['upxianid'];//一级上线
	  $info1=$db->where($where1)->find();
	  $where2['userid']=$info1['upxianid'];//二级上线
	  $info2=$db->where($where2)->find();
	  $where3['userid']=$info2['upxianid'];//三级上线
	  $info3=$db->where($where3)->find();
	  if($chan>0){//上线的id
	    //一级上线
		$db->where('userid='.$info['upxianid'])->setInc($gs_type, (int)$chan/100*cfg_data(config_diamond_one));//上线加
		$db->where('userid='.$info['upxianid'])->setInc('yj_'.$gs_type, (int)$chan/100*cfg_data(config_diamond_one));//加上线记录
		//二级上线
		$db->where('userid='.$info1['upxianid'])->setInc($gs_type, (int)$chan/100*cfg_data(config_diamond_two));
	    $db->where('userid='.$info1['upxianid'])->setInc('yj_'.$gs_type, (int)$chan/100*cfg_data(config_diamond_two));
		//三级上线
		$db->where('userid='.$info2['upxianid'])->setInc($gs_type, (int)$chan/100*cfg_data(config_diamond_three));
	    $db->where('userid='.$info2['upxianid'])->setInc('yj_'.$gs_type, (int)$chan/100*cfg_data(config_diamond_three));
	 }
	  
	  
		
		$data['cc'.$id]=0;$data['sc'.$id]=0;$data['js'.$id]=0;$data['sf'.$id]=0;
		$data['land_gs'.$id]=null;
		$data['jinyan']=$info['jinyan']+$gs_num;	//加经验
		$data[$gs_type]=$info[$gs_type]+$gs_num;//入仓库
	    $data['zt'.$id]=2;//收割后2清理
		$data['kttime'.$id]=date('y-m-d H:i:s');//时间归0
		if($db->where($where)->save($data)){
			$arr['code']=1;
		}		
		$arr['msg']='获得'.cha_crops_name($info['land_gs'.$id]).$zw.$gs_num.'个';
		
		$data2['userid']=session('uid');
		$data2['time']=date('y-m-d H:i:s');
		$data2['landid']=$id;
		$data2['record']='在地块'.$x.'收割了'.$gs_num.'个果实';
		M('rizhi')->add($data2);
		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
		
	}
	public function uprootSeed(){//清理
	    $chan_cost_gold=cfg_data(config_eradicate_price);
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		$info2=$db->where($where)->find();
		$id=I('param.landNum');
		if($info2['chutou']<1){
		$arr['reTips']='error';
		$arr['reMsg']='锄头不够1把';
		}else{
			$data['sc'.$id]=0;//杀虫恢复
			$data['cc'.$id]=0;//除草恢复
			$data['sf'.$id]=0;//施肥恢复
			$data['js'.$id]=0;//浇水恢复 
			$data['zt'.$id]=0;//状态0已清理,可播种
			$data['chutou']=$info2['chutou']-1;
			$data['gold']=$info2['gold']-$chan_cost_gold;
			$data['zhongzi']=$info2['zhongzi']+3;
			$data['jinyan']=$info2['jinyan']+$info2['lvl'];	//加经验
			if($db->where($where)->save($data)){
			$arr['reTips']='Success';
		    $arr['reMsg']='清理成功,获得种子3个';	
			}
		}
		$data2['userid']=session('uid');
		$data2['time']=date('y-m-d H:i:s');
		$data2['landid']=$id;
		$data2['record']='清理';
		M('rizhi')->add($data2);
		
		$this->ajaxreturn($arr,'JSON');		
		$this->display();
	}
	public function memberToSignIn(){//签到
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		$num=cfg_data(config_sign_in);
		
		$sign_time=strtotime($info['sign_time']);
        $jt3=strtotime(date('Y-m-d',time()).' 00:00:00');
		//echo $sign_time-$jt3;exit;
		if($sign_time - $jt3 > 0){
			$arr['code']=0;
			$arr['msg']='今天已经签到了!';
		}else{		
			$data['sign_time']=date('y-m-d H:i:s');
			$data['zs']=$info['zs']+$num;
			$data['sign']=1;
			if($db->where($where)->save($data)){
				$arr['code']=1;
				$arr['msg']='奖励'.$num.'钻石!';
			}else{
				$arr['code']=0;
				$arr['msg']='数据保存失败!';
			}
		}
		$data2['userid']=session('uid');
		$data2['time']=date('y-m-d H:i:s');
		$data2['landid']=$landNum;
		$data2['record']='签到';
		M('rizhi')->add($data2);
		
		
		$this->ajaxreturn($arr,'JSON');		
		$this->display();
	}
	
	
	//开宝箱花费
	public function boxCost(){
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		if(I('param.code')=='comCopperChest'){
			$max1=cfg_data(config_copper_box);
			$num=rand(1,$max1);
            $gold=rand(1,5);				
		    if($info['tongbaox']<1 || $info['hongzao']<200 || $info['shiliu']<200){
				$arr['stas']=0;
			}else{
				$data['tongbaox']=$info['tongbaox']-1;
				$data['shiliu']=$info['shiliu']-200;
				$data['hongzao']=$info['hongzao']-200;
				$data['hetao']=$info['hetao']+$num;
				$data['putao']=$info['putao']+$num;
				$data['xiangli']=$info['xiangli']+$num;
				$data['gold']=$info['gold']+$gold;
				if($db->where($where)->save($data)){
					$arr['stas']=1;
				}
			}	
		}else{
			if(I('param.code')=='comSilverChest'){
			$max2=cfg_data(config_copper_silverbox);
			$num2=rand(1,$max2);
            $gold2=rand(1,8);
		    if(I('param.code')=='yinbaox'){
			if($info['yinbaox']<1  || $info['hongzao']<300 || $info['shiliu']<300){
				$arr['stas']=0;
			}else{
				$data['yinbaox']=$info['yinbaox']-1;
				$data['shiliu']=$info['shiliu']-300;
				$data['hongzao']=$info['hongzao']-300;
				$data['hetao']=$info['hetao']+$num2;
				$data['putao']=$info['putao']+$num2;
				$data['xiangli']=$info['xiangli']+$num2;
				$data['gold']=$info['gold']+$gold2;
				if($db->where($where)->save($data)){
					$arr['stas']=1;
				}
			}			
		}
		     }
			 if(I('param.code')=='comGoldChest'){
			$max3=cfg_data(config_copper_goldbox);
			$num3=rand(1,$max3);
            $gold3=rand(1,10);
		     if(I('param.code')=='jinbaox'){
			if($info['jinbaox']<1  || $info['hongzao']<400 || $info['shiliu']<400){
				$arr['stas']=0;
			}else{
				$data['jinbaox']=$info['jinbaox']-1;
				$data['shiliu']=$info['shiliu']-400;
				$data['hongzao']=$info['hongzao']-400;
				$data['shiliu']=$info['shiliu']+$num3;
				$data['hetao']=$info['hetao']+$num3;
				$data['putao']=$info['putao']+$num3;
				$data['xiangli']=$info['xiangli']+$num3;
				$data['gold']=$info['gold']+$gold3;
				if($db->where($where)->save($data)){
					$arr['stas']=1;
				}
			}			
		}
		    }		
		}
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}
	
	//
	public function comCopperChest(){
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		$num=rand(1,200);
		if($info['shiliu']<200 && $info['hongzao']<100){
			$arr['msg']='库存不足!';
		}else{
			$data['shiliu']=$info['shiliu']-200;
			$data['hongzao']=$info['hongzao']-100;
			$data['gold']=$info['gold']+$num;
			if($db->where($where)->save($data)){
			  $arr['code']=1;	
			}
			 }
		
		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}
	//清理会员日志
	public function delLandLog(){
		$db = M('rizhi');
		$where['userid']=session('uid');
		if($db->where($where)->delete()){
			$arr['code']=1;
		}
		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}
	
	public function feedingMemberPet(){//宠物喂养
	    $petId=I('param.petId');
		$choseFoods=I('param.choseFoods');
		$foodsCount=I('param.foodsCount');
		$db = M('userlist');
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		
		$db2 = M('congwu');
		$where2['userid']=session('uid');
		$info2=$db2->where($where2)->find();
		
		if($choseFoods=='comDogFood'){
			if($info['ptgouliang']<$foodsCount){
				$arr['msg']='普通狗粮不足!';
				$arr['url']='duihuan';
			}else{
			   //每袋狗粮加多少体力和经验值
			   $jiatili1=cfg_data(config_dog_food_life);
			   $jiajinyan1=cfg_data(config_dog_food_exp);
			   
			   $data['ptgouliang']=$info['ptgouliang']-$foodsCount;
			   $a=$db->where($where)->save($data);
			   if($info2['tili']+$foodsCount*$jiatili1<100){
			   $data2['tili']=$info2['tili']+$foodsCount*$jiatili1;
			   $data2['wy_time']=date('y-m-d H:i:s');
			   }else{
				  $data2['tili']=100; 
			   }
			   $data2['jinyan']=$info2['jinyan']+$foodsCount*$jiajinyan1;
			   $data2['pet_rose_heart']=$info2['pet_rose_heart']+cfg_data(config_dog_food_rose_exp);
			   $b=$db2->where($where2)->save($data2);
			   if($a && $b){
				   $arr['msg']='经验+'.$jiajinyan1.'，体力+'.$jiatili;
				   $arr['jy']=$info2['jinyan'];
				   $arr['next_jy']=5*$info2['lvl']*($info2['lvl']+1);
				   $arr['tili']=$info2['tili'];
			   }
			}
		}else{
			if($info['gaojigouliang']<$foodsCount){
				$arr['msg']='高级狗粮不足!';
				$arr['url']='duihuan';
			}else{
			   //每袋狗粮加多少体力和经验值
			   $jiatili=cfg_data(config_dog_high_food_life);;
			   $jiajinyan=cfg_data(config_dog_high_food_exp);;
			   $data['ptgouliang']=$info['ptgouliang']-$foodsCount;
			   $a=$db->where($where)->save($data);
			    if($info2['tili']+$foodsCount*$jiatili<100){
			   $data2['tili']=$info2['tili']+$foodsCount*$jiatili;
			   }else{
				  $data2['tili']=100; 
			   }
			   $data2['jinyan']=$info2['jinyan']+$foodsCount*$jiajinyan;
			   $data2['wy_time']=date('y-m-d H:i:s');//喂养时间
			   $data2['pet_rose_heart']=$info2['pet_rose_heart']+cfg_data(config_dog_high_food_rose_exp);//玫瑰之心
			   $b=$db2->where($where2)->save($data2);
			   if($a && $b){
				   $arr['msg']='经验+'.$jiajinyan.'，体力+'.$jiatili;
				   $arr['jy']=$info2['jinyan'];
				   $arr['next_jy']=5*$info2['lvl']*($info2['lvl']+1);
				   $arr['tili']=$info2['tili'];
			   }
			}
			
		}
		
		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}
	//宠物训练
	public function trainingMemberPet(){
		$db = M('congwu');
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
        $cost_tili=cfg_data(config_pet_drill);
        if($info['xinyun']>50){
		$attak=rand(1,5);	
        $defense=rand(1,5);	
		$shudu=rand(1,5);
		}else{
		$attak=rand(1,3);	
        $defense=rand(1,3);	
		$shudu=rand(1,3);	
		}	
 		
		if($info['tili']<$cost_tili){
			$arr['msg']='体力值不足';			
			}else{
				$data['tili']=$info['tili']-$cost_tili;
				$data['attak']=$info['attak']+$cost_tili;
				$data['defense']=$info['defense']+cfg_data(config_pet_attribute_range);
				$data['shudu']=$info['shudu']+cfg_data(config_pet_attribute_range);
				$data['hp']=$info['hp']+cfg_data(config_pet_attribute_range);
				$data['pingfen']=$info['hp']+$info['attak']+$info['defense']+$info['shudu'];
				$data['jinyan']=$info['jinyan']+cfg_data(config_pet_drill_experience);
				$data['pet_rose_heart']=$info['pet_rose_heart']+cfg_data(config_pet_drill_rose_exp);//玫瑰之心
				if($info['xinyun']<50){
					$data['xinyun']=$info['xinyun']+cfg_data(config_pet_attribute_range);
				}else{
					$data['xinyun']=$info['xinyun']-cfg_data(config_pet_attribute_range);
				}
				if($db->where($where)->save($data)){
					$arr['msg']='训练成功';
				}
			}
		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}
	

	
	
	
	public function changeMemberPetName(){//宠物改名
		$db = M('congwu');
        $where['userid'] = session('uid');
		$info=$db->where($where)->find();
		
		$db2 = M('userlist');
        $where2['userid'] = session('uid');
		$info2=$db2->where($where2)->find();
		
		$petId=I('param.petId');
		$petName=I('param.petName');
		$data['nickname']=$petName;
		if($info2['zs']<1){
			$arr['msg']='钻石不足1';
		}else{
		$data2['zs']=$info2['zs']-1;
		$a=$db2->where($where2)->save($data2);
		$b=$db->where($where)->save($data);
		if($b && $a){
			$arr['msg']='修改成功';
		}else{
			$arr['msg']='保存数据失败';
		}
		 }
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}
	
	function memberPetGoWar(){//宠物出战
     $petId=I('param.petId');
	 $db = M('congwu');
        $where['userid'] = session('uid');
		$info=$db->where($where)->find();
	  if($info['zt']==0){
		  $data['zt']=1;
		  $arr['reTips']='Success';
		  $arr['reMsg']='出战成功';
		  $arr['petGif']='/images/595081629a1a6.png';
		  
	  }else{
		  $data['zt']=0;
		  $arr['reTips']='error';
		  $arr['reMsg']='回收成功';
		  $arr['petGif']='/images/595081629a1a6.png';
	  }
	  if($db->where($where)->save($data)){
		  $this->ajaxreturn($arr,'JSON');
	  }
       $this->display();    
    }



	public function memberToRecharge(){//免费换钻石2000,只能换一次
		$db = M('userlist');
        $where['userid'] = session('uid');
		$info=$db->where($where)->find();
		$rechargeType=I('param.rechargeType');
		if($rechargeType=='first'){
			if($info['gold'] <cfg_data(config_diamond_first) || $info['dhzs'] ==cfg_data(config_diamond_recharge) ){
			$arr['code']='0';
			$arr['msg']='金币不足或明天再充值';
		}else{
			$data['zs']=$info['zs']+2000+cfg_data(config_diamond_give);
			$data['gold']=$info['gold']-cfg_data(config_diamond_first);
			$data['dhzs']=$info['dhzs']+1;
			$data2['userid']=session('uid');
			$data2['username']=session('username');
			$data2['record']='免费换得钻石2000个';
			$data2['time']=date('y-m-d H:i:s');
			M('kuanglist')->where($where)->save($data2);
			if($db->where($where)->save($data) ){
				$arr['code']='1';
			}
		  }	
		}else{
			if($rechargeType=='second'){
			if($info['gold'] <cfg_data(config_diamond_second) || $info['dhzs'] ==cfg_data(config_diamond_recharge)){
			$arr['code']='0';
			$arr['msg']='金币不足或明天再充值';
		  }else{
			$data['zs']=$info['zs']+20000+cfg_data(config_diamond_give);
			$data['gold']=$info['gold']-cfg_data(config_diamond_second);
			$data['dhzs']=$info['dhzs']+1;
			$data2['userid']=session('uid');
			$data2['username']=session('username');
			$data2['record']='花费200金币换得钻石20000个';
			$data2['time']=date('y-m-d H:i:s');
			M('kuanglist')->where($where)->save($data2);
			if($db->where($where)->save($data)){
				$arr['code']='1';
			}
		  }	
		}
		if($rechargeType=='third'){
			if($info['gold'] <cfg_data(config_diamond_third)  || $info['dhzs'] ==cfg_data(config_diamond_recharge)){
			$arr['code']='0';
			$arr['msg']='金币不足或明天再充值';
		  }else{
			$data['zs']=$info['zs']+200000+cfg_data(config_diamond_give);
			$data['gold']=$info['gold']-cfg_data(config_diamond_third);
			$data['dhzs']=$info['dhzs']+1;
			$data2['userid']=session('uid');
			$data2['username']=session('username');
			$data2['record']='花费2000金币换得钻石200000个';
			$data2['time']=date('y-m-d H:i:s');
			M('kuanglist')->where($where)->save($data2);
			if($db->where($where)->save($data)){
				$arr['code']='1';
			}
		  }	
		}
		}				
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}
	
    //切换帐号
	public function memberLogout(){
		$_SESSION['uid']=null;
		$_SESSION['username']=null;
		
			$arr['reTips']='Success';
		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
	}

	    //宠物自动收获技能
    public function nowPetAutoHarvest() {
        $db = M('Userlist');
        $where = array('userid' => session('uid'));
		$info=$db->where($where)->find();
		$info_cw=M('congwu')->where($where)->find();
		if($info['autoshou']==0){
			if(cw_info(jinyan)<100){//花费500宠物 经验开启
			$arr['code']=0;
			$arr['msg']='宠物经验不足，请喂养';
			}else{
				$data_cw['jinyan'] = $info_cw['jinyan']-100;
				$data['autoshou'] = 1;
                $data['autoshou_kttime'] = date('y-m-d H:i:s');
				$aa=$db->where($where)->save($data);
				if(M('congwu')->where($where)->save($data_cw) && $aa){					
				$arr['code']=1;
				$arr['id']=1;
			    $arr['msg']='自动收获成功开启';	
				}
			}		    	
		}else{
              if(cw_info(jinyan)<100){
            	$arr['code']=0;
			$arr['msg']='宠物经验不足，请喂养';	
			  }else{			
            autoshou();//执行收获			  
			$arr['code']=0;
			$arr['msg']='已收获';
			  }	
		 }		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
    }
	//宠物自动播种技能
    public function nowPetAutoSeed() {
        $db = M('Userlist');
        $where = array('userid' => session('uid'));
		$info=$db->where($where)->find();
		$info_cw=M('congwu')->where($where)->find();
		if($info['autobozong']==0){
			if(cw_info(jinyan)<100){//花费500宠物 经验开启
			$arr['code']=0;
			$arr['msg']='宠物经验不足，请喂养';
			}else{
				$data_cw['jinyan'] = 0;
				$data['autobozong'] = 1;
                $data['autobozong_kttime'] = date('y-m-d H:i:s');
				$aa=$db->where($where)->save($data);
				if(M('congwu')->where($where)->save($data_cw) && $aa){					
				$arr['code']=1;
				$arr['id']=2;
			    $arr['msg']='自动播种成功开启';	
				}
			}		    	
		}else{		
            autobozong();//执行播种
			$arr['code']=0;
			    $arr['msg']='播种成功';
            /*if(autobozong($x)==0){
				$arr['code']=1;
			$arr['msg']='种子不足';		
			}else{
				$arr['code']=1;
			$arr['msg']='请先收获再播种';	
			}*/		
				
		 }		
		$this->ajaxreturn($arr,'JSON');
		$this->display();
    }
	

    public function getMemberNowPetInfo() {//宠物自动收获技能，持续时间	
        $memberId=I('param.memberId');	
        $db = M('Userlist');
        $where = array('userid' => session('uid'));
		$info=$db->where($where)->find();
		
		$db2 = M('congwu');
        $where2 = array('userid' => session('uid'));
		$info2=$db2->where($where2)->find();
		
		$arr['pet_auto_harvest']=$info['autoshou'];
		$arr['autobozong']=$info['autobozong'];
		$arr['config_auto_harvest_time']=1;//1小时3600
		
		
	 $arr['jindutime1']=time_cha(autoshou_kttime);
	 $arr['jindutime2']=time_cha(autobozong_kttime);
	 //echo time_cha(autoshou_kttime);exit;
	    //宠物信息
		$arr['pet_img']='/gold/img/index/chongwu/cw'.$memberId.'.png';
		$arr['pet_nickname']=$info2['nickname'];
		$arr['pet_level']=$info2['lvl'];
		$arr['pet_attack']=$info2['attak'];
		$arr['pet_defense']=$info2['defense'];
		$arr['pet_speed']=$info2['shudu'];
		$arr['pet_luck']=$info2['xinyun'];
		$arr['pet_life']=$info2['hp'];
        $arr['pet_tili']=$info2['tili'];
		$arr['pet_experience']=$info2['jinyan'];
		$arr['pet_netx_exp']=5*$info2['lvl']*($info2['lvl']+1);
		$arr['pet_max_life']=$info2['hp'];
		$arr['pet_rose_heart']=$info2['pet_rose_heart'];
		$arr['cha1']=$info2['jinyan']/5*$info2['lvl']*($info2['lvl']+1);
		$arr['cha2']=$info2['nickname'];
		
        $this->ajaxreturn($arr,'JSON');
		$this->display();
    }
	
	//添加用户表单处理
    //public function getHouseUpLevelData() {//房子升级信息
		
        //echo '{"id":"{session('uid')}","house_name":"10\u7ea7\u623f\u5c4b","house_level":"10","house_info":"{\"com\":\"11:1200;10:400;18:100\",\"diamond\":\"150000\"}","house_tudi_info":"{\"land\":\"1:1;2:1;3:1;4:10\"}","house_description":"\u5341\u7ea7\u623f\u5c4b","house_img":"2017-06-14/5940dd37d53cf.png","display":"0","firstConvertId":"11","firstConvertImg":"UploadFiles_s/2017-06-13/593f8c9c2b7e3.png","firstConvertCount":"1200","firstIdentifier":"classMaterial","firstMyCount":"2731","firstSearchTable":"ShopCommodity","convertTypeCount":4,"secondConvertId":"10","secondConvertImg":"UploadFiles_s/2017-06-13/593f86206e8d9.png","secondConvertCount":"400","secondIdentifier":"classMaterial","secondMyCount":"1000131","secondSearchTable":"ShopCommodity","thirdConvertId":0,"thirdConvertImg":"gold/img/index/03.png","thirdConvertCount":"150000","thirdIdentifier":"diamond","thirdMyCount":143652,"thirdSearchTable":"gold_member"}';
    //}
	public function nowPetRoseHeart() {	//玫瑰之心	
        $db2 = M('Userlist');
        $where2 = array('userid' => session('uid'));
		$info2=$db2->where($where2)->find();		
		$db3 = M('config');
        $where3['id'] = 1;
		if(cw_info(jinyan)<1000){
			$arr['msg']='经验值不足，无法获取';
		}else{			
			if(data_jian(congwu,jinyan,1000)==1){
				$arr['msg']='获取成功';
			}else{
				$arr['msg']='数据保存失败';
			}
		}
       
         $this->ajaxreturn($arr,'JSON');
          $this->display();		 
    }

    //房屋升级
    public function memberBuildLevelUp() {
        $db = M('Userlist');
        $where = array('userid' => session('uid'));
		$info = $db->where($where)->find();
		if(I('param.getLevel')=='none'){//房屋升级
			if($info['muban']<$info['lvl']*30*cfg_data(cost_bili) || $info['shitou']<$info['lvl']*30*cfg_data(cost_bili) || $info['zs']<$info['lvl']*cfg_data(up_zs_cost)){
				$arr['code']='0';
				$arr['msg']='仓库材料不足';
			}else{
				if($info['fangwu']>=$info['lvl']){
					$arr['code']='0';
				    $arr['msg']='房子等级不能超过角色等级';
					}else{
				$data['muban']=$info['muban']-$info['lvl']*30*cfg_data(cost_bili);
				$data['shitou']=$info['shitou']-$info['lvl']*30*cfg_data(cost_bili);
				$data['zs']=$info['zs']-$info['lvl']*cfg_data(up_zs_cost);
				$data['fangwu']=$info['fangwu']+1;
                    $x=$this->tudis2();
					$data['tudi'.$x]=1;				
				if($db->where($where)->save($data)){
					$arr['code']='1';				
				}else{
					$arr['code']='0';
				$arr['msg']='数据保存失败';
				}
					}
			}			
		}else{
			if(I('post.getLevel')==2){//土地升级2
			if($info['shiliu']<$info['lvl']*100*cfg_data(cost_bili) || $info['hetao']<$info['lvl']*100*cfg_data(cost_bili) || $info['zs']<$info['lvl']*100*cfg_data(cost_bili)){
				$arr['code']='0';
				$arr['msg']='仓库材料不足';
			}else{
				$data['shiliu']=$info['shiliu']-$info['lvl']*100*cfg_data(cost_bili);
				$data['hetao']=$info['hetao']-$info['lvl']*100*cfg_data(cost_bili);
				$data['zs']=$info['zs']-$info['lvl']*100*cfg_data(cost_bili);
				
				//1为初始土地,2盐碱地,3胶泥地,4金沙地
				   $x=$this->tudis();
					$data['tudi'.$x]=2;
					if($db->where($where)->save($data)){
					$arr['code']='1';				
				}else{
					$arr['code']='0';
				$arr['msg']='数据保存失败';				
				}
			}
                $this->ajaxreturn($arr,'JSON');
	            $this->display();			
		}
		  
		  if(I('post.getLevel')==3){//土地升级3
			if($info['hongzao']<$info['lvl']*100*cfg_data(cost_bili) || $info['putao']<$info['lvl']*100*cfg_data(cost_bili) || $info['zs']<1){
				$arr['code']='0';
				$arr['msg']='仓库材料不足';
			}else{
				$data['hongzao']=$info['hongzao']-$info['lvl']*100*cfg_data(cost_bili);
				$data['putao']=$info['putao']-$info['lvl']*100*cfg_data(cost_bili);
				$data['zs']=$info['zs']-$info['lvl']*100*cfg_data(cost_bili);
				
				//1为初始土地,2盐碱地,3胶泥地,4金沙地
				   $x=$this->tudis();
					$data['tudi'.$x]=3;
					if($db->where($where)->save($data)){
					$arr['code']='1';				
				}else{
					$arr['code']='0';
				$arr['msg']='数据保存失败';				
				}
			}
                $this->ajaxreturn($arr,'JSON');
	            $this->display();			
		}
		
		if(I('post.getLevel')==4){//土地升级4
			if($info['hamigua']<$info['lvl']*100*cfg_data(cost_bili) || $info['xiangli']<$info['lvl']*100*cfg_data(cost_bili) || $info['zs']<$info['lvl']*100*cfg_data(cost_bili)){
				$arr['code']='0';
				$arr['msg']='仓库材料不足';
			}else{
				$data['hamigua']=$info['hamigua']-$info['lvl']*100*cfg_data(cost_bili);
				$data['xiangli']=$info['xiangli']-$info['lvl']*100*cfg_data(cost_bili);
				$data['zs']=$info['zs']-$info['lvl']*100*cfg_data(cost_bili);
				
				//1为初始土地,2盐碱地,3胶泥地,4金沙地
				   $x=$this->tudis();
					$data['tudi'.$x]=4;
					if($db->where($where)->save($data)){
					$arr['code']='1';				
				}else{
					$arr['code']='0';
				$arr['msg']='数据保存失败';				
				}
			}
                $this->ajaxreturn($arr,'JSON');
	            $this->display();			
		}
		  
		  
		 }
        
       $this->ajaxreturn($arr,'JSON');
	   $this->display();
    }
	
	
    public function tudis() {//循环判断12块地的状态1，2，3，4
	    for ($x=1; $x<=12; $x++) {
           $db = M('Userlist');
        $where = array('userid' => session('uid'));		
		$info = $db->where($where)->find();
		   if($info['tudi'.$x]==1){
			  return $x; 
		   }
         }
    }
	 public function tudis2() {//房屋升级时给未开垦的变地块图为1，初始土地
	    for ($x=1; $x<=12; $x++) {
           $db = M('Userlist');
        $where = array('userid' => session('uid'));		
		$info = $db->where($where)->find();
		   if($info['tudi'.$x]==0){
			  return $x; 
		   }
         }
    }

    //攻略
    public function gonglue() {
        $db = M('gonglue');
        $where = array('userid' => session('uid'));
        $info=$db->order('time desc')->select();
       

        
        $this->assign('info',$info);        
        $this->display();
    }

    
    public function glview() { //攻略内容页
        $db = M('gonglue');
        $where = array('id' => $_GET['id']);
        $info=$db->where($where)->select();
		$info3=$db->where($where)->find();
		
		$where2 = array('id' => $_GET['id']+1);
        $info2=$db->where($where2)->find();
       

        
        $this->assign('info',$info);  
        $this->assign('info2',$info2); 
        $this->assign('title2',$info2['title']); 
        $this->assign('id',$_GET['id']+1);
		$this->assign('id2',$_GET['id']);
        $this->assign('haopin',$info3['haopin']); 
        $this->assign('zongpin',$info3['zongpin']);
        $this->assign('chapin',$info3['chapin']); 
        $this->assign('jubao',$info3['jubao']);		
         
		 
        $this->display();
    }

    
    public function raidersReward(){//文章攻略打赏
	    $type=I('param.news_columnid');
		$num=I('param.reward_nums');
		if($type==2){$tp='hetao';}if($type==8){$tp='shiliu';}if($type==9){$tp='hongzao';}
		if($type==10){$tp='putao';}if($type==14){$tp='hamigua';}if($type==15){$tp='xiangli';}
		if($type==16){$tp='shamoguo';}if($type==17){$tp='renshenguo';}if($type==18){$tp='xunyichao';}
		if($type==19){$tp='shamorenshen';}if($type==20){$tp='badanmu';}if($type==21){$tp='hetianyu';}
        $db = M('gonglue');
        $where = array('id'=>I('param.article_id'));
		$info=$db->where($where)->find();
		$db2 = M('userlist');
        $where2['userid'] = $info['userid'];
        $info2=$db2->where($where2)->find();
        $data[$tp]=$info2[$tp]+$num;
        if($db2->where($where)->save($data)){
			$arr['code']=2;
			$arr['message']='打赏成功';
		}else{
			$arr['code']=10;
			$arr['message']='打赏失败';
		}
		$this->ajaxreturn($arr,'JSON');
		$this->display();
        
    }

    
    public function evaluate_star(){//好评
	
	    $db = M('gonglue');
        $where['id'] = I('param.article_id');
		$info=$db->where($where)->find();
        $index=I('param.index');
		$article_id=I('param.article_id');
		if($index==0){$type='haopin';$column_sum=$info['haopin'];$da=$data['haopin'];}
		if($index==1){$type='zongpin';$column_sum=$info['zongpin'];$da=$data['zongpin'];}
		if($index==2){$type='chapin';$column_sum=$info['chapin'];$da=$data['chapin'];}
		if($index==3){$type='jubao';$column_sum=$info['jubao'];$da=$data['jubao'];}
		
        //echo $info['haopin'];exit;
		
        $data[$type]=$info[$type]+1;
        if($db->where($where)->save($data)){
			$arr['column_sum']=$column_sum;			
		}else{
			$arr['column_sum']=$column_sum;
		}
		$this->ajaxreturn($arr,'JSON');
		$this->display();
    }

    //身份认证
    public function memberCertificated(){
        $db = M('rebate_api');
        $where = array('uid'=>session('uid'));

        import('ORG.Util.Page');
        $count = $db->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();

        $rebate = $db->where($where)
        ->field('id,pid,sign',true)
        ->limit($Page->firstRow.','.$Page->listRows)
        ->order('id desc')
        ->select();

        $this->assign('rebate',$rebate);
        $this->assign('page',$show);
        $this->display();
    }
    
    //安全设置
    public function memberSafeCenter(){
        $db = M('user');
        $where = array('id'=>session('uid'));
        $info=$db->where($where)->find();

     

        $this->assign('sfz',$info['sfz']);
		$this->assign('zfb',$info['zfb']);
		$this->assign('weixin',$info['weixin']);
        $this->assign('page',$show);
        $this->display();
    }
    public function memberUpdatePwd(){
		$this->display();
	}
    //修改密码
    public function memberUpdatePwd2(){
        $db = M('user');
        $where = array('id'=>session('uid'));
        $rePwd=I('param.rePwd');
		$newPwd=I('param.newPwd');
		$newPwdRe=I('param.newPwdRe');
		
		$data['password']=$newPwd;
		if($db->where($where)->save($data)){
			$arr['status']=1;
			$arr['info']='修改成功';
			$arr['url']='index.php?m=user&a=memberSafeCenter';
		}else{
			$arr['status']=0;
			$arr['info']='数据保存失败';
		}
        $this->ajaxreturn($arr,'JSON');
        $this->display();
    }
	public function userCenter_cashManage(){
		$db = M('user');
        $where = array('id'=>session('uid'));
		$db2 = M('userlist');
        $where2['userid'] = session('uid');
		
        $bank_account_name=I('param.bank_account_name');
		$bank_name=I('param.bank_name');
		$bank_card_number=I('param.bank_card_number');
		
		if($_GET['act']==1){
		
		$data['name']=$bank_account_name;
		if($bank_name==1){
			$data['weixin']=$bank_card_number;
		$data2['weixin']=$bank_card_number;
		}else{
			$data['zfb']=$bank_card_number;$data2['zfb']=$bank_card_number;
			}
		$db2->where($where2)->save($data2);
		if($db->where($where)->save($data) ){
			$arr['status']=1;
			$arr['info']='修改成功';
			$arr['url']='index.php?m=user&a=memberSafeCenter';
		}else{
			$arr['status']=0;
			$arr['info']='数据保存失败';
		}
		
		$this->ajaxreturn($arr,'JSON');
		 }
		 $this->assign('gold',$info2['gold']);
		$this->display();
	}
	public function userCenter_accountRecharge(){//充值
		header('Location: http://www.yunziyuan.com.cn/index.php?m=pay&a=sanfang&url'.$_SERVER['HTTP_HOST']);
	}
	public function userCenter_coinWithdrawals(){//提现
	    
		$db2 = M('userlist');
        $where2 = array('userid'=>session('uid'));
		$info2=$db2->where($where2)->find();
		//echo $info2['zfb'];exit;
		$db3 = M('tixian');
		
        $db = M('user');
        $where = array('id'=>session('uid'));
        $withdraw_gold=I('withdraw_gold');
		
		if($_GET['act']==1){
			if($info2['zfb']==0 || $info2['weixin']==0){
			$arr['status']=0;
		    $arr['info']='请先设置收款支付宝和微信再提现！';
			$this->ajaxreturn($arr,'JSON');
			$this->display();
		}
		
		$data2['gold']=$info2['gold']-$withdraw_gold;
		
		$data3['userid']=session('uid');
		$data3['username']=session('username');
		$data3['zfb']=$info2['zfb'];
		$data3['weixin']=$info2['weixin'];
		$data3['money']=$withdraw_gold;
		$data3['cost']=$withdraw_gold;
		$data3['dh_time']=date('y-m-d H:i:s');
		$a=$db3->add($data3);
		
		if($db2->where($where2)->save($data2) && $a){
			$arr['status']=1;
			$arr['info']='提现成功';
			$arr['url']='index.php?m=user&a=userCenter_coinWithdrawals';
		}else{
			$arr['status']=0;
			$arr['info']='数据保存失败';
		}
		
		$this->ajaxreturn($arr,'JSON');
		
		}
		$this->assign('gold',$info2['gold']); 
		$this->assign('zfb',$info2['zfb']);
		$this->display();
	}
	public function userCenter_withdrawlog(){
		$db2 = M('tixian');
        $where2 = array('userid'=>session('uid'));
		$info2=$db2->where($where2)->select();
		$this->assign('info2',$info2); 
		$this->display();
	}
	public function userCenter_coinDetail(){//金币明细
		$db2 = M('kuanglist');
        $where2['userid'] = session('uid');
		$info2=$db2->where($where2)->select();
		$this->assign('info2',$info2); 
		
		$this->display();
	}
	public function centerLink(){//推广链接
		
		$this->display();
	}
	public function centerList(){//推广详情
	    $db = M('userlist');
        $where['userid'] = session('uid');
		$where2['upxianid'] = session('uid');
		$info2=$db->where($where)->select();
		$info=$db->where($where2)->select();
	    $count=$db->where($where2)->count();
	
		$this->assign('info',$info);
		$this->assign('count',$count);
		$this->display();
	}
	public function centerReward(){//推广奖励
	    $db = M('userlist');
        $where['userid'] = session('uid');
		$where2['upxianid'] = session('uid');
		$info2=$db->where($where)->select();
		$info=$db->where($where2)->select();
	    $count=$db->where($where2)->count();
	
		$this->assign('info',$info);
		$this->assign('count',$count);
		$this->display();
	}
	public function centerCode(){//推广码
	    $db = M('userlist');
        $where['userid'] = session('uid');
		$where2['upxianid'] = session('uid');
		$info2=$db->where($where)->select();
		$info=$db->where($where2)->select();
	    $count=$db->where($where2)->count();
	
		$this->assign('info',$info);
		$this->assign('count',$count);
		$this->display();
	}
	public function centerContact(){//联系资料
	    $db = M('userlist');
        $where['userid'] = session('uid');
		$where2['upxianid'] = session('uid');
		$info2=$db->where($where)->find();
		$info=$db->where($where2)->select();
	    $count=$db->where($where2)->count();
		
		
		
		if($_GET['act']==1){
			$data['phone']=I('param.telphone');
			$data['wechat']=I('param.wechat');
			$data['qq']=I('param.qq');
			if($db->where($where)->save($data)){
				$arr['status']=1;
				$arr['info']='修改成功';
				$arr['url']='index.php?m=user&a=centerContact';
			}else{
				$arr['status']=0;
				$arr['info']='数据保存失败';
			}
			$this->ajaxreturn($arr,'JSON');
		}
	
		$this->assign('weixin',$info2['weixin']);
		$this->assign('phone',$info2['phone']);
		$this->assign('qq',$info2['qq']);
		$this->display();
	}
	public function centerTeacher(){//我的导师
	
	    $db = M('userlist');
        $where['userid'] = session('uid');
       		
		$info=$db->where($where)->find();
		$where2['userid'] =$info['upxianid'] ;//上线的ID
		
		$info2=$db->where($where2)->find();//上线的资料
	    
	
		$this->assign('info2',$info2);
		$this->assign('count',$count);
		$this->display();
	}
	
	
	

}
?>