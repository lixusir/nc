<?php
class UserAction extends CommonAction {
	
    public function game_config(){
    	$db = M('game_config');
        $where['id'] = 1; 
        $info = $db->where($where)->select();
        if($_GET['act']==1){
			$data['config_till_price']=I('config_till_price');
			$data['config_eradicate_price']=I('config_eradicate_price');
			$data['config_seed_count']=I('config_seed_count');
			$data['config_steal_count']=I('config_steal_count');
			$data['config_sign_in']=I('config_sign_in');
			$data['config_register_reward']=I('config_register_reward');
			$data['up_zs_cost']=I('up_zs_cost');
			$data['cost_bili']=I('cost_bili');
			$data['zongzhi_cost']=I('zongzhi_cost');
		
			
			if($db->where($where)->save($data)){
				$this->success('基本设置修改成功');
			}else{
				$this->error('基本设置修改失败');
			}
			
			
		}else{
		if($_GET['act']==2){
			$data['config_pest_time']=I('config_pest_time');
			$data['config_pest_odds']=I('config_pest_odds');
			$data['config_pest_reduce']=I('config_pest_reduce');
			$data['config_drought_time']=I('config_drought_time');
			$data['config_drought_odds']=I('config_drought_odds');
			$data['config_drought_reduce']=I('config_drought_reduce');
			$data['config_weed_time']=I('config_weed_time');
			$data['config_weed_odds']=I('config_weed_odds');
			$data['config_weed_reduce']=I('config_weed_reduce');
			$data['config_weed_time2']=I('config_weed_time2');
			$data['config_weed_odds2']=I('config_weed_odds2');
			$data['config_weed_reduce2']=I('config_weed_reduce2');
			$data['config_weed_time3']=I('config_weed_time3');
			$data['config_copperhoe_seed']=I('config_copperhoe_seed');
			$data['config_silverhoe_seed']=I('config_silverhoe_seed');
			$data['config_bumper_count']=I('config_bumper_count');
			$data['config_reborn_odds']=I('config_reborn_odds');
			$data['config_reborn_cost']=I('config_reborn_cost');
			$data['config_give_cost']=I('config_give_cost');
			$data['config_gem_probability']=I('config_gem_probability');
			$data['config_gem_num']=I('config_gem_num');
			$data['config_present_max']=I('config_present_max');
			$data['config_copper_goldbox']=I('config_copper_goldbox');
			$data['config_copper_silverbox']=I('config_copper_silverbox');
			$data['config_copper_box']=I('config_copper_box');
			
			if($db->where($where)->save($data)){
				$this->success('基本设置修改成功');
			}else{
				$this->error('基本设置修改失败');
			}
		}
        if($_GET['act']==3){
			$data['config_pet_drill']=I('config_pet_drill');
			$data['config_pet_attribute_range']=I('config_pet_attribute_range');
			$data['config_pet_drill_experience']=I('config_pet_drill_experience');
			$data['config_pet_hour']=I('config_pet_hour');
			$data['config_pet_drill_odds']=I('config_pet_drill_odds');
			$data['config_dog_food_exp']=I('config_dog_food_exp');
			$data['config_dog_food_life']=I('config_dog_food_life');
			$data['config_dog_high_food_exp']=I('config_dog_high_food_exp');
			$data['config_dog_high_food_life']=I('config_dog_high_food_life');
			$data['config_auto_harvest_time']=I('config_auto_harvest_time');
			$data['config_auto_seed_time']=I('config_auto_seed_time');
			$data['config_luck_active_pro']=I('config_luck_active_pro');
			$data['config_luck_add_pro']=I('config_luck_add_pro');
			$data['config_dog_food_rose_exp']=I('config_dog_food_rose_exp');
			$data['config_dog_high_food_rose_exp']=I('config_dog_high_food_rose_exp');
			$data['config_pet_drill_rose_exp']=I('config_pet_drill_rose_exp');
			$data['config_special_exp']=I('config_special_exp');
			$data['config_pet_food_attribute']=I('config_pet_food_attribute');
			if($db->where($where)->save($data)){
				$this->success('基本设置修改成功');
			}else{
				$this->error('基本设置修改失败');
			}
		}		
		if($_GET['act']==4){
			$data['config_diamond_first']=I('config_diamond_first');
			$data['config_diamond_second']=I('config_diamond_second');
			$data['config_diamond_third']=I('config_diamond_third');
			$data['config_diamond_give']=I('config_diamond_give');
			$data['config_diamond_recharge']=I('config_diamond_recharge');
			$data['config_diamond_one']=I('config_diamond_one');
			$data['config_diamond_two']=I('config_diamond_two');
			$data['config_diamond_three']=I('config_diamond_three');
			$data['config_rmb_gold']=I('config_rmb_gold');
			if($db->where($where)->save($data)){
				$this->success('基本设置修改成功');
			}else{
				$this->error('基本设置修改失败');
			}
		}
        if($_GET['act']==5){
			$data['config_open_time']=I('config_open_time');
			$data['config_close_time']=I('config_close_time');
			$data['config_limit_up']=I('config_limit_up');
			$data['config_limit_down']=I('config_limit_down');
			$data['config_trade_cost']=I('config_trade_cost');
			$data['open_price2']=I('open_price2');//核桃开盘价
			$data['open_price8']=I('open_price8');
			$data['open_price9']=I('open_price9');
			$data['open_price10']=I('open_price10');
			$data['open_price14']=I('open_price14');
			$data['open_price15']=I('open_price15');
			$data['open_price16']=I('open_price16');
			$data['open_price17']=I('open_price17');
			$data['open_price18']=I('open_price18');
			$data['open_price19']=I('open_price19');
			$data['open_price20']=I('open_price20');
			$data['open_price21']=I('open_price21');
			
			$data['config_seed_open_price']=I('config_seed_open_price');
			if($db->where($where)->save($data)){
				$this->success('基本设置修改成功');
			}else{
				$this->error('基本设置修改失败');
			}
		}		
		}
       
        $this->assign('info',$info);    	
    	$this->display();
    }
	
