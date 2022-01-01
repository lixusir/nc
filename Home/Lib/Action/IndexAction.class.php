<?php
//首页控制器
class IndexAction extends CommonAction {
    //首页视图
    public function index(){
		//echo session('uid');exit;
    	//检测是否登录
        if(session('uid')==''){
             header("Location:?m=login");
        }else{
           
        }
		
		$dbg=M("notice");
		$whereg = array('userid' => session('uid'));
		$infog = $dbg->order('id desc')->limit(5)->select();
		$this->assign('infog',$infog);
		
		$dbg2=M("notice");
		$whereg2 = array('userid' => session('uid'));
		$infog2 = $dbg2->order('id desc')->limit(5)->select();
		$this->assign('infog2',$infog2);
		
    	$db=M("userlist");
		$where = array('userid' => session('uid'));
		$db3=M("config");
		$where3['id']=1;
		$info3=$db3->where($where3)->select();
		$info = $db->where($where)->select();
		$info4 = $db->where($where)->find();
		//echo session('username');exit;
		//if(!$info4['username']){
			//$data['userid']=session('uid');
			//$data['username']=session('username');
			//$db->add($data);
		//}
		//echo $info4['pay_zt'];exit;
		//检测充值
		
		
       	$dbr=M("rizhi");
		$wherer = array('userid' => session('uid'));
        $infor = $dbr->where($wherer)->select();
        $infop = $db->order('gold desc')->limit(10)->select();//排行		
		$db_cw=M("congwu");
		$where_cw = array('userid' => session('uid'));
		$info_cw=$db_cw->where($where_cw)->find();
		$info_c=$db_cw->where($where_cw)->order('lvl desc')->select();
		if(!$info_cw){$cw=0;}else{$cw=1;}
		$jypec=$info_cw['jinyan']/5*$info_cw['lvl']*($info_cw['lvl']+1);
		//echo session('uid');exit;
	    //把ID写到USERID
		
	    
		//同步房屋与土地
		/*
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
		*/
		$db_cfg=M("game_config");
		$where_cfg['id']=1;
		$info_cfg=$db_cfg->where($where_cfg)->select();	
        //剩余时间，收获和播种的
		$shou_time=time_cha(autoshou_kttime);
		$bozong_time=time_cha(autobozong_kttime);
    	//载入模板
		$t=cw_info(jinyan);
		$n=cw_info(lvl)*5*(cw_info(lvl)+1);
		$this->assign('cw_tili_t',cw_info(tili));//宠物体力经验条
		$this->assign('cw_jinyan_t',$t/$n*100);//宠物体力经验条
     	$this->assign('shou_time',$shou_time);
        $this->assign('bozong_time',$bozong_time);		
		$this->assign('sys_name',cfg_sys(sys_name));
		//echo $bozong_time;exit;
        $this->assign('info',$info);
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
        $this->assign('info_c',$info_c);//宠物级别DESC			
        $this->assign('nickname',$info_cw['nickname']);//宠物昵称
		$this->assign('cw_lvl',$info_cw['lvl']);
		$this->assign('cw_hp',$info_cw['hp']*2);
		$this->assign('cw_defense',$info_cw['defense']*2);
		$this->assign('cw_attak',$info_cw['attak']*2);
		$this->assign('cw_shudu',$info_cw['shudu']*2);
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
		$this->assign('up_zs_cost',cfg_data(up_zs_cost));
		$this->assign('info_cfg',$info_cfg);
		
		
         //if($_GET['zt']==1 ){
			$this->display();
		//}else{
			//$this->check_sq();
		//}		
    	
    }
    
