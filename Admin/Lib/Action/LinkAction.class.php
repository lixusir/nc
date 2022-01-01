<?php
// 友情链接控制器
class LinkAction extends CommonAction {
	//后台友情链接列表视图
    public function index(){
        $link = M('link'); 

        import("ORG.Util.Page");

        $count = $link->count();
        $Page = new Page($count,30);
        $show = $Page->show();

        $list = $link->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);

	    $this->display();
    }
    
    //后台友情链接修改页面视图
    public function savelink(){
    	$id = I('id');

        $link = M("link");
    	
    	$lj = $link->where('id='.$id)->find();
    	
    	$this->assign('lj',$lj);
    	
    	$this->display();
    }

    //后台友情链接修改方法
    public function save(){
    	$link = M("link");
    	
    	$data['id'] = I('id');
    	$data['linkname'] = I('linkname');
    	$data['linkurl'] = I('linkurl');
    	
    	if($link->save($data)){ 
            $this->success('修改成功！', U('Link/index'));
    	}else{ 
            $this->error('修改失败，请重试！', U('Link/index'));
    	}
    } 
    
    //后台友情链接删除方法
    public function del(){
    	$id = I('id');

        $link = M("link");

        if($link->where('id='.$id)->delete()) { 
        	$this->success('删除成功！', U('Link/index'));
        }else{ 
        	$this->error('删除失败，请重试！', U('Link/index'));
        }
    }
    
    //后台友情链接添加方法
    public function add(){
    	$data['linkname'] = $_POST['linkname'];
    	$data['linkurl'] = $_POST['linkurl'];

    	if (M('link')->add($data)) { 
    		$this->success('添加成功！', U('Link/index'));
    	}else{ 
    		$this->error('添加失败，请重新添加', U('Link/add'));
    	}
    }
}
?>