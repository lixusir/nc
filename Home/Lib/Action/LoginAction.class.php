<?php
//会员登录控制器
class LoginAction extends CommonAction {

    //登录页面视图
    public function index(){
        ///if(session('uid')!='' || session('username')!='')
            //$this->success('您已登录...', U('/'));
        //}else{
			
			$this->display();
		
            //$this->display();
        //}
    }
    
    //调用验证码
    Public function verify(){
        ob_clean();
        import('ORG.Util.Image');
        Image::buildImageVerify(4,1,'png');
    }
	 Public function login2(){
		 if($_GET['act']==1){
         //if (!$this->isPost()) halt('页面不存在');
        //获取POST数据
        $tel = I('tel');        
		$pwd = I('pwd');
        
        //$echo $pwd;exit;
        //查询登录用户数据
        $db = M('User');
        $where = array('username' => $tel);
        $field = array('id','username','password','zfb','weixin');
        $user = $db->where($where)->find();
        if ($user['status']==0) {
			$this->error('帐号被锁定，请联系管理员！');
			
        }
        //自动登录处理
        if (isset($_POST['auto'])) {
            $value = $user['id'] . '|' . get_client_ip();
            $value = encrytion($value, 1);
            @setcookie('auto', $value, C('AUTO_LOGIN_LIFETIME'), '/');
        }    
        //核对用户密码
        if (!$user) {
			$this->error('没有此会员');
            
        }
		if ($user['password'] != $pwd) {
			$this->error('会员密码不正确');
            
          }else{        
        //检查用户状态是否锁定
            
        //更新登录时间IP
        $data = array(            
            'logtime' => date('y-m-d H:i:s'),
            'logip' => get_client_ip(),
			'lognum' => $user['lognum']+1,
            );
        $db->where($where)->save($data);        
        //写入session
        session('uid', $user['id']);
		session('password', $user['password']);
        session('nickname', $user['nickname']);            
        session('username', $user['username']);
		session('jypwd', $user['jypwd']);
		session('zfb', $user['zfb']);
		session('weixin', $user['weixin']);		
			//登录成功跳转
		$data2['username']=$tel;
        $data2['nickname']=$user['nickname'];
        $data2['logtime']=date('y-m-d H:i:s');
        $data2['logip']=get_client_ip();
        if(M('member_login_log_list')->add($data2)){
			header("Location: index.php?m=index&a=index2");exit;			
		}else{
			$this->error('登录日志未保存');
			
		}		
			            
	    }
		 }
       
        $this->display();
		 
    }

    //登录表单处理
    public function login() {
        if (!$this->isPost()) halt('页面不存在');
        //获取POST数据
        $tel = I('post.tel');        
		$pwd = I('post.pwd');
        $verCode = $this->_post('verCode');
        //验证码比对
        if($verCode!=99){$arr['reMsg']='验证码不正确';$this->ajaxreturn($arr,'JSON');$this->display();exit; }		
        //查询登录用户数据
        $db = M('userlist');
        $where = array('username' => $tel);
        $field = array('id','username','password','zfb','weixin');
        $user = $db->where($where)->find();
		
		$db4 = M('Userlist');
        $where4 = array('username' => $tel);
        $field4 = array('id','username','password','zfb','weixin');
        $user4 = $db4->where($where4)->field($field4)->find();
		
		
        
        //核对用户密码
        if (!$user) {
            $arr['reMsg']='没有此会员';$this->ajaxreturn($arr,'JSON');$this->display();exit;
        }
		if ($user['password'] != $pwd) {
            $arr['reMsg']='会员密码不正确';$this->ajaxreturn($arr,'JSON');$this->display();exit;
          }else{        
        //检查用户状态是否锁定
        if ($user['status']==0) {
			$arr['reMsg']='帐号被锁定，请联系管理员！';$this->ajaxreturn($arr,'JSON');$this->display();exit;            
        }
        //自动登录处理
        if (isset($_POST['auto'])) {
            $value = $user['userid'] . '|' . get_client_ip();
            $value = encrytion($value, 1);
            @setcookie('auto', $value, C('AUTO_LOGIN_LIFETIME'), '/');
        }        
        //更新登录时间IP
        $data = array(            
            'logtime' => date('y-m-d H:i:s'),
            'logip' => get_client_ip(),
			'lognum' => $user['lognum']+1,
            );
        $db->where($where)->save($data);        
        //写入session
        session('uid', $user['userid']);
		session('password', $user['password']);
        session('nickname', $user['nickname']);            
        session('username', $user['username']);
		session('jypwd', $user['jypwd']);
		session('zfb', $user['zfb']);
		session('weixin', $user['weixin']);		
			//登录成功跳转
		$data2['username']=$tel;
        $data2['nickname']=$user['nickname'];
        $data2['logtime']=date('y-m-d H:i:s');
        $data2['logip']=get_client_ip();
        if(M('member_login_log_list')->add($data2)){
			$arr['reTips']='Success';
            $arr['reMsg']='恭喜您登录成功!';
		}else{
			$arr['reTips']='error';
            $arr['reMsg']='登录日志未保存';
		}		
			            
	    }
        $this->ajaxreturn($arr,'JSON');
        $this->display();
    }
    
