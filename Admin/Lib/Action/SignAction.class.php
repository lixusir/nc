<?php
/*后台签到控制器*/
class SignAction extends CommonAction{
    //签到记录列表
    public function index() {
        $db = M('Sign');
        
        if($key = I('key')){
            $where['uid'] = $key;
            $where['username'] = $key;
            $where['_logic'] = 'OR';
        }

        import("ORG.Util.Page");

        $count = $db->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();

        $Sign = $db->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

       // p($Sign);die;
        $this->assign('Sign',$Sign);
        $this->assign('page',$show);
        $this->display();
    }

    //删除签到记录
    public function delete() {
        $id = I('id');
        $where['id']  = array('in',$id);
        if(M('Sign')->where($where)->delete()){
            $this->success('删除成功！',U('Sign/index'));
        }else{
            $this->error('删除失败，请重试！');
        }
    }
}
?>