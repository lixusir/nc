<?php

//网站设置控制器
class SetupAction extends CommonAction { 
    
    //网站设置页面视图
	public function index(){
		C('TOKEN_ON',false);
		$this->display();
	}

	//修改公共配置文件
	Public function edit () {
		$db=M("config");
		$where['id']=1;
		$jink=I('post.jink');
		$ckremaintime=I('post.ckremaintime');
		$tiek=I('post.tiek');
		$data['tiechanliang']=I('post.tiek');
		$data['sjchanliang']=I('post.jink');
		$data['ckremaintime']=$ckremaintime;
		if($db->where($where)->save($data)){
		 $this->success('修改成功', $_SERVER['HTTP_REFERER']);	
		}else{
			$this->error('修改失败');
		}
		
		//$file = './Conf/config.php';
		//$config = array_merge(include $file, array_change_key_case($_POST, CASE_UPPER));
		//$str = "<?php\r\nreturn " . var_export($config, true)
		//if (file_put_contents($file, $str)) {
			//$this->success('修改成功', $_SERVER['HTTP_REFERER']);
		//} else {
			//$this->error('修改失败');
		//}
	}
}
?>