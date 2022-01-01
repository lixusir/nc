<?php

//后台发放奖励控制器
class ScoreAction extends CommonAction { 
    
    //扩展项目首页视图
    public function index(){ 
        $this->display();
    }

    //增加奖励表单处理
    public function add(){ 
        $db = M('userlist');
        $where = array('userid' => I('uid'));
		$info=$db->where($where)->find();
        if($db->where($where)->setInc('jinkz',I('jink'))){            
            //$data['jinkz'] = I('jinkz');
            $data['tiekz'] = $info['tiekz']+I('tiek');         
            $this->success('增加奖励成功！', U('Score/index'));
        }else{
            $this->error('增加奖励失败，请重试！', U('Score/index'));
        }
    }

    //减少奖励表单处理
    public function red(){ 
        $db = M('Userlist');
        $where = array('userid' => I('uid'));
        if($db->where($where)->setDec('jinkz',I('jink'))){
			$data['tiekz'] = $info['tiekz']-I('tiek'); 
            $this->success('减少奖励成功！', U('Score/index'));
        }else{
            $this->error('增少奖励失败，请重试！');
        }
    }

}
?>