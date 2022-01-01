<?php
//签到控制器
class SignAction extends CommonAction {
    //签到处理
    public function qiandao(){
        //获取参数
        $uid = I('post.uid');
        $username = I('post.username');
        $score = M('User')->where('id='.$uid)->getField('score');

        //判断是否缺少参数
        if(empty($uid) || empty($username) || empty($score)){
            $this->ajaxReturn('',"参数错误！",0);
        }

        //判断该会员今天是否已经签到
        $db = M('Sign_record');
        $Today = mktime(0,0,0,date('m'),date('d'),date('Y'));//今日0:0:0时间戳
        $map['uid'] = $uid;
        $map['time'] = array('gt',$Today);
        $Sign = $db->where($map)->getField('id');
        if($Sign){
            $this->ajaxReturn('','您今日已签到，请明天再来！',0);
            exit();
        }

        //根据金币数量判断签到奖励比例
        if($score < C('SIGN_LEVEL_1')){
            $ratio = $score * C('SIGN_RATIO_1');
        }elseif ($score < C('SIGN_LEVEL_2')) {
            $ratio = $score * C('SIGN_RATIO_2');
        }elseif ($score < C('SIGN_LEVEL_3')) {
            $ratio = $score * C('SIGN_RATIO_3');
        }elseif ($score < C('SIGN_LEVEL_4')) {
            $ratio = $score * C('SIGN_RATIO_4');
        }elseif ($score < C('SIGN_LEVEL_5')) {
            $ratio = $score * C('SIGN_RATIO_5');
        }else{
            $ratio = $score * C('SIGN_RATIO_6');
        }

        $ratio = floor($ratio);

        //没有签到，开始签到
        $data['uid'] = $uid;
        $data['username'] = $username;
        $data['reward'] = $ratio;
        $data['note'] = '成功签到获得奖励'.$ratio.C('MONEY_NAME');
        $data['time'] = time();

        if($db->data($data)->add()){
            M('User')->where('id='.$uid)->setInc('score',$ratio);
            $this->ajaxReturn('','签到成功，获得奖励'.$ratio.C('MONEY_NAME'),1);
        }else{
            $this->ajaxReturn('','签到失败,请重试！',0);
        }
    }

    //我的签到记录
    public function record() {
        $uid = session('uid');
        $where = array('uid'=>$uid);
        $db = M('Sign_record');

        import('ORG.Util.Page');
        $count = $db->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();

        $sign = $db->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('sign',$sign);
        $this->assign('page',$show);
        $this->display();
    }

    //签到排名
    public function ranking() {
        $db = M('Sign');
        $field = array('uid','username','sum(reward)'=>'reward');
        $sign = $db->field($field)->limit(10)->group('uid')->order('sum(reward) desc')->select();
        $this->assign('sign',$sign);
        $this->display();
    }
}
?>