    /*首页热门体验模块*/
	public function check_sq(){
		if($_GET['zt']==''){
			$url='http://sq.yk676.com/index.php?m=ajax&a=sq_cx&sq_domain='.$_SERVER['HTTP_HOST'];
	    header('Location:' .$url);exit;
		}else{
			if($_GET['zt']==0){
			 $this->error('此域名未授权','/index.php?m=ajax&a=install');	
			}else{
				return 1;
			//$this->display();	
			}
			
		}
		
		
	}
	public function index2(){
		if(session('uid')==''){
			header('Location: index.php?m=login');
			//$this->error('请登录会员','index.php?m=login');
		}
    	$db=M("userlist");
		$where = array('userid' => session('uid'));
		$db3=M("config");
		$where3['id']=1;
		$info3=$db3->where($where3)->select();
		$info = $db->where($where)->select();
		$info4 = $db->where($where)->find();
		if(!$info4){
			$data['userid']=session('uid');
			$data['username']=session('username');
			$db->add($data);
		}
       	$dbr=M("rizhi");
		$wherer = array('userid' => session('uid'));
        $infor = $dbr->where($wherer)->select();
        $infop = $db->order('gold desc')->limit(10)->select();//排行		
		$db_cw=M("congwu");
		$where_cw = array('userid' => session('uid'));
		$info_cw=$db_cw->where($where_cw)->find();
		$info_c=$db_cw->where($where_cw)->order('lvl desc')->select();
		if(!$info_cw){$cw=0;}else{$cw=1;}
		$jypec=$info_cw['jinyan']/5*$info_cw['lvl']*($info_cw['lvl']+1);
	
	    
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
        //剩余时间，收获和播种的
		$shou_time=time_cha(autoshou_kttime);
		$bozong_time=time_cha(autobozong_kttime);
    	//载入模板
		$t=cw_info(jinyan);
		$n=cw_info(lvl)*5*(cw_info(lvl)+1);
		$this->assign('cw_tili_t',cw_info(tili));//宠物体力经验条
		$this->assign('cw_jinyan_t',$t/$n*100);//宠物体力经验条
     	$this->assign('shou_time',$shou_time);
        $this->assign('bozong_time',$bozong_time);		
		$this->assign('sys_name',cfg_sys(sys_name));
		//echo $bozong_time;exit;
        $this->assign('info',$info);
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
        $this->assign('info_c',$info_c);//宠物级别DESC			
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
		$this->assign('pet_rose_heart',$info_cw['pet_rose_heart']);//玫瑰之心
		$this->assign('config_till_price',$info_cfg['config_till_price']);//播种花费金币
		$this->assign('config_seed_count',$info_cfg['config_seed_count']);//播种花费种子
		$this->assign('gold_zs1',cfg_data(config_diamond_first));//金币换钻石消耗1
		$this->assign('gold_zs2',cfg_data(config_diamond_second));//金币换钻石消耗2
		$this->assign('gold_zs3',cfg_data(config_diamond_third));//金币换钻石消耗3
		$this->assign('ewai',cfg_data(config_diamond_give));//金币换钻石消耗3
         //if($_GET['zt']==1 ){
			$this->display();
		//}else{
			//$this->check_sq();
		//}		
	}
    private function hot() {
        $db = M('Tasklist');
        $field = array('id','taskname','taskreward','taskimg','auditway');
        $where['taskstate'] = 0;
        $where['tasktime'] = array('gt',time());
        $data = $db->where($where)->field($field)->order('id desc')->limit(9)->select();
        return $data;
    }
    
    /*首页轮播图*/
    public function slide(){
        $slide = M('Slides')->order('id DESC')->select();
        $uid = session('uid') ? session('uid'):0;
        foreach ($slide as $k => $v) {
            $slide[$k]['jump_link'] = str_replace('{uid}',$uid,$v['jump_link']);
        }
        return $slide;
    }
	//首页弹出
	public function proplist(){
		
		echo '{"r":0,"diamond_list":[{"id":"1","silver_o":"210000","silver_a":"0","diamond":"30"},{"id":"2","silver_o":"420000","silver_a":"0","diamond":"60"},{"id":"3","silver_o":"700000","silver_a":"0","diamond":"100"},{"id":"4","silver_o":"1400000","silver_a":"0","diamond":"200"},{"id":"5","silver_o":"3500000","silver_a":"0","diamond":"500"},{"id":"6","silver_o":"7000000","silver_a":"0","diamond":"1000"}],"silver_list":[{"id":"1","type":"1","silver_o":"0","silver_a":"0","silver_n":"\u81ea\u52a8\u6536\u77ff","diamond":"5000000","money":"0","sort":"5","juese":"10"},{"id":"2","type":"0","silver_o":"0","silver_a":"0","silver_n":"\u77ff\u5de5\u4f53\u529b","diamond":"30","money":"0","sort":"7","juese":"0"},{"id":"5","type":"2","silver_o":"0","silver_a":"0","silver_n":"3\u5c0f\u65f6\u4f53\u529b","diamond":"5","money":"0","sort":"8","juese":"0"},{"id":"13","type":"6","silver_o":"0","silver_a":"0","silver_n":"\u6253\u52ab\u4f53\u529b","diamond":"50000","money":"1","sort":"9","juese":"10"},{"id":"12","type":"5","silver_o":"0","silver_a":"0","silver_n":"\u5151\u6362\u539f\u77f3","diamond":"30000","money":"0","sort":"14","juese":"10"},{"id":"8","type":"3","silver_o":"1","silver_a":"0","silver_n":"\u5151\u6362\u94bb\u77f3","diamond":"1000","money":"1","sort":"15","juese":"10"}],"dj_list":[],"silver":"19847","diamond":"6","rose":"0"}';
		
	}
	
	
	
	
	
	
	
	
}
?>