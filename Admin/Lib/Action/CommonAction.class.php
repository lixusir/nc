<?php
//公共控制器
class CommonAction extends Action {
    //判断是否通过账号登录后台
	public function _initialize () { 
		if (!isset($_SESSION['adminid']) || !isset($_SESSION['adminname'])) { 
			$this->redirect('Login/index');
		}
	}
}
?>