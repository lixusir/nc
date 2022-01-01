<?php

//接口回调记录控制器
class ApilogAction extends CommonAction { 
    
    //接口回调记录列表
    public function index(){ 
        $db = M('Api_log');

        import("ORG.Util.Page");
        $count = $db->count();
        $Page = new Page($count,20);
        $show = $Page->show();

        $api = $db->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();

        $this->assign('api',$api);
        $this->assign('page',$show);
        $this->display();
    }

    //批量删除记录
    public function del(){
        $id = I('post.id');
        $db = M('Api_log');
        $where['id']  = array('in',$id);
        if($db->where($where)->delete()) { 
            $this->success('删除成功！', U('Apilog/index'));
        }else{ 
            $this->error('删除失败，请重试！');
        }
    }
}
?>