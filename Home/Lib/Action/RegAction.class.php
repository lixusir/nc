<?php

//注册会员控制器
class RegAction extends CommonAction {
    /* 注册页面视图 */

    public function index() {
        //注册页提现轮播
        $db = M('paylist');
        $field = array('id', 'username', 'applytime', 'money');
        $pay = $db->field($field)->limit(30)->order('id DESC')->select();
        $this->assign('pay', $pay);

        //检测是否登录
        if (isset($_SESSION["uid"]) OR isset($_SESSION["username"])) {
            $this->success('您已注册并登录，请不要重复注册！', U('/'));
        } else {
            $this->display();
        }
    }

    /* 邮件发送注册码 */

    Public function Code() {
        $email = I('get.email');
        $user = M('User')->where(array('email' => $email))->getField('id');
        if ($email && !$user) {
            $code = md5($email . C('CODE_REG_KEY'));
            cookie('code', $code, C('CODE_REG_TIME'));
            $title = C('WEB_NAME') . '注册验证码';
            $content = '<div style="width:600px;margin:auto;line-height:2;font-size:12px;overflow:hidden;border-radius:3px;background:#FFF;box-shadow:0 0 10px rgba(0, 0, 0, 0.2);">';
            $content .= '<div style="height:69px;border-radius:3px 3px 0 0;background:#FF7800;">
        <span style="display: block; line-height: 39px; font-size: 16px; overflow: hidden; text-align: center; white-space: nowrap; color: rgb(255, 255, 255); padding-top: 15px;">' . $title . '</span>
    </div>';
            $content .= '<div style="padding:15px 30px;word-wrap:break-word;border:solid #C5C5C5;border-width:0 1px;"><br />';
            $content .= '<div style="line-height:28px;font-size:14px;font-weight:bold;">' . $email . '，你好！感谢你对' . C('WEB_NAME') . '的支持。</div>';
            $content .= '<p>你的注册验证码是：<span style="font-size:14px;color: #F60;font-weight:bold;">' . $code . '</span></p>';
            $content .= '<p>PS：注册验证码有效时间为24小时，请尽快使用！</p>';
            $content .= '<p style="color:#999;">此信是由 <a href="' . C('DOMAINNAME') . '" target="_blank">' . C('WEB_NAME') . '</a> 系统发出，系统不接收回信，请勿直接回复。如有任何疑问请<a href="mailto:' . C('MAIL_FROM') . '" target="_blank">联系我们</a>。</p>';
            $content .= '<p>申请时间：<span style="border-bottom:1px dashed #ccc;">' . date('Y-m-d H:i:s') . '</p></div>';
            $content .= '<div style="height:10px;overflow:hidden;border:1px solid #C5C5C5;border-top:0 none;border-radius:0 0 3px 3px;">';
            $content .= '<img src="' . C('DOMAINNAME') . '/Public/Home/picture/mail_bottom.gif" style="display:block;" /></div></div>';
            if (SendMail($email, $title, $content)) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo '此邮箱已被注册，请更换其他邮箱！';
        }
    }

    public function ycode() {
        if (IS_AJAX) {
            $tel = $_POST['tel'];
            if ($tel) {
                $gets = 0;
                if (session('ner_time') > time()) {//验证是否频繁获取
                    echo 103;
                    exit; //请在60秒后重新获取
                } else {
                    $code = mt_rand(100000, 999999); //存储验证码
                    $cg = $this->Postsms($tel, $code); //短信发送
                    $gets = $cg['respCode'];
                    if ($gets == 00000) {//发送成功
                        //验证码写入session
                        session('code', $code);
                        session('ner_time', time() + 60);
                        session('end_time', time() + 1800);
                        echo 100;
                        exit;
                    } else if ($gets == 00104) {
                        echo 104;
                        exit; //每天限制次数 输入超出限制
                    } else {
                        echo 105;
                        exit;
                    }
                }
            } else {
                echo 102;
                exit; //手机号嘛是空的
            }
        }
    }

