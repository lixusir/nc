<?php

//扩展项目控制器
class ExtensionAction extends CommonAction { 
    
    //任务墙记录列表
	public function task(){ 
		$db = M('Task_api');

        import("ORG.Util.Page");
        $count = $db->count();
        $Page = new Page($count,20);
        $show = $Page->show();

        $task = $db->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
        $this->assign('task',$task);
        $this->assign('page',$show);
        $this->display();
	}

    //网页打码记录列表
    public function wydm(){
        $db = M('Code_api');

        import("ORG.Util.Page");
        $count = $db->count();
        $Page = new Page($count,20);
        $show = $Page->show();

        $code = $db->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
        $this->assign('code',$code);
        $this->assign('page',$show);
        $this->display();
    }

    //淘宝返利记录列表
    public function tbfl(){
        $db = M('Rebate_api');

        import("ORG.Util.Page");
        $count = $db->count();
        $Page = new Page($count,20);
        $show = $Page->show();

        $Rebate = $db->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
        $this->assign('Rebate',$Rebate);
        $this->assign('page',$show);
        $this->display();
    }

    //游戏墙游戏记录列表
    public function game(){
        $db = M('Game_api');

        import("ORG.Util.Page");
        $count = $db->count();
        $Page = new Page($count,20);
        $show = $Page->show();

        $game = $db->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
        $this->assign('game',$game);
        $this->assign('page',$show);
        $this->display();
    }
    
    //删除记录方法
    public function del(){
        $cid = I('cid');
        $id = I('id');
        $where['id']  = array('in',$id);
        
        if(empty($cid) || empty($id)){
            $this->error('ID或CID不存在！');
        }

        if($cid > 4){
            $this->error('CID不存在！');
        }

        switch ($cid) {
            case '1':
                $db = M('Task_api');
                if($db->where($where)->delete()){
                    $this->success('删除成功！', U('Extension/task'));
                }else{
                    $this->error('删除失败，请重试！');
                }
                break;
            case '2':
                $db = M('Game_api');
                if($db->where($where)->delete()){
                    $this->success('删除成功！', U('Extension/game'));
                }else{
                    $this->error('删除失败，请重试！');
                }
                break;
            case '3':
                $db = M('Rebate_api');
                if($db->where($where)->delete()){
                    $this->success('删除成功！', U('Extension/tbfl'));
                }else{
                    $this->error('删除失败，请重试！');
                }
                break;
            case '4':
                $db = M('Code_api');
                if($db->where($where)->delete()){
                    $this->success('删除成功！', U('Extension/wydm'));
                }else{
                    $this->error('删除失败，请重试！');
                }
                break;
        }
    }
}
?>