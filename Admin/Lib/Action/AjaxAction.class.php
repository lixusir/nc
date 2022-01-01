<?php
//后台广告体验控制器
class AjaxAction extends CommonAction { 
    
    //任务列表视图
	public function runsys(){ 
        $db = M('sys');
		$where['id']=1;
        $info = $db->where($where)->select();
        $data['sys_name']=I('sys_name');
		$data['sys_sms_account']=I('sys_sms_account');
		$data['sys_sms_pass']=I('sys_sms_pass');
		$data['sys_title']=I('sys_title');
		$data['sys_key']=I('sys_key');
		$data['sys_des']=I('sys_des');
		$data['sys_url']=I('sys_url');
		$data['kind_text']=I('kind_text');
		if($db->where($where)->save($data)){
		$arr['status']=1;
        $arr['info']='保存成功';		
		}else{
		$arr['status']=0;
        $arr['info']='保存失败';	
		}        
        $this->ajaxreturn($arr,'JSON');
		$this->display();
	}
    public function admin_list_runedit(){ 
        $db = M('admin');
		$where['id']=1;        
        $data['username']=I('admin_username');
		$data['password']=I('admin_pwd');		
		if($db->where($where)->save($data)){
		$arr['status']=1;
        $arr['info']='保存成功';
        $arr['url']='admin.php';		
		}else{
		$arr['status']=0;
        $arr['info']='保存失败';	
		}        
        $this->ajaxreturn($arr,'JSON');
		$this->display();
	}

    //开启关闭任务方法
    public function offno(){
        $id = I('get.id');
        $sid = I('get.sid');
        $db = M('Tasklist');
        if(!$sid){
            $db->where('id='.$id)->setField('taskstate','1');
            $this->success('关闭成功！');
        }else{
            $db->where('id='.$id)->setField('taskstate','0');
            $this->success('开启成功！');
        }
    }

    //体验数据视图
    public function record(){
        $id = I('GET.id');
        $db = M('task_log');
        $where = array('auditstate' => $id);
        $field = array('taskid');

        import("ORG.Util.Page");
        $count = $db->where($where)->count();
        $Page = new Page($count,20);
        $show = $Page->show();

        $record = $db->where($where)->field($field,true)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('record',$record);
        $this->assign('page',$show);
        $this->display();
    }

    //审核通过处理
    public function yes(){
        $id = I('id');
        $data = array('auditstate'=>'1','audittime'=>time());
        if(M('Task_log')->where(array('id'=>$id))->setField($data)){
            $this->success('已通过!');
        }else{
            $this->error('审核失败!');
        }
    }
    
    //审核失败处理
    public function no(){
        $id = I('id');
        $data = array('auditstate'=>'2','audittime'=>time());
        if(M('Task_log')->where(array('id'=>$id))->setField($data)){
            $this->success('已失败!');
        }else{
            $this->error('审核失败!');
        }
    }

    //重新审核处理
    public function review(){
        $id = I('id');
        $data = array('auditstate'=>'0','audittime'=>time());
        if(M('Task_log')->where(array('id'=>$id))->setField($data)){
            $this->success('重审成功!');
        }else{
            $this->error('重审失败!');
        }
    }

    //删除审核订单
    public function del(){
        $id = I('id');
        if(M('Task_log')->where(array('id'=>$id))->delete()){
            $this->success('删除成功!');
        }else{
            $this->error('删除失败!');
        }
    }

    //任务分类视图
    public function points(){
        $db = M('Taskclass');
        $class = $db->select(); 
        $this->assign('class',$class);
        $this->display();
    }

    //添加分类方法
    public function addclass(){
        $db = M('Taskclass');
        $db->create();
        if($db->add()){
            $this->success('添加成功！', U('Adverts/points'));
        }else{
            $this->error('添加失败，请重新添加', U('Adverts/aclss'));
        }
    }
    
    //修改分类方法
    public function sclass(){
        $id = I('get.id');
        $name = M('Taskclass')->where('id='.$id)->getField('classname');
        $this->assign('name',$name);
        $this->display();
    }

    //修改分类方法
    public function saveclass(){
        $name = M('Taskclass');
        $name->create();
        if($name->save()){
            $this->success('修改成功！', U('Adverts/points'));
        }else{
            $this->error('修改失败，请重试!');
        }
    }

    //删除分类方法
    public function delclass(){
        $id = I('get.id');
        $name = M('Taskclass');

        if($name->where('id='.$id)->delete()) { 
            $this->success('删除成功！', U('Adverts/points'));
        }else{ 
            $this->error('删除失败，请重试！');
        }
    }

    //排行榜视图
    public function ranking(){
        $this->display();
    }
    
    //添加任务页面视图
    public function task(){
        $db = M('Taskclass');
        $class = $db->select();
        $this->assign('class',$class);
        $this->display();
    }

    //添加任务表单处理
    public function addtask(){
        if (!$_POST) halt('页面不存在');//判断是否POST提交

        //上传任务图片
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $upload->maxSize  = 3145728 ;
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
        $upload->savePath =  './Public/Uploads/';
        
        if(!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        }else{
            $info =  $upload->getUploadFileInfo();
        }
        
        $data = array(
            'taskname' => I('POST.taskname'),//任务名称
            'taskstate' => I('POST.taskstate'),//任务状态
            'auditway' => I('POST.auditway'),//审核方式
            'taskclass' => I('POST.taskclass'),//任务分类
            'taskmain' => I('POST.taskmain'),//任务区分
            'tasknum' => I('POST.tasknum'),//任务数量
            'taskasnum' => I('POST.taskasnum'),//可做次数
            'taskreward' => I('POST.taskreward'),//任务奖励
            'tasklink' => I('POST.tasklink'),//任务链接
            'prompt' => I('POST.prompt'),//任务提示
            'taskdemand' => I('post.taskdemand'),//任务要求
            'tasktime' => I('POST.tasktime','','strtotime'),//到期时间
            'taskimg' => $info[0]['savename']//任务图片
            );

        $db = M('Tasklist');

        if ($db->add($data)) { 
            $this->success('添加成功！', U('Adverts/index'));
        }else{ 
            $this->error('添加失败，请重新添加', U('Adverts/task'));
        }
    }
    
    //修改任务页面视图
    public function saveview(){
        $id = I('get.id');
        $db = M('Tasklist');
        $task = $db->where('id='.$id)->find();
        $db = M('Taskclass');
        $class = $db->select(); 
        
        $this->assign('class',$class);
        $this->assign('task',$task);
        $this->display();
    }

    //修改任务表单处理
    public function savetask(){
        $data = array(
            'id' => I('POST.id'),//任务id
            'taskname' => I('POST.taskname'),//任务名称
            'taskstate' => I('POST.taskstate'),//任务状态
            'auditway' => I('POST.auditway'),//审核方式
            'taskclass' => I('POST.taskclass'),//任务分类
            'taskmain' => I('POST.taskmain'),//任务区分
            'tasknum' => I('POST.tasknum'),//任务数量
            'taskasnum' => I('POST.taskasnum'),//可做次数
            'taskreward' => I('POST.taskreward'),//任务奖励
            'tasklink' => I('POST.tasklink'),//任务链接
            'prompt' => I('POST.prompt'),//任务提示
            'taskdemand' => I('post.taskdemand'),//任务要求
            'tasktime' => I('POST.tasktime','','strtotime'),//到期时间
            'taskimg' => I('POST.taskimg')//任务图片
            );
        
        if (M('Tasklist')->save($data)) { 
            $this->success('修改成功！', U('Adverts/index'));
        }else{ 
            $this->error('修改失败，请重试');
        }
    }
}
?>