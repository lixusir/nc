<?php
//会员中心控制器
class TouAction extends CommonAction {
	public function get_user(){
		$db = M('Userlist');
        $where['userid'] = $_GET['userid'];		    
        $info = $db->where($where)->find(); 
		
    $sign_time=strtotime($info['sign_time']);
    $jt3=strtotime(date('Y-m-d',time()).' 00:00:00');
	//echo sign_time-jt3;exit;
    if($sign_time-$jt3<0){$data['sign']=0;$db->where($where)->save($data);}	
		//PHP计算两个时间差的方法 
     $lqtime1=time_cha(lqtime1);$lqtime2=time_cha(lqtime2);$lqtime3=time_cha(lqtime3);$lqtime4=time_cha(lqtime4);
	 $lqtime5=time_cha(lqtime5);$lqtime6=time_cha(lqtime6);$lqtime7=time_cha(lqtime7);$lqtime8=time_cha(lqtime8);
	 $lqtime9=time_cha(lqtime9);$lqtime10=time_cha(lqtime10);$lqtime11=time_cha(lqtime11);$lqtime12=time_cha(lqtime12);
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
     if($info['autobozong']==1 && time_cha(autobozong_kttime)>=3600){$data['autobozong']==0;}else{if($info['autobozong']==1){autobozong();}} 	 
	 if($info['autoshou']==1 && time_cha(autoshou_kttime)>=3600){$data['autoshou']==0;}else{if($info['autoshou']==1){autoshou();}}
	 $db->where($where)->save($data);//更新
	//echo $info['autoshou'];exit;
	 
	 $s=rand(1,12);
	 //echo $info['fangwu'];exit;
	 $arr['sf1']=$info['sf1'];
	 $arr['fangwu']=$info['fangwu'];
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
	 $arr['lvl']=$info['lvl'];
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
	 $this->assign('fangwu',$info4['fangwu']);
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
}