	//jiangjin
	public function recharge(){
		$db = M('recharge');
		//$info=$db->order('id desc')->select();
		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
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
	public function sys(){
		$db = M('sys');
		$where['id'] =  1;
        $info = $db->where($where)->select();
        
        $this->assign('info',$info);
		$this->display();
		
	}
    public function Notice_list(){
		$db = M('notice');		
        $info = $db->order('id desc')->select();
        
        $this->assign('info',$info);
		$this->display();
		
	}
	public function notice_listadd(){
		$db = M('notice');		
        $info = $db->order('id desc')->select();
        if($_GET['act']==1){
			$data['title']=I('notice_title');
			$data['sort']=I('sort');
			$data['content']=I('kind_text');
			$data['time']=date('y-m-d H:i:s');
			if($db->add($data)){
				$arr['status']=1;
				$arr['info']='添加成功';
				$arr['url']='admin.php?m=user&a=notice_listadd';
			}else{
				$arr['status']=0;
				$arr['info']='添加失败';
			}
			$this->ajaxreturn($arr,'json');
		}
		
        $this->assign('info',$info);
		$this->display();		
	}	
	public function notice_listedit(){
		$db = M('notice');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
        if($_GET['act']==1){
			$data['title']=I('notice_title');
			$data['sort']=I('sort');
			$data['content']=I('kind_text');
			
			if($db->where($where)->save($data)){
				$arr['status']=1;
				$arr['info']='修改成功';
				$arr['url']='admin.php?m=user&a=notice_list';
			}else{
				$arr['status']=0;
				$arr['info']='没有改动,修改失败';
			}
			$this->ajaxreturn($arr,'json');
		}		
        $this->assign('info',$info);
		$this->display();		
	}
	public function notice_del(){
		$db = M('notice');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
			if($db->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}				
	}
	public function shop_class_list(){
		$db = M('shop_class_list');
        $where['id']=$_GET['id'];		
        $info = $db->order('id desc')->select();
		
		$this->assign('info',$info);
		$this->display();		
	}
	public function shop_class_add(){
		$db = M('shop_class_list');		
        $info = $db->order('id desc')->select();
        if($_GET['act']==1){
			$data['class_name']=I('class_name');
			$data['class_identifier']=I('class_identifier');			
			$data['add_time']=date('y-m-d H:i:s');
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}		
        $this->assign('info',$info);
		$this->display();		
	}
    public function shop_class_del(){
		$db = M('shop_class_list');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
			if($db->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}				
	}	
	public function shop_commodity_list(){
		$db = M('shop_commodity_list');
        $where['id']=$_GET['id'];		
        $info = $db->order('id desc')->select();
		
		$this->assign('info',$info);
		$this->display();
	}
	public function shop_commodity_add(){
		$db = M('shop_commodity_list');
        if($_GET['act']==1){
			$data['com_name']=I('com_name');
			$data['com_identifier']=I('com_identifier');
            $data['shop_class']=I('shop_class');
			$data['com_count']=I('com_count');
            $data['com_price']=I('com_price');
			$data['com_sum']=I('com_sum');
			$data['com_info']=I('com_info');
			$data['com_describe']=I('com_describe');
			$data['add_time']=date('y-m-d H:i:s');
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}		
		$this->display();
	}
	public function shop_commodity_edit(){
		
		$this->display();
	}
	public function land_list(){
		$db = M('userlist');
        $where['id']=$_GET['id'];		
        $info = $db->order('id desc')->select();
		
		$this->assign('info',$info);
		$this->display();
	}
	public function land_class_list(){
		$db = M('land_class_list');
		$where['id']=$_GET['id'];		
        $info = $db->order('id desc')->select();
        if($_GET['act']==1){
			$data['com_name']=I('com_name');
			$data['com_identifier']=I('com_identifier');
            $data['shop_class']=I('shop_class');
			$data['com_count']=I('com_count');
            $data['com_price']=I('com_price');
			$data['com_sum']=I('com_sum');
			$data['com_info']=I('com_info');
			$data['com_describe']=I('com_describe');
			$data['add_time']=date('y-m-d H:i:s');
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}
        $this->assign('info',$info);		
		$this->display();
	}
	public function land_class_add(){
		$db = M('land_class_list');
        if($_GET['act']==1){
			$data['landclass_name']=I('landclass_name');
			$data['landclass_level']=I('landclass_level');
            $data['landclass_info']=I('landclass_info');
			$data['landclass_crops']=I('landclass_crops');            
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}		
		$this->display();
	}
	
	
	public function land_class_edit(){
		
		$this->display();
	}
	public function crops_list(){//农产品管理
		$db = M('crops_list');
		$info=$db->order('id desc')->select();
        
        $this->assign('info',$info);		
		$this->display();
	}
	public function crops_add(){
		$db = M('crops_list');
        if($_GET['act']==1){
			$data['crops_name']=I('crops_name');
			$data['crops_identifier']=I('crops_identifier');
            $data['crops_land_count']=I('crops_land_count');
			$data['crops_harvest']=I('crops_harvest');
            $data['crops_probability']=I('crops_probability');
			$data['crops_seed']=I('crops_seed');  
            $data['crops_sprout']=I('crops_sprout');
			$data['crops_grow']=I('crops_grow'); 
            $data['crops_open_price']=I('crops_open_price');			
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}		
		$this->display();
	}
	public function crops_list_edit(){
		
		$db = M('crops_list');
        $where['id']=$_GET['id'];
        $field=array('crops_land_count','crops_seed','crops_sprout','crops_grow');		
        $info = $db->where($where)->find();
        if($_GET['act']==1){
			$data['crops_harvest']=I('crops_harvest');
			$data['crops_seed']=I('crops_seed');
			$data['crops_sprout']=I('crops_sprout');
			$data['crops_grow']=I('crops_grow');
			
              			
			if($db->where($where)->save($data)){
				$this->success('修改成功','/admin.php?m=user&a=crops_list');
				//$arr['status']=1;
				//$arr['info']='修改成功';
				//$arr['url']='admin.php?m=user&a=crops_list';
			}else{
				$this->success('修改失败','/admin.php?m=user&a=crops_list');
				//$arr['status']=0;
				//$arr['info']='没有改动,修改失败';
			}
			//$this->ajaxreturn($arr,'json');
		}
		
		
		$this->assign('crops_harvest',$info['crops_harvest']);
		$this->assign('crops_seed',$info['crops_seed']);
		$this->assign('crops_sprout',$info['crops_sprout']);
		$this->assign('crops_grow',$info['crops_grow']);
		$this->assign('id',$info['id']);
		$this->display();
	}
	public function house_list(){//房屋管理
		$db = M('house_list');
		$info=$db->order('id desc')->select();
        
        $this->assign('info',$info);		
		$this->display();
	}
	public function house_add(){
		$db = M('house_list');
        if($_GET['act']==1){
			$data['house_name']=I('house_name');
			$data['house_level']=I('house_level');
            $data['house_info']=I('house_info');
			$data['house_description']=I('house_description');
           			
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}		
		$this->display();
	}
	public function house_edit(){
		
		$this->display();
	}
	public function scene_list(){
		$db = M('scene_list');
		$info=$db->order('id desc')->select();
        
        $this->assign('info',$info);		
		$this->display();
	}
	public function scene_add(){
		$db = M('scene_list');
        if($_GET['act']==1){
			$data['scene_identifier']=I('scene_identifier');
			$data['scene_name']=I('scene_name');
            $data['add_time']=date('y-m-d H:i:s');
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}		
		$this->display();
	}
	public function scene_edit(){
		
		$this->display();
	}
	public function member_add(){
		$db = M('user');
        $where1['username']=I('member_tel');
        $where2['realname']=I('member_realname');
        $where3['nickname']=I('member_nickname');
        $where4['idcard']=I('member_idcard');
        $info1=$db->where($where1)->find();
        $info2=$db->where($where2)->find();	
        $info3=$db->where($where3)->find();	
        $info4=$db->where($where4)->find();
        if($info1['username']==I('member_tel')){
			   $arr['status']=0;
			   $arr['info']='手机号已被注册';			   
		   }else{
        if($info2['realname']==I('member_realname')){
		       $arr['status']=0;
			   $arr['info']='真实姓名已被注册';			   
		   }
        if($info3['nickname']==I('member_nickname')){
	           $arr['status']=0;
			   $arr['info']='昵称已被注册';			   
		   }
        if($info4['idcard']==I('member_idcard')){
	           $arr['status']=0;
			   $arr['info']='身份证号码已被注册';			   
		   }}		   
        if($_GET['act']==1){
			$data['username']=I('member_tel');
			$data['realname']=I('member_realname');
            $data['nickname']=I('member_nickname');
			$data['password']=I('member_pwd');
			$data['idcard']=I('member_idcard');
            $data['upxianid']=I('member_renum');
			$data['regtime']=date('y-m-d H:i:s');
			if($db->add($data)){
				$arr['status']=1;
			   $arr['info']='注册成功';
			   $arr['url']='admin.php?m=user&a=member_list';
			}else{
				$arr['status']=0;
			   $arr['info']='注册失败';	
			}
         $this->ajaxreturn($arr,'json');			
		}		
		$this->display();
	}
	public function member_list(){
		$db = M('userlist');
		//$info=$db->order('id desc')->select();
		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function member_list_del(){
	$db = M('user');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
			if($db->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}		
        }
	public function member_list_edit(){
		$db = M('userlist');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
        if($_GET['act']==1){
			$data['username']=I('member_tel');
			$data['realname']=I('member_realname');
			$data['nickname']=I('member_nickname');
			$data['gold']=I('gold');
			$data['zs']=I('zs');
			$data['lvl']=I('lvl');
			$data['fangwu']=I('fangwu');
              			
			if($db->where($where)->save($data)){
				$arr['status']=1;
				$arr['info']='修改成功';
				$arr['url']='admin.php?m=user&a=member_list';
			}else{
				$arr['status']=0;
				$arr['info']='没有改动,修改失败';
			}
			$this->ajaxreturn($arr,'json');
		}else{
			if($_GET['act']==2){
			$where2['id']=I('param.x');
			$info2=$db->where($where2)->find();
			if(I('param.y')==0){
				$data2['status']=1;
			}else{
				$data2['status']=0;
			}			
			if($db->where($where2)->save($data2)){
				if(I('param.y')==0){
				$arr['status']=1;
				$arr['info']='账号开启';
			}else{
				$arr['status']=1;
				$arr['info']='账号停止';
			}				
				$arr['url']='admin.php?m=user&a=member_list';
			}else{
				$arr['status']=0;
				$arr['info']='没有改动,修改失败';
			}
			$this->ajaxreturn($arr,'json');
		}
		}		
        $this->assign('info',$info);
		$this->display();	
	}
	public function member_head_add(){
		$db = M('member_head_list');
        if($_GET['act']==1){
			$data['scene_identifier']=I('scene_identifier');
			$data['scene_name']=I('scene_name');
            $data['add_time']=date('y-m-d H:i:s');
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}		
		$this->display();
	}
	public function member_head_list(){
		$db = M('member_head_list');
		$info=$db->order('id desc')->select();
        if($_GET['act']==1){
			$data['head_name']=I('head_name');
			$data['head_description']=I('head_description');
            $data['add_time']=date('y-m-d H:i:s');
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}
        $this->assign('info',$info);		
		$this->display();
	}
	public function member_head_edit(){
		
		$this->display();
	}
	public function member_tree(){//会员关系树
		
		$this->display();
	}
	public function gold_add_subtract_log_list(){
		$db = M('gold_add_subtract_log_list');
		//$info=$db->order('id desc')->select();
		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function gold_add_subtract(){//加金币
		$db = M('userlist');
		$where['username']=I('member_tel');
		$info=$db->where($where)->find();
		
        if($_GET['act']==1){
			
			if(!$info['username']){	//$arr['status']=0;
				$this->error('没有此会员');
		}
			
			$type=I('gold_type');//类型+ -
			$wupin=I('gold_property');//奖励物品
			$num=I('gold_coins');//数量
			//echo I('member_tel'); echo $type; echo $wupin;  echo $num;exit;
			if($type==1){				
				if($wupin=='coins'){$data['gold']=$info['gold']+$num;$yuan_num=$info['gold'];$wupin='金币';}
				if($wupin=='diamond'){$data['zs']=$info['zs']+$num;$yuan_num=$info['zs'];$wupin='钻石';}
				if($wupin==2){$data['hetao']=$info['hetao']+$num;$yuan_num=$info['hetao'];$wupin='核桃';}
				if($wupin==8){$data['shiliu']=$info['shiliu']+$num;$yuan_num=$info['shiliu'];$wupin='石榴';}
				if($wupin==9){$data['hongzao']=$info['hongzao']+$num;$yuan_num=$info['hongzao'];$wupin='红枣';}
				if($wupin==10){$data['putao']=$info['putao']+$num;$yuan_num=$info['putao'];$wupin='葡萄';}
				if($wupin==14){$data['hamigua']=$info['hamigua']+$num;$yuan_num=$info['hamigua'];$wupin='哈蜜瓜';}
				if($wupin==15){$data['xiangli']=$info['xiangli']+$num;$yuan_num=$info['xiangli'];$wupin='香梨';}
				if($wupin==16){$data['shamoguo']=$info['shamoguo']+$num;$yuan_num=$info['shamoguo'];$wupin='沙漠果';}
				if($wupin==17){$data['renshenguo']=$info['renshenguo']+$num;$yuan_num=$info['renshenguo'];$wupin='人参果';}
				if($wupin==18){$data['xunyichao']=$info['xunyichao']+$num;$yuan_num=$info['xunyichao'];$wupin='薰衣草';}
				if($wupin==19){$data['shamorenshen']=$info['shamorenshen']+$num;$yuan_num=$info['shamorenshen'];$wupin='沙漠人参';}
				if($wupin==20){$data['badanmu']=$info['badanmu']+$num;$yuan_num=$info['badanmu'];$wupin='巴旦木';}
				if($wupin==21){$data['hetianyu']=$info['hetianyu']+$num;$yuan_num=$info['hetianyu'];$wupin='和田玉';}
			}else{
				if($wupin=='coins'){$data['gold']=$info['gold']-$num;$yuan_num=$info['gold'];$wupin='金币';}
				if($wupin=='diamond'){$data['zs']=$info['zs']-$num;$yuan_num=$info['zs'];$wupin='钻石';}
				if($wupin==2){$data['hetao']=$info['hetao']-$num;$yuan_num=$info['hetao'];$wupin='核桃';}
				if($wupin==8){$data['shiliu']=$info['shiliu']-$num;$yuan_num=$info['shiliu'];$wupin='石榴';}
				if($wupin==9){$data['hongzao']=$info['hongzao']-$num;$yuan_num=$info['hongzao'];$wupin='红枣';}
				if($wupin==10){$data['putao']=$info['putao']-$num;$yuan_num=$info['putao'];$wupin='葡萄';}
				if($wupin==14){$data['hamigua']=$info['hamigua']-$num;$yuan_num=$info['hamigua'];$wupin='哈蜜瓜';}
				if($wupin==15){$data['xiangli']=$info['xiangli']-$num;$yuan_num=$info['xiangli'];$wupin='香梨';}
				if($wupin==16){$data['shamoguo']=$info['shamoguo']-$num;$yuan_num=$info['shamoguo'];$wupin='沙漠果';}
				if($wupin==17){$data['renshenguo']=$info['renshenguo']-$num;$yuan_num=$info['renshenguo'];$wupin='人参果';}
				if($wupin==18){$data['xunyichao']=$info['xunyichao']-$num;$yuan_num=$info['xunyichao'];$wupin='薰衣草';}
				if($wupin==19){$data['shamorenshen']=$info['shamorenshen']-$num;$yuan_num=$info['shamorenshen'];$wupin='沙漠人参';}
				if($wupin==20){$data['badanmu']=$info['badanmu']-$num;$yuan_num=$info['badanmu'];$wupin='巴旦木';}
				if($wupin==21){$data['hetianyu']=$info['hetianyu']-$num;$yuan_num=$info['hetianyu'];$wupin='和田玉';}
			}
			if($type==1){$types='增加';}else{$types='减少';}
			if($db->where($where)->save($data)){
				$data2['username']=I('member_tel');
				$data2['type']=$types.$wupin;
				$data2['num']=$num;
				$data2['yuan_num']=$yuan_num;
				$data2['xian_num']=$yuan_num+$num;
				$data2['add_time']=date('y-m-d H:i:s');
                if(M('gold_add_subtract_log_list')->add($data2)){
					$this->success('增加奖励成功');
				//$arr['status']=1;
				//$arr['info']='增加奖励成功';
				//$arr['url']='admin.php?m=user&a=gold_add_subtract';	
				}else{
					$this->error('添加数据到记录表保存失败');
				//$arr['status']=0;
				//$arr['info']='添加数据到记录表保存失败';	
				}
			}else{
				$this->error('添加数据到记录表保存失败');
				//$arr['status']=0;
				//$arr['info']='奖励失败';
			}
        //$this->ajaxreturn($arr,'json');				
		}        	
		$this->display();
	}
	public function member_login_log_list(){
		$db = M('member_login_log_list');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function member_gold_log_list(){
		$db = M('member_gold_log_list');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function member_land_log_list(){
		$db = M('member_land_log_list');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function member_log_list(){
		$db = M('member_log_list');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function pet_list(){
		$db = M('pet_list');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function pet_level(){
		$db = M('pet_level');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();
		
		$info2=$db->order('level desc')->find();
		if(!$info2['level']){
			$level=1;
		}else{
			$level=$info2['level']+1;
		}

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);
        $this->assign('level',$level);		
		$this->display();
	}
	public function pet_add(){
		$db = M('pet_list');
        if($_GET['act']==1){
			$data['pet_name']=I('pet_name');
			$data['scene_name']=I('scene_name');
			$data['pet_score']=I('pet_score');
			$data['pet_identifier']=I('pet_identifier');
			$data['pet_attack']=I('pet_attack');
			$data['pet_defense']=I('pet_defense');
			$data['pet_speed']=I('pet_speed');
			$data['pet_luck']=I('pet_luck');
			$data['pet_life']=I('pet_life');
			$data['pet_description']=I('pet_description');            
			if($db->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}else{
			if($_GET['act']==2){
			$data['level']=I('level');
			$data['experience']=I('experience');
			 $data['life']=I('life');          
			if(M('pet_level')->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}
		}		
		$this->display();
	}
	
	public function pet_edit(){
		
		$this->display();
	}
	public function pet_level_edit(){
		$db = M('pet_level');
        $where['id']=I('param.id');		
        $info = $db->where($where)->select();
        if($_GET['act']==1){
			$data['experience']=I('param.exp');
			$data['life']=I('param.life');
			$data['max_attak']=I('param.max_attack');
			$data['max_defense']=I('param.max_defense');
			$data['max_speed']=I('param.max_speed');
			$data['max_luck']=I('param.max_luck');              			
			if($db->where($where)->save($data)){
				$arr['code']=1;
				$arr['msg']='修改成功';				
			}else{
				$arr['code']=0;
				$arr['msg']='没有改动,修改失败';
			}
			$this->ajaxreturn($arr,'json');
		}	
        $this->assign('info',$info);
		$this->display();	
	}
	public function pet_level_del(){
		$db = M('pet_level');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
			if($db->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}	
	}
	public function raiders_list(){
		$db = M('raiders_list');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('id > 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function raiders_listadd(){
		$db = M('raiders_list');
        if($_GET['act']==1){
			$data['news_columnid']=I('news_columnid');
			$data['news_name']=I('news_name');
			$data['kind_text']=I('kind_text');			
			$data['time']=date('y-m-d H:i:s');            
			if($db->add($data)){
				$arr['status']=1;
				$arr['info']='添加成功';
                 $arr['url']='admin.php?m=user&a=raiders_listadd';				
			}else{
				$arr['status']=0;
				$arr['info']='添加失败';
			}
            $this->ajaxreturn($arr,'json');			
		}        		
		$this->display();
	}
	public function raiders_listedit(){
		$db = M('raiders_list');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
        if($_GET['act']==1){
			$data['experience']=I('param.exp');
			$data['life']=I('param.life');
			$data['max_attak']=I('param.max_attack');
			$data['max_defense']=I('param.max_defense');
			$data['max_speed']=I('param.max_speed');
			$data['max_luck']=I('param.max_luck');              			
			if($db->where($where)->save($data)){
				$arr['status']=1;
				$arr['info']='修改成功';
                $arr['url']='admin.php?m=user&a=raiders_list';					
			}else{
				$arr['status']=0;
				$arr['info']='没有改动,修改失败';
			}
			$this->ajaxreturn($arr,'json');
		}	
        $this->assign('info',$info);
		$this->display();	
	}
	public function raiders_label(){
		
		$this->display();
	}
	public function raiders_listdel(){
		$db = M('raiders_list');
        $where['id']=$_GET['id'];		
        $info = $db->where($where)->select();
			if($db->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}	
	}
	public function raiders_labeledit(){
		
		$this->display();
	}
	public function raiders_labeladd(){
		
		$this->display();
	}
	public function raiders_column(){
		
		$this->display();
	}
	public function raiders_columnadd(){
		
		$this->display();
	}
	public function raiders_columnedit(){
		
		$this->display();
	}
	public function tixian_yes(){
		$db = M('tixian');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('zt = 1')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function tixian_no(){
		$db = M('tixian');
		//$info=$db->order('id desc')->select();		
        import('ORG.Util.Page');
        $count = $db->count();
        $Page = new Page($count,10);
        $show = $Page->show();

		$info = $db
        ->where('zt = 0')
        ->order('id DESC')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
		
		$this->assign('page',$show);
        $this->assign('info',$info);		
		$this->display();
	}
	public function okpay(){
		$db = M('tixian');
		$where['id']=$_GET['id'];
		$info=$db->where($where)->find();
		
		$db2 = M('userlist');
		$where2['userid']=session('uid');
		$info2=$db2->where($where2)->find();
		if($_GET['act']==1){
			$data['zt']=1;
			$data['ok_time']=date('y-m-d H:i:s');
			if($db->where($where)->save($data)){
				$this->success('支付成功');
			}else{
				$this->error('数据保存失败');
			}
		}else{
			if($_GET['act']==1){
			$data['zt']=2;
			$db->where($where)->save($data);
			$data2['gold']=$info2['gold']+$info['money'];
			if($db2->where($where2)->save($data2)){
				$this->success('拒绝成功，已返回提现所需货币到会员帐户');
			}else{
				$this->error('拒绝失败');
			}
		}
		}
        $this->assign('info',$info);		
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