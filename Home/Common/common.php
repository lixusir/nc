<?php
/**
 * 格式化输出打印
 */
function p ($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

/**
 * 异位或加密
 * @param  [type]  $value [description]
 * @param  integer $type  [description]
 * @return [type]         [description]
 */
 
 
function encrytion ($value, $type=0) {
	$key = md5(C('AUTO_LOGIN_KEY'));
	if ($type) {
		return str_replace('=', '', base64_encode($value ^ $key));
	}
	$value = base64_decode($value);
	return $value ^ $key;
}


function check_sq(){
		//if($_GET['zt']==0){
			$url='http://sq.yk676.com/index.php?m=ajax&a=sq_cx&sq_domain='.$_SERVER['HTTP_HOST'];
	        header('Location:' .$url);exit;
		//}else{
			if($_GET['zt']==0){
			 return 0;	
			}else{
				return 1;
			$this->display();	
			}
		//}
	}


/**
 * 格式化字符串时间
 * @param  [type] $time [description]
 * @return [type]       [description]
 */
function time_trans($the_time)
{
    $now_time = time();
    $show_time = strtotime($the_time);
 
    $dur = $now_time - $show_time;
 
    if($dur < 60){
        return $dur.'秒前';
    }else if($dur < 3600){
        return floor($dur/60).'分钟前';
    }else if($dur < 86400) {
        return floor($dur/3600).'小时前';
    }else if($dur < 259200) {//3天内
        return floor($dur / 86400) . '天前';
    }else{
        return $the_time;
    }
}
//两时间相减
function time_cha($times){
	    $db=M("userlist");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		
		$startdate=$info[$times];
		$enddate=date("Y-m-d H:i:s");
		
     $date=floor((strtotime($enddate)-strtotime($startdate))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);
     $cha=$date*86400+$hour*3600+$minute*60+$second;
	    return $cha;	
}
function time_cha_tou($times,$uid){
	    $db=M("userlist");
		$where['userid']=$uid;
		$info=$db->where($where)->find();
		
		$startdate=$info[$times];
		$enddate=date("Y-m-d H:i:s");
		
     $date=floor((strtotime($enddate)-strtotime($startdate))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);
     $cha=$date*86400+$hour*3600+$minute*60+$second;
	    return $cha;	
}
//宠物经验升级
function cwupate(){
	    $db=M("congwu");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		if($info['jinyan'] >= 5*$info['lvl']*($info['lvl']+1) && cha_userlist(lvl)-$info['lvl']>2){
			$data['lvl']=$info['lvl']+1;
			$data['jinyan']=$info['jinyan']-5*$info['lvl']*($info['lvl']+1);
			$db->where($where)->save($data);
		}
}
//宠物每小时消耗体力
function cw_cost_tili(){
	    $db=M("congwu");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		
		$startdate=$info['wy_time'];
		$enddate=date("Y-m-d H:i:s");
		
     $date=floor((strtotime($enddate)-strtotime($startdate))/86400);
     $hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
     $minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
     $second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);
     $cha=$date*86400+$hour*3600+$minute*60+$second;
      //echo $cha;exit;	   
		if($info['tili'] > 0 && $cha>3600){
			$data['tili']=$info['tili']-$cha/3600*cfg_data(config_pet_hour);
            $data['wy_time']=date('y-m-d H:i:s');		
			$db->where($where)->save($data);
		}
}
//任何表字段减操作
function data_jian($t,$f,$num){	    
	    $db=M($t);
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		$data[$f]=$info[$f]-$num;
		
        if($db->where($where)->save($data)){
			return 1;
		}else{
			return 0;
		}		
}
//查宠物资料
function cw_info($field){
	    $db=M("congwu");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		return $info[''.$field];
}
//自动收获果实
function autoshou(){
	    $db=M("userlist");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		
		for($x=1; $x<=12; $x++){
			
		$db2=M("crops_list");
		$where2['name']=$info['land_gs'.$x];
		$info2=$db2->where($where2)->find();	
		$sz=$info2['crops_grow'];	
		
		$jian1=cfg_data(config_pest_reduce);$jian2=cfg_data(config_drought_reduce);$jian3=cfg_data(config_weed_reduce);
		$chan=cha_crops_chan($info['land_gs'.$x]);
		
		$gs_type=$info['land_gs'.$x];
		//给上级交佣金
		$where11['userid']=$info['upxianid'];//一级上线
	  $info11=$db->where($where11)->find();
	  $where12['userid']=$info11['upxianid'];//二级上线
	  $info12=$db->where($where12)->find();
	  $where13['userid']=$info12['upxianid'];//三级上线
	  $info13=$db->where($where13)->find();
	  if($chan>0){//上线的id
	    //一级上线
		$db->where('userid='.$info['upxianid'])->setInc($gs_type, (int)$chan/100*cfg_data(config_diamond_one));//上线加
		$db->where('userid='.$info['upxianid'])->setInc('yj_'.$gs_type, (int)$chan/100*cfg_data(config_diamond_one));//加上线记录
		//二级上线
		$db->where('userid='.$info11['upxianid'])->setInc($gs_type, (int)$chan/100*cfg_data(config_diamond_two));
	    $db->where('userid='.$info11['upxianid'])->setInc('yj_'.$gs_type, (int)$chan/100*cfg_data(config_diamond_two));
		//三级上线
		$db->where('userid='.$info12['upxianid'])->setInc($gs_type, (int)$chan/100*cfg_data(config_diamond_three));
	    $db->where('userid='.$info12['upxianid'])->setInc('yj_'.$gs_type, (int)$chan/100*cfg_data(config_diamond_three));
	 }//给上级交佣金结束
		
		$j=rand(1,$info['lvl']);
	 if($info['sf'.$x]==1){$sfj=$j;}else{$sfj=0;}	//施肥+产量
	 if($info['fengshousx']==1){$sfj2=cfg_data(config_bumper_count);}else{$sfj2=0;}	//丰收神像+产量
	 $gs_num[$x]=$chan-$jian1-$jian2-$jian3+$sfj+$chan*cw_info(xinyun)/100;
	 
		//if($info['lqtime'.$x]>cha_crops_sz($info['land_gs'.$x])*3600 && $info['zt'.$x]==1){
			if(time_cha('kttime'.$x)>$sz*3600 && $info['zt'.$x]==1){
			$data=array(
			$gs_type=>$info['land_gs'.$x]+$gs_num[$x],//入仓库
			);
			$data['cc'.$x]=0;$data['sc'.$x]=0;$data['js'.$x]=0;$data['sf'.$x]=0;
			$data['land_gs'.$x]=null;$data['jinyan']=$info['jinyan']+1;//经验等于收获 的10分之1
			
			$data['zt'.$x]=2;//收割后2清理
		    $data['kttime'.$x]=date('y-m-d H:i:s');//时间归0
		 	
		$data2['userid']=session('uid');
		$data2['time']=date('y-m-d H:i:s');
		$data2['landid']=$id;
		$data2['record']='在地块'.$x.'收割了'.$gs_num[$x].'个'.$$info['land_gs'.$x];
         
        $aa=$db->where($where)->save($data);//更新
		M('rizhi')->add($data2);
		}else{}
		
		}
}
//自动偷果实
function autotou($uid){
	    $db=M("userlist");
		$where_tou['userid']=$uid;
		$where['userid']=session('uid');
		$field=array('land_gs','zt','lvl','xigua','xiangli','hamigua','putao','badanmu','shamoguo','shamorenshen','hetianyu','xunyichao','hongzao','shiliu','hetao');
		$info_tou=$db->where($where)->field($field)->find();
		$info=$db->where($where)->find();
		
		for($x=1; $x<=12; $x++){
			
		$db2=M("crops_list");
		$where2['name']=$info_tou['land_gs'.$x];
		$info2=$db2->where($where2)->find();	
		$sz=$info2['crops_grow'];		
		
		$chan=cha_crops_chan($info_tou['land_gs'.$x]);
		
		$gs_type=$info['land_gs'.$x];
	 
	 $gs_num[$x]=$chan*cfg_data(config_steal_count)*1/100;
	 
		//if($info['lqtime'.$x]>cha_crops_sz($info['land_gs'.$x])*3600 && $info['zt'.$x]==1){
			if(time_cha_tou('kttime'.$x,$uid)>$sz*3600 && $info_tou['zt'.$x]==1){
			$data=array(
			$gs_type=>$info['land_gs'.$x]+$gs_num[$x],//入仓库
			);	
			
		$data2['userid']=session('uid');
		$data2['time']=date('y-m-d H:i:s');
		$data2['landid']=$id;
		$data2['record']='在地块'.$x.'偷摘了会员ID'.$uid.$gs_num[$x].'个'.$info['land_gs'.$x];
         
        $aa=$db->where($where)->save($data);//更新
		if(M('rizhi')->add($data2)){
			return 1;
		}
		}else{}
		
		}
}
//播种次数满10归0以引发，虫害，干旱，等天灾
function zz_count(){
	    $db=M("userlist");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		for($x=1; $x<=12; $x++){			
		if($info['zz_count'.$x]>=10){			
		$data['zz_count'.$x]=0;         
        $aa=$db->where($where)->save($data);//更新		
		 }		
		}
}
//自动播种
function autobozong(){
	$db=M("userlist");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		for($x=0; $x<=12; $x++){
			
			
			$cost_gold=cfg_data(config_till_price);//花费金币
		$cost_zznum=cfg_data(config_seed_count);//花费种子
	    $landNum=$x;
		$id='tudi'.$x;		
		$tudiid=cha_userlist($id);//0是戈壁滩，1，2，3升级
		if($tudiid==0){$rand0=2;}else{if($tudiid==1){$rand0=4;}if($tudiid==2){$rand0=6;}if($tudiid==3){$rand0=12;}}
		$rands=rand(1,$rand0);
		if($rands==1){$gs='hetao';}else{if($rands==2){$gs='shiliu';}if($rands==3){$gs='hongzao';}if($rands==4){$gs='putao';}
		if($rands==5){$gs='hamigua';}if($rands==6){$gs='xiangli';}if($rands==7){$gs='shamoguo';}if($rands==8){$gs='renshenguo';}
		if($rands==9){$gs='xunyichao';}if($rands==10){$gs='shamorenshen';}if($rands==11){$gs='badanmu';}if($rands==12){$gs='hetianyu';}
		}
		
		//if($info['gold']<$cost_gold || $info['zhongzi']<$cost_zznum){
			//return($x=0);//种子不足
		 //}else{
			 if($info['zt'.$x]==2 || $info['zt'.$x]==0){
		$data['sc'.$landNum]=0;//杀虫恢复未杀
		$data['js'.$landNum]=0;//浇水恢复
		$data['cc'.$landNum]=0;//除草恢复
		$data['sf'.$landNum]=0;//施肥恢复
		$data['zz_count'.$landNum]=$info['zz_count'.$landNum]+1;//计算每块地的种植次数  	 
		$data['land_gs'.$landNum]=$gs;//播种 时根据土地等级，该 播种哪些种子，收获也按这个	 
        $data['zt'.$landNum]=1;	
		$data['gold']=$info['gold']-$cost_gold;
		$data['zhongzi']=$info['zhongzi']-$cost_zznum;
        $data['jinyan'.$landNum]=$info['jinyan'.$landNum]+1;	//加经验	
		//$data['nc'.$landNum]=1;
		$data['kttime'.$landNum]=date('y-m-d H:i:s');
		
		$data2['userid']=session('uid');
		$data2['time']=date('y-m-d H:i:s');
		$data2['landid']=$landNum;
		$data2['record']='在地块'.$x.'播种了'.$gs.'种子';
		M('rizhi')->add($data2);
		
		$db->where($where)->save($data);	
			
			 }
			
		//}//种子不足结束
		
		
		}	
		
		
}