    public function reg() {
        if (!$this->isPost())
            halt('页面不存在');
        //获取POST数据
        $tel = I('param.tel');
        $pwd = $this->_post('pwd');
        $realName = $this->_post('realName');
        $idCard = $this->_post('idCard');
        $reNum = $this->_post('reNum');
        $verCode = $this->_post('verCode');
        $msgCode = $this->_post('msgCode');
        //验证码比对
        if ($verCode != 99) {
            $arr['reMsg'] = '验证码不正确';
            $this->ajaxreturn($arr, 'JSON');
            $this->display();
            exit;
        }
        //查询登录用户数据
//        $db = M('Userlist');
        $where = array('username' => $tel);
        $user = M('Userlist')->where($where)->find();

        if (!I('param.tel')) {
            $this->error('手机号不能为空');
        }
        if (!I('param.msgCode')) {
            $this->error('验证码不能为空');
        }
        //检测短信验证码是否一致
//        if(session('code') != I('param.msgCode')){
//            session('uid',null);
//            session('username',null);
//            session('end_time',null);
//            session('code',null);
//            $this->error('短信验证码错误，请重新获取');
//        }
//        //检测短信验证码是否过期
//        if(session('end_time') < time()){
//            session('uid',null);
//            session('username',null);
//            session('end_time',null);
//            session('code',null);
//            $this->error('短信验证码已失效，请重新获取');
//        }
//        $userinfo = M('userlist')->where('id desc')->find();
        //核对用户密码
        if ($user['username']) {
            $arr['reMsg'] = '此手机或会员已被注册';
            $this->ajaxreturn($arr, 'JSON');
            $this->display();
            exit;
        } else {
            $data['username'] = $tel;

            $data['password'] = $pwd;
            $data['nickname'] = $realName;
            $data['card'] = $idCard;
            $data['upxianid'] = $reNum;
            $data['regtime'] = date('y-m-d H:i:s');
            $data['RegIP'] = get_client_ip();
            $userid = M('user')->add($data);

            if ($userid > 0) {
                //写入session      
                $_SESSION['uid'] = $userid;
                $_SESSION['username'] = $tel;
                session('uid', $userid);
                session('username', $tel);
                session(array('uid' => $userid, 'expire' => 3600));
                session(array('username' => $tel, 'expire' => 3600));

                $this->supRew(I('param.online')); //上线奖励
                $arr['reTips'] = 'Success';
                $arr['reMsg'] = '注册成功！';

                $sucaihuo['userid'] = $userid;
                $sucaihuo['ID'] = $userid;
                $sucaihuo['username'] = $tel;
                $sucaihuo['password'] = $pwd;
                $sucaihuo['status'] = 1;
                M('userlist')->add($sucaihuo);
//                                   echo M('userlist')->getLastSql();
            } else {
                $arr['reMsg'] = '数据保存失败';
                $this->ajaxreturn($arr, 'JSON');
                $this->display();
                exit;
            }
        }
        $this->ajaxreturn($arr, 'JSON');
        $this->display();
    }

    public function reg2() {
        if ($_GET['act'] == 1) {
            if (!$this->isPost())
                halt('页面不存在');
            //获取POST数据
            $tel = I('tel');
            $pwd = I('pwd');
            $realName = I('realName');
            $online = I('online');
            if ($tel == null) {
                $this->error('不能为空');
            }

            //查询登录用户数据
            $db = M('User');
            $where = array('username' => $tel);
            $user = $db->where($where)->find();

            //核对用户密码
            if ($user['username']) {
                $this->error('此手机或会员已被注册');
            } else {
                $data['username'] = $tel;
                $data['password'] = $pwd;
                $data['nickname'] = $realName;
                $data['upxianid'] = $online;
                $data['regtime'] = date('y-m-d H:i:s');
                $data['RegIP'] = get_client_ip();
                if ($db->add($data)) {
                    //写入session      
                    $_SESSION['uid'] = $user['id'];
                    $_SESSION['username'] = $tel;
                    session('uid', $user['id']);
                    session('username', $tel);
                    session(array('uid' => $user['id'], 'expire' => 3600));
                    session(array('username' => $tel, 'expire' => 3600));

                    $this->supRew(I('param.online')); //上线奖励
                    $this->success('注册成功！', 'index.php?m=index&a=index2');
                } else {
                    $this->error('数据保存失败');
                }
            }
        }
        $this->display();
    }

    /* 注册表单处理 */

