<?php
/*返利控制器*/
class RebateAction extends CommonAction{
    //返利墙视图
    public function index(){
        $this->display();
    }

    //返利墙接口
    public function Api(){
        //获取get数据
        $pid = I('get.pid'); //网站主ID
        $uid = I('get.uid'); //会员ID
        $tid = I('get.tid'); //订单号 唯一
        $money = I('get.money'); //奖励货币数量
        $sign = I('get.sign'); //验证信息
        $name = I('get.name'); //商品名称

        //回调记录存储到数据库
        $data = array(
            //提交来源信息
            'feedback' => '会员ID：'.$uid.'，奖励：'.$money.C('MONEY_NAME').'，订单号：'.$tid.'，淘宝返利数据开始回调！',
            //回调URL
            'source' => __SELF__
            );
        M('Api_log')->add($data);

        //合作用户填写
        $key = 'xxxxxx'; //安全密钥
        $spid = 1; //网站主合作id

        //判断是否缺少参数
        if(empty($pid) || empty($uid) || strlen($tid) != 32 || empty($money) || strlen($sign) != 32){
            echo '{"status":"failure","errno":"1001"}';
            exit();
        }

        //验证信息
        $pass = md5($uid.$money.$tid.$key);

        //判断pid和sign是否一致
        if($pid != $spid || $sign != $pass){
            echo '{"status":"failure","errno":"1002"}';
            exit();
        }

        //查询用户是否存在
        $User = M('User');
        $user = $User->where(array('id'=>$uid))->field('username,online')->find();

        //判断会员是否存在
        if(!$user){
            echo '{"status":"failure","errno":"1005"}';
            exit();
        }

        //判断订单是否已存在
        $order = M('Rebate_api');
        if($order->where(array('tid'=>$tid))->find()){
            echo '{"status":"failure","errno":"1003"}';
            exit();
        }

        //添加新订单
        $fan['pid'] = $pid;
        $fan['uid'] = $uid;
        $fan['jine'] = $money;
        $fan['tid'] = $tid;
        $fan['sign'] = $sign;
        $fan['time'] = time();

        //添加订单失败
        if(!$order->add($fan)){
            echo '{"status":"failure","errno":"1006"}';
            exit();
        }

        //发放会员奖励
        if($User->where(array('id'=>$uid))->setInc('score',$money)){
            //添加收入明细
            $info['userid'] = $uid;
            $info['username'] = $user['username'];
            $info['record'] = '[淘宝返利]'.$name;
            $info['score'] = $money;
            $info['time'] = time();
            if(M('User_log')->add($info)){
                echo '{"status":"success"}';
            }
        }

        //发放上线奖励
        if($user['online']){
            //上线用户名
            $oname = $User->where(array('id'=>$user['online']))->getField('username');
            //奖励上线的积分
            $oscore = $money * C('REBATE_TAKE') / 100;
            //发放上线奖励
            if($User->where(array('id'=>$user['online']))->setInc('score',$oscore)){
                //添加上线收入明细
                $deta['userid'] = $user['online'];
                $deta['username'] = $oname;
                $deta['record'] = '邀请好友 '.$user['username'].' 体验淘宝返利';
                $deta['score'] = $oscore;
                $deta['time'] = time();
                M('User_log')->add($deta);
            }
        }
    }
}
?>