	//退出登录
    Public function logout () {
        cookie('auto',null);
        session(null);
        session_unset();
        session_destroy();
        redirect(U('/Login'));
    }
    
    //QQ登录
    public function qq_login(){
        vendor('Connect.qqConnectAPI');
        $qc = new QC();
        $qc->qq_login();
    }
    
    //qq验证登陆
    public function qq_callback(){
        vendor('Connect.qqConnectAPI');
        $qc = new QC();
        $qc->qq_callback();
        $qc->get_openid();
        $this->success("QQ登陆成功",U('Login/qq_user'));
    }
    
    //qq取资料
    public function qq_user(){
        vendor('Connect.qqConnectAPI');
        $qc = new QC();
        $arr = $qc->get_user_info();
        //判断是否绑定
        $qq = M('qq_user');
        $where['openid']=$_SESSION['QC_userData']['openid'];
        $uid =$qq->where($where)->getField('uid');
        if($uid){
            //更新登录时间
            $data = array(
            'id' => $uid,
            'logintime' => time(),
            'loginip' => get_client_ip(),
            );
            M('User')->save($data);
            //写入cookie
            $value = $uid . '|' . get_client_ip();
            $value = encrytion($value, 1);
            cookie('auto', $value, 86400);
            $this->redirect('/');
        }else{
            session('nick',$arr['nickname']);
            $this->success("请完善用户信息",U('Login/reg_qq'));
        }
    }
    
    //qq注册完善信息
    public function reg_qq(){
        if(IS_POST){
            $data['email'] = I('post.email');
            $data['username'] = I('post.username');
            $data['password'] = md5(I('post.password'));
            $data['regtime'] = time();
            $data['logintime'] = time();
            $data['loginip'] = get_client_ip();
            $pwd  = md5(I('post.pwd'));
            
            
            $User=M("User");
            //判断密码是否一致
            if($pwd != $data['password']){
                $this->error('两次密码不一致！');
            }

            //判断登录邮箱是否存在
            if($User->where(array('email'=>$data['email']))->getField('id')){
                $this->error('对不起,此邮箱已存在！');
            }
            
            //判断用户昵称是否存在
            if($User->where(array('username'=>$data['username']))->getField('id')){
                $this->error('对不起,此用户昵称已存在！');
            }
            

            if($uid = $User->add($data)){
                //绑定qq
                $qq = M("Qq_user");
                $Qdata['access_token']=$_SESSION['QC_userData']['access_token'];
                $Qdata['openid']=$_SESSION['QC_userData']['openid'];
                $Qdata['time']=time();
                $Qdata['uid']=$uid;
                $qq->add($Qdata);
                $this->regRew($uid,$data['username']); //发放注册奖励
                $this->success('注册成功,请使用QQ登陆或邮箱登录！',U('Index/index'));
            }else{
                $this->error('注册成功,但QQ绑定失败,请登录后再次绑定!');
            }
        }else{
            if(session('nick')){
                $this->display();
            }else{
                $this->error('非法操作！');
            }
        }
    }
    
    /*注册奖励*/
    private function regRew($uid,$username) {
        $user = M('User');
        $where = array('id' => $uid);
        //增加金币
        $user->where($where)->setInc('score', C('REG_MONEY')); 
        //增加收入明细
        $data = array(
            'userid' => $uid,
            'username' => $username,
            'record' => '注册成为'.C('WEB_NAME').'会员',
            'score' => C('REG_MONEY'),
            'time' => time()
            );
        M('User_log')->data($data)->add();
    }
}
?>