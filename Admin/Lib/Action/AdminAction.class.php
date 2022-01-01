<?php
// 管理员控制器
class AdminAction extends CommonAction {
	//后台管理员列表视图
    public function index(){
    	$admin = M('admin');

        import("ORG.Util.Page");

        $count = $admin->count();
        $Page = new Page($count,30);
        $show = $Page->show();
        
        $list = $admin->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        
        $this->assign('list',$list);
        $this->assign('page',$show);
	    
	    $this->display();
    }
    
    //添加管理员方法
    public function add(){
        $data['username'] = I('username');
    	$data['password'] = I('password');
    	$data['loginip'] = get_client_ip();
    	$data['logintime'] = time();

    	if (M('admin')->add($data)) { 
    		$this->success('添加成功！', U('Admin/index'));
    	}else{ 
    		$this->error('添加失败，请重新添加', U('Admin/add'));
    	}
    }
    
    //删除管理员方法
    public function del(){
        $id = I('id');
        $admin = M("admin");
        if($admin->where('id='.$id)->delete()){ 
        	$this->success('删除成功！', U('Admin/index'));
        }else{ 
        	$this->error('删除失败，请重试！', U('Admin/index'));
        }
    }
    
    //显示修改管理员视图
    public function saveadmin(){ 
        $id = I('id');
        $admin = M("admin");
    	$gly = $admin->where('id='.$id)->find();
    	$this->assign('gly',$gly);
    	$this->display();
    }

    //修改管理员方法
    public function save(){
    	$data['id'] = I('id');
    	$data['username'] = I('username');
    	$data['password'] = I('password','','md5');
    	$admin = M("admin");
    	if($admin->save($data)){ 
    		$this->success('修改成功！', U('Admin/index'));
    	}else{ 
            $this->error('修改失败，请重试！', U('Admin/index'));
    	}
    }
}
?>