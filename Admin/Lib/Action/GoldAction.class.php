<?php

//后台金币设置控制器
class GoldAction extends CommonAction { 
    
    //金币以及提成设置页面视图
	public function index(){
		
		$db=M("config");
		$info=$db->limit(1)->select();
		$this->assign('info',$info); 
		
		//echo $info['tiechanliang'];exit;
        
		$this->display();
	}
}
?>