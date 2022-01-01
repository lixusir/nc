<?php
/**
 * 用户表操作模型
 */
Class UserModel extends Model {

	//自动验证
	Protected $_validate = array(
		//array('email', 'require', '邮箱不能为空'),
		//array('email', '', '邮箱已存在', 1, 'unique'),
		//array('email', 'email', '邮箱格式不正确！'),
		array('username', 'require', '用户昵称不能为空'),
		array('username', '', '用户昵称已存在', 1, 'unique'),
		array('password', 'require', '密码不能空'),
		//array('password', '/^\w{6,20}$/s', '密码格式不正确'),
		//array('pwd', 'password', '两次密码不一致', 1, 'confirm')
		);

	//自动完成
	Protected $_auto = array(
		//MD5加密密码
		array('password', 1, 'function'),
		//登录时间
		array('logintime', 'date("Y-m-d H:i:s")', 1, 'function'),
		//注册时间
		array('regtime', 'date("Y-m-d H:i:s")', 1, 'function'),
		//登录IP
		array('loginip', 'get_client_ip', 1, 'function')
		);
}
?>