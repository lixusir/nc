<?php

//后台签到设置控制器
class SigninAction extends CommonAction { 
    
    //签到设置页面视图
	public function index(){ 
        C('TOKEN_ON',false);
		$this->display();
	}

}
?>