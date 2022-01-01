<?php
class UserAction extends CommonAction {
	//后台用户列表视图
    public function index(){
    	$user = M('userlist');

        $key = I('key');
        
        if($key){
            $where['id'] = $key;
            $where['username'] = $key;
            $where['email'] = $key;
            $where['_logic'] = 'OR';
        }

        import("ORG.Util.Page");

        $count = $user->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        
        $list = $user->order('jinkz desc')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->where($where)
        ->select();
        
        $this->assign('list',$list);
        $this->assign('page',$show);
    	
    	$this->display();
    }
	
	//jiangjin
	public function jiangjin(){
		$db = M('config');
		$where['id']=1;
		$info=$db->where($where)->select();
		
		if($_GET['act']==1){
			$data['tx_num']=I('tx_num');
			$data['jymod']=I('jymod');
			$data['begin_time']=I('begin_time');
			$data['end_time']=I('end_time');
			$data['pay_time']=I('pay_time');
			$data['income_time']=I('income_time');
			$data['min']=I('min');
			$data['max']=I('max');
			$data['beishu']=I('beishu');
			$data['max_bei']=I('max_bei');
			$data['interest']=I('interest');
			$data['max_tx_text_day']=I('max_tx_text_day');
			$data['max_register_day']=I('max_register_day');
			$data['reg_money']=I('reg_money');
			$data['cs_money']=I('cs_money');
			$data['tjrs']=I('tjrs');
			$data['tjjl']=I('tjjl');
			$data['manger_bonus']=I('manger_bonus');
			$data['zlx']=I('zlx');
			$data['tree_lx1']=I('tree_lx1');
			$data['tree_lx2']=I('tree_lx2');
			$data['tree_lx3']=I('tree_lx3');
			$data['tree_lx4']=I('tree_lx4');
			$data['tree_lx5']=I('tree_lx5');
			$data['tree_lx6']=I('tree_lx6');
			$data['tree_lx7']=I('tree_lx7');
			$data['tree_lx8']=I('tree_lx8');
			$data['kk1']=I('kk1');
			$data['kk2']=I('kk2');
			$data['kk3']=I('kk3');
			$data['kk4']=I('kk4');
			$data['kk5']=I('kk5');
			$data['kk6']=I('kk6');
			$data['kk7']=I('kk7');
			$data['kk8']=I('kk8');
			$data['fhbl']=I('fhbl');
			$data['csbl']=I('csbl');
			$data['jmsxf']=I('jmsxf');
			$data['ggfdbl']=I('ggfdbl');
			$data['kdfy']=I('kdfy');
			$data['zbbl']=I('zbbl');
			$data['yjsk']=I('yjsk');
			$data['zs_bl']=I('zs_bl');
			$data['huiben']=I('huiben');
			
		if($db->where($where)->save($data)){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
		}
		
		$this->assign('info',$info);
		$this->display();
		
	}
	
	
	
	
	
	

	//数据库
	public function db(){
		if($_GET['act']==1){//备份
        		
        // 设置SQL文件保存文件名 
$filename=date("Y-m-d_H-i-s")."-".$cfg_dbname.".sql"; 
// 所保存的文件名 
header("Content-disposition:filename=".$filename); 
header("Content-type:application/octetstream"); 
header("Pragma:no-cache"); 
header("Expires:0"); 
// 获取当前页面文件路径，SQL文件就导出到此文件夹内 
$tmpFile = (dirname(__FILE__))."\\".$filename; 
// 用MySQLDump命令导出数据库 
exec("mysqldump -u$cfg_dbuser -p$cfg_dbpwd --default-character-set=utf8 $cfg_dbname > ".$tmpFile); 
$file = fopen($tmpFile, "r"); // 打开文件 
echo fread($file,filesize($tmpFile)); 
fclose($file); 
exit; 
		
		}
		if($_GET['act']==2){//还原
			
		}
		
		
		$this->display();
	}
	//打劫配置
	public function dajie_cfg(){
		$dbs = M("config");	
        $where['id']=1;
        $info = $dbs->where($where)->select();	
         //打劫动态表
        $dba = M("dajielist");        
        $infoa = $dba->order('jg_time desc')->limit(20)->select();
		
		if($_GET['act']==1 && $_GET['act'] !=''){
			$data['dj_yessjsp']=I('dj_yessjsp');
			$data['dj_yessj']=I('dj_yessj');
            $data['tili_cost']=I('tili_cost');	
             $data['tili_num']=I('tili_num');			
			if($dbs->where($where)->save($data)){
				$this->success('修改成功');exit;
			}else{
				$this->error('修改失败');exit;
			}
			
		}
		$this->assign('info',$info);
		$this->assign('infoa',$infoa);
		$this->display();
	}
	//宝石猜猜单人版	
	public function game_bscdr_cfg(){
		$dbs = M("config");	
        $where['id']=1;
        $info = $dbs->where($where)->select();	
         //打劫动态表
        $dba = M("game_bscdr_record");        
        $infoa = $dba->order('wan_time desc')->limit(100)->select();
		
		if($_GET['act']==1 && $_GET['act'] !=''){
			$data['cs1_ctrl_ju']=I('cs1_ctrl_ju');//前面多少局不足紫色，红色
			$data['cs1_ctrl_pttiek']=I('cs1_ctrl_pttiek');//每局普通花费多少铁矿
			$data['cs1_ctrl_cjtiek']=I('cs1_ctrl_cjtiek');//每局超级花费多少铁矿
			$data['cs1_ctrl_ptcs']=I('cs1_ctrl_ptcs');//每局超级花费多少铁矿
			$data['cs1_ctrl_cjcs']=I('cs1_ctrl_cjcs');//每局超级花费多少铁矿
					
			if($dbs->where($where)->save($data)){
				$this->success('修改成功');exit;
			}else{
				$this->error('修改失败');exit;
			}
			
		}
		$this->assign('info',$info);
		$this->assign('infoa',$infoa);
		$this->display();
	}
	
	//游戏配置
	public function game_cfg(){
		$dbs = M("game_record");        
        $info = $dbs->order('game_time desc')->select();	
         //打劫动态表
        //$dba = M("dajielist");        
        //$infoa = $dba->order('jg_time desc')->limit(20)->select();
		
		if($_GET['act']==1 && $_GET['act'] !=''){
			$data['dj_yessjsp']=I('dj_yessjsp');
			$data['dj_yessj']=I('dj_yessj');
            $data['tili_cost']=I('tili_cost');	
             $data['tili_num']=I('tili_num');			
			if($dbs->where($where)->save($data)){
				$this->success('修改成功');exit;
			}else{
				$this->error('修改失败');exit;
			}			
		}
		$this->assign('info',$info);
		//$this->assign('infoa',$infoa);
		$this->display();
	}
	//系统消息
	public function sysinfo_cfg(){
		$dbs = M("sysinfo");		
		if($_GET['act']==1){
			$data['zd_userid']=I('zd_userid');
			$data['title']=I('title');
			$data['content']=I('content');
			$data['writer']='admin';
			$data['time']=date('y-m-d h:i:s');
			if($dbs->add($data)){
				$this->success('添加成功');
			}else{
				$this->success('添加失败');
			}
			
		}
		
		$this->display();
		
		
	}
	//充值支付配置
	public function czzf_cfg(){
		$dbs = M("config");  
		$where['id']=1;
		$info=$dbs->where($where)->select();
		if($_GET['act']==1){
			$customerid=I('customerid');
			$key=I('key');
			$apiurl=I('apiurl');
			$cz_test=I('cz_test');
			//$apiurl=$_GET['apiurl'];
			$returnurl=I('returnurl');
			$notifyurl=I('notifyurl');
			$data['customerid']=$customerid;
			$data['key']=$key;
			$data['apiurl']=$apiurl;
			$data['returnurl']=$returnurl;
			$data['notifyurl']=$notifyurl;
			$data['cz_test']=$cz_test;
			if($dbs->where($where)->save($data)){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
		
		
		$this->assign('info',$info);
		$this->display();
	}
	
	public function kgsj_cfg(){
		$dbs = M("config");   
        $where['id']=1;		
    	$info = $dbs->select();
		if($_GET['act']==1 && $_GET['act'] !=''){
			$invite_tiek=I('invite_tiek');
			$invite_tiek=I('invite_jink');
			$invite_tiek=I('invite_tieky');
			$invite_tiek=I('invite_zhuanshi');
			$xxsj_cfg=I('xxsj_cfg');
			$data['invite_tiek']=$invite_tiek;//铁矿
			$data['invite_jink']=$invite_jink;//水晶
			$data['invite_tieky']=$invite_tieky;//永久
			$data['invite_zhuanshi']=$invite_zhuanshi;//钻石
			$data['xxsj_cfg']=$xxsj_cfg;//改，下线上交的水晶百分比
			if($dbs->where($where)->save($data)){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}			
		$this->assign('info',$info);
		$this->display();
		
	}
	
	//交易 大厅设置
	public function jiaoyi_cfg(){
		$dbs = M("config");    	
    	$info = $dbs->select();
		//交易 表
		$dba = M("trade");    	
    	$infoa = $dba->order('id desc')->select();
		
		if($_GET['act']==1 && $_GET['act'] !=''){
			$kg_sell=I('kg_sell');
			$sell_per=I('sell_per');
			$data['kg_sell']=$kg_sell;//矿工是否可以出售
			$data['sell_per']=$sell_per;//出售成功收取手续费
			if($dbs->where(1==1)->save($data)){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}	
		$this->assign('info',$info);
		$this->assign('infoa',$infoa);
		$this->display();
	}
	//下线邀请设置
	public function invite_cfg(){
		$dbs = M("config");    	
    	$info = $dbs->select();
		//邀请动态明细表
		$dba = M("invite_record");    	
    	$infoa = $dba->order('invite_time desc')->limit(1)->select();
		
		if($_GET['act']==1 && $_GET['act'] !=''){
			$invite_jl=I('invite_jl');
			$xxsj_cfg=I('xxsj_cfg');
			$data['invite_jl']=$invite_jl;//邀请下线获得的水晶奖励
			$data['xxsj_cfg']=$xxsj_cfg;//改，下线上交的水晶百分比
			$data['reg_id']=I('reg_id');  //是否限制必填 注册ID
			$data['reg_ip']=I('reg_ip');  //是否限制ip
			$data['xiaxian_10ji']=I('xiaxian_10ji');  //10级下线
			if($dbs->where(1==1)->save($data)){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}		
		
	
		$this->assign('info',$info);
		$this->assign('infoa',$infoa);
		$this->display();
		
	}
	//统计代码
	public function tjdm_cfg(){
		$dbs = M("config");
        $where['id']=1;    	
    	$info = $dbs->where($where)->select();
		    //修改统计代码
			if($_GET['act']==1 && $_GET['act'] !=''){
			$tjdm=I('tjdm');			
			$data['tjdm']=$tjdm;//邀请下线获得的水晶奖励			
			if($dbs->where($where)->save($data)){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
		$this->assign('info',$info);
		$this->display();
	}
	//清空表
	public function info(){
		//会员表
		if($_GET['id']==1){
			if(M('user')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
			if(M('userlist')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
		}
		if($_GET['id']==2){//矿场大厅表
			if(M('kuanglist')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
			if(M('userlist')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
		}
		if($_GET['id']==3){//签到记录
			if(M('sign_record')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
			if(M('userlist')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
		}
		if($_GET['id']==4){//提现
			if(M('tixian')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
			if(M('userlist')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
		}
		if($_GET['id']==5){//打劫
			if(M('dajielist')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
			if(M('userlist')->delete()){
				$this->success('清空成功，数据已全部清除');
				}else{
					$this->error('清空失败');
					}
		}
		
		
		$this->display();
	}
	//签到修改
	public function sign_cfg(){
		$dbs = M("config");    	
    	$info = $dbs->select();
		//邀请动态明细表
		$dba = M("sign_record");    	
    	$infoa = $dba->order('time desc')->limit(1)->select();
		
		if($_GET['act']==1 && $_GET['act'] !=''){
			$invite_jl=I('sign_jl');
			$data['sign_jl']=$invite_jl;
			if($dbs->where(1==1)->save($data)){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}		
		$this->assign('info',$info);
		$this->assign('infoa',$infoa);
		$this->display();
		
	}
	
	public function kczt(){
		$db = M("userlist"); 
        $where['userid']=session('uid');		
    	$info = $db->where($where)->select();
		
		if($_GET['zt']==1){			
		$datas['kc_zt'] = 1;
		$db->where($where)->save($datas);
		if($info['kc_zt']==1){
			$this->success('已开启');exit;	
		}else{$this->success('已开启');exit;	}
		
		}else{
		$datas['kc_zt'] = 0;
        $db->where($where)->save($datas);	
        $this->success('已关闭');exit;			
		}
         	
       //echo $_GET['zt'];exit;		
		
		
		
	}
	//提现配置模板页
	public function tx_cfg(){
		$id=$_GET['id'];
		//echo $id;exit;
		$db = M("slvmall");
        $where['id']=$id;		
    	$info = $db->order('add_time desc')->select();	
		if($_GET['act']==1){
			if($db->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
			
		}
		
		$this->assign('info',$info);
		$this->display();
		
	}
	//提现，操作添加 
	public function tx_add(){
		$name=$_GET['name'];
		$name=I('name');
		
		$type=I('type');     //花费类型
		$type2=I('type2');  //物品类型，1红包，2实物
		$cost=I('cost');
		$img=I('img');
		$data['name']=I('name');
		$data['type']=$type;
		$data['type2']=$type2;
		$data['money']=(int)$cost/10000;
		$data['cost']=$cost;
		$data['add_time']=date('y-m-d h:i:s');
		if($name==''){
			$this->error('名称不能为空');
		}
		if(M('slvmall')->add($data)){
			$this->success('添加成功');
		}else{
			$this->error('添加失败');
		}
		
		//$this->display();
		
	}
	
	public function modi(){
		
		
		$ktsj=I('ktsj');
		$kzsj=I('kzsj');
		$klbsj=I('klbsj');
		//echo $ktsj;exit;
		if($ktsj!='' || $kzsj!='' || $klbsj!='' ){
			$data['ktsj'] = I('ktsj');
            $data['kzsj'] = I('kzsj');
            $data['klbsj'] = I('klbsj');
		}else{
			$this->error('不能为空');
		}
		
				
		
		
		//print_r($dbs);exit;
		if(M("config")->where(1==1)->data($data)->save()){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
		
		
		//$this->assign('info',$info);
		//$this->display();
		
	}
    
    //后台添加用户方法
    public function add(){
        //接收POST过来的数据
    	$data['username'] = I('username');//用户名
    	$data['password'] = I('password','','md5');//密码
    	$data['email'] = I('email');//邮箱
    	$data['score'] = I('score');//积分
    	$data['realname'] = I('realname');//姓名
    	$data['alipay'] = I('alipay');//支付宝
    	$data['userqq'] = I('userqq');//qq
    	$data['regtime'] = time();//注册时间

    	if (M('user')->add($data)) { 
    		$this->success('添加成功！', U('User/index'));
    	}else{ 
    		$this->error('添加失败，请重新添加', U('User/add'));
    	}
    }
    
    //后台修改用户视图
    public function saveuser(){
    	
    	$userid = I('id');

        $user = M("userlist");
    	
    	$save = $user->where('userid='.$userid)->find();
    	
    	$this->assign('save',$save);
    	
    	$this->display();
    }

    //后台修改用户方法
    public function save(){
    	//获取post过来的数据
		$data['userid'] = I('userid');
    	$data['tiekz'] = I('tiekz');
    	$data['jinkz'] = I('jinkz');
    	$data['dj_lvl'] = I('dj_lvl');
    	$data['dj_jy'] = I('dj_jy');
    	$data['zfb'] = I('zfb');
    	$data['weixin'] = I('weixin');
    	$data['kg_lv'] = I('kg_lv');
    	$data['tieky'] = I('tieky');
        
        $user = M("userlist");
		$where['userid']=I('userid');

    	if($user->where($where)->save($data)){ 
            $this->success('修改成功！', U('User/index'));
    	}else{ 
            $this->error('修改失败，请重试！', U('User/index'));
    	}
    }

    //后台删除用户方法
    public function del(){
    	$id = I('id');
        $where['id']  = array('in',$id);

        $user = M("user");

        if($user->where($where)->delete()) { 
        	$this->success('删除成功！', U('User/index'));
        }else{ 
        	$this->error('删除失败，请重试！', U('User/index'));
        }
    }

    //后台用户积分记录视图
    public function record(){
    	$user = M('kuanglist');
        $key = I('key');
        
        if($key){
            $where['userid'] = $key;
            $where['username'] = $key;
            $where['_logic'] = 'OR';
        }

        import("ORG.Util.Page");

        $count = $user->where($where)->count();
        $Page = new Page($count,30);
        $show = $Page->show();
        
        $list = $user
        ->order('id desc')
        ->where($where)
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
        
        $this->assign('list',$list);
        $this->assign('page',$show);
    	
    	$this->display();
    }

    //后台积分记录删除方法
    public function recdel(){ 
        $id = I('id');
        $where['id']  = array('in',$id);

        $user = M("user_log");

        if($user->where($where)->delete()) { 
        	$this->success('删除成功！', U('User/record'));
        }else{ 
        	$this->error('删除失败，请重试！', U('User/record'));
        }
    }
    
    //修改用户状态
    public function lock() {
        $uid = I('get.id');
        $lock = I('get.lock');
        
        if($lock == 0){
            M('User')->where('id='.$uid)->setField('userlock',1);
            $this->success('已锁定用户！', U('User/index'));
        }else{
            M('User')->where('id='.$uid)->setField('userlock',0);
            $this->success('用户恢复正常！', U('User/index'));
        }
    }
}
?>