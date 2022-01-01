<?php
// 后台登录控制器
class LoginAction extends Action {

	//后台登录视图
    public function index(){
	    $this->display();
    }

    //调用验证码
    Public function verify(){
        ob_clean();
        import('ORG.Util.Image');
        Image::buildImageVerify(4,1,'png');
    }

    //后台登录方法
    public function login(){

    	if (!$_POST) halt('页面不存在');//判断是否POST提交

    	if ($_SESSION['verify'] != md5($_POST['code'])){//验证码比对
    		$this->error('验证码错误!');
        }

        $username = I('username');
        $password = I('password');

        $db = M('admin')->where(array('username' => $username))->find();//查询账号是否存在

        //核对用户密码
        if(!$db || $db['password'] != $password){
        	$this->error('用户名或密码错误！');
        }

        if($db['lock']) $this->error('账号被锁定，请联系超级管理员');//判断账号是否锁定
        
        //更新登录时间IP
        $data = array(
        	'id' => $db['id'],
        	'logintime' => time(),
        	'loginip' => get_client_ip(),
        	);
        M('admin')->save($data);

        //写入session
        session('adminid', $db['id']);
        session('adminname', $db['username']);
        session('logintime', date('Y-m-d H:i:s', $db['logintime']));
        session('loginip', $db['loginip']);

        $this->redirect('Index/index'); //登录成功后跳转到后台首页
    }

        //退出登录
    Public function logout () {
    	session_unset();
    	session_destroy();
    	$this->redirect('Login/index');
    }
}
?>