//配置表查配置数据
function cfg_sys($data){
	    $db_cfg=M("sys");
		$where_cfg['id']=1;
		$info_cfg=$db_cfg->where($where_cfg)->find();
	    return $info_cfg[''.$data];	
}
//配置表查配置数据
function cfg_data($data){
	    $db_cfg=M("game_config");
		$where_cfg['id']=1;
		$info_cfg=$db_cfg->where($where_cfg)->find();
	    return $info_cfg[''.$data];	
}
//配置表查配置数据
function cfg_config($data){
	    $db_cfg=M("config");
		$where_cfg['id']=1;
		$info_cfg=$db_cfg->where($where_cfg)->find();
	    return $info_cfg[''.$data];	
}
//查userlist用户数据
function cha_userlist($field){
	    $db=M("userlist");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
	    return $info[''.$field];	
}
//查crops_list农作物信息
function cha_crops_zz($field){//种子期时间
	    $db=M("crops_list");
		$where['name']=$field;
		$info=$db->where($where)->find();	
		$zz=$info['crops_seed'];
        if($zz!=null){$s=$zz;}else{$s=1000000;}	
	    return $s;	
}
function cha_crops_fy($field){//种子期时间
	    $db=M("crops_list");
		$where['name']=$field;
		$info=$db->where($where)->find();	
		$zz=$info['crops_sprout'];	
	    if($zz!=null){$s=$zz;}else{$s=1000000;}	
	    return $s;	
}
function cha_crops_sz($field){//种子期时间
	    $db=M("crops_list");
		$where['name']=$field;
		$info=$db->where($where)->find();	
		$zz=$info['crops_grow'];	
	    if($zz!=null){$s=$zz;}else{$s=1000000;}	
	    return $s;	
}
function cha_crops_chan($field){//查果实产量
	    $db=M("crops_list");
		$where['name']=$field;
		$info=$db->where($where)->find();	
		$zz=$info['crops_harvest'];	
	    if($zz!=null){$s=$zz;}else{$s=1000000;}	
	    return $s;	
}
function cha_crops_name($field){//查当前播种的作物名
	    $db=M("userlist");
		$where['userid']=session('uid');
		$info=$db->where($where)->find();
		$n=$info['land_gs'.$field];
		if($n=='hetianyu'){$name='和田玉';}if($n=='badanmu'){$name='巴旦木';}if($n=='badanmu'){$name='沙漠人参';}
		if($n=='xunyichao'){$name='薰衣草';}if($n=='renshenguo'){$name='人参果';}if($n=='shamoguo'){$name='沙漠果';}
		if($n=='xiangli'){$name='香梨';}if($n=='hamigua'){$name='哈密瓜';}if($n=='putao'){$name='葡萄';}
		if($n=='hongzao'){$name='红枣';}if($n=='shiliu'){$name='石榴';}if($n=='hetao'){$name='核桃';}
		
	    return $name;	
}

/*根据时间戳返回星期几*/
function weekday($time)
{
    if(is_numeric($time))
    {
        $weekday = array('日','一','二','三','四','五','六');
        return $weekday[date('w', $time)];
    }
     return false;
}

/**
 * 邮件发送函数
 */
function sendMail($to, $title, $content) {
 
    Vendor('PHPMailer.PHPMailerAutoload');     
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host = C('MAIL_HOST'); //smtp服务器的名称
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的用户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet = C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject = $title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "邮件内容不支持HTML,请联系管理员QQ：395486566"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}

?>