    public function user() {
        C('TOKEN_ON', false); //关闭表单令牌

        if (!$this->isPost())
            halt('页面不存在');

        if (!C('WEB_REG')) {
            $this->error('网站被攻击，暂停注册中，请联系客服手动注册！', U('Index/index'));
        }

        $usernames = I('username');
        $online = I('online');


        $db = D('User'); //实例化
        //配置文件
        $dba = D('config'); //实例化
        $wherea['id'] = 1;
        $info = $dba->where($where)->find();

        //判断是否重复注册
        if ($info['reg_ip'] == 1) {
            $this->isReg();
        } else {
            
        }
        //限制注册ID必须填写
        if ($info['reg_id'] == 1) {
            if ($online == '') {
                $this->error('注册ID必须填写');
                exit;
            }
        } else {
            
        }

        //创建表单数据
        if (!$db->create()) {
            $this->error($db->getError());
        }

        //检测注册验证码是否一致
        // if(cookie('code') != I('post.code')){
        //     $this->error('注册验证码错误，请注意查收邮件！');
        // }

        $email = $db->email;
        $username = $db->username;

        if (!$id = $db->add())
            $this->error('注册失败，请重试...');

        session('uid', $id);
        session('email', $email);
        session('username', $usernames);
        cookie('code', null);

        $this->regRew(); //注册奖励
        $this->supRew(I('online')); //上线奖励
        //新增挖矿场的会员数据
        $conn = M('Userlist');
        $data2 = array(
            'userid' => session('uid'),
            'upxianid' => $online,
            'username' => session('username'),
            'tiektime' => date("Y-m-d H:i:s"),
            'jinktime' => date("Y-m-d H:i:s"),
            'logtime' => date("Y-m-d H:i:s"),
            'dajietime' => date("Y-m-d H:i:s"),
            'bdj_lasttime' => date("Y-m-d H:i:s"),
        );
        $conn->data($data2)->add();
        $this->success('注册成功.', U('/'));
    }

    /* 注册奖励 */

    private function regRew() {
        $user = M('User');
        $where = array('id' => session('uid'));
        //增加金币
        //$user->where($where)->setInc('score', C('REG_MONEY')); 
        //增加收入明细
        $data = array(
            'userid' => session('uid'),
            'username' => session('username'),
            'record' => '注册成为' . C('WEB_NAME') . '会员',
            'score' => C('REG_MONEY'),
            'time' => time()
        );
        M('User_log')->data($data)->add();
    }

    /* 上线奖励 */

    private function supRew($online = null) {
        if ($online) {
            //后台设置奖励多少
            $dba = M('config');
            $infoa = $dba->where('id=1')->find();
            $db = M('userlist');
            $supname = $db->where('userid=' . $online)->getField('username');
            $db->where('userid=' . $online)->setInc('zs', $infoa['config_register_reward']); //钻石zs
            //$db->where('userid='.$online)->setInc('tieky', $infoa['invite_tieky']);//永久矿石
            //$db->where('userid='.$online)->setInc('tiek', $infoa['invite_tiek']);//铁矿
            //$db->where('userid='.$online)->setInc('zhuanshi', $infoa['invite_zhuanshi']);//钻石
            //$db->where('userid='.$online)->setInc('zpsj_lq_tiek', $infoa['invite_tiek']);//更新到上级可领取的水晶处
            //$db->where('userid='.$online)->setInc('zpsj_lq_jink', $infoa['invite_jink']);//更新到上级可领取
            //$db->where('userid='.$online)->setInc('zpsj_lq_tieky', $infoa['invite_tieky']);//更新到上级可领取
            //$db->where('userid='.$online)->setInc('zpsj_lq_zhuanshi', $infoa['invite_zhuanshi']);//更新到上级可领取
            //写入邀请表
            $dbb = M('invite_record');
            $data = array(
                'onlineid' => $online,
                'byqname' => I('username'),
                'invite_jl' => $infoa['invite_jink'],
                'invite_time' => date('y-m-d h:i:s'),
            );
            $dbb->add($data);
        }
    }

    /* 检测当前IP是否已注册 */

    private function isReg() {
        $userip = M('User')->where(array('loginip' => get_client_ip()))->getField('loginip');
        if ($userip == get_client_ip()) {
            $this->error('请不要重复注册账号!');
        }
    }

}

?>