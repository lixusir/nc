<?php

//后台模板设置控制器
class TplAction extends CommonAction { 
    
    //显示导航列表
    public function index(){ 
        $nav = M('nav');
        $dh = $nav->order('navrand')->select();
        $List = M('Slides')->order('id DESC')->select();
        $this->assign('dh',$dh);
        $this->assign('List',$List);
        $this->display();
    }
    
    //添加导航页面商图
    public function addnav(){ 
        $this->display();
    }
    
    //添加导航方法
    public function add(){ 
        $data = array( 
        	'navrand' => I('navrand'),
        	'navname' => I('navname'),
        	'navurl' => I('navurl')
        );
        if (M('nav')->add($data)) { 
        	$this->success('添加成功！', U('Tpl/index'));
        }else{ 
        	$this->error('添加失败，请重新添加', U('Tpl/addnav'));
        }
    }

    //修改导航页面商图
    public function savenav(){ 
        $id = I('id');
        $nav = M('nav');
        $dh = $nav->where('id='.$id)->find();
        $this->assign('dh',$dh);
        $this->display();
    }
    
    //修改导航方法
    public function save(){ 
        $nav = M("nav");
        $data = array(
        	'id' => I('id'),
        	'navrand' => I('navrand'),
        	'navname' => I('navname'),
        	'navurl' => I('navurl')
        );
        if($nav->save($data)){ 
            $this->success('修改成功！', U('Tpl/index'));
        }else{ 
            $this->error('修改失败，请重试！', U('Tpl/index'));
        }
    }

    //删除导航方法
    public function del(){ 
        $id = I('id');
        $nav = M("nav");
        if($nav->where('id='.$id)->delete()) { 
        	$this->success('删除成功！', U('Tpl/index'));
        }else{ 
        	$this->error('删除失败，请重试！', U('Tpl/index'));
        }
    }

    /*添加或修改轮播图*/
    public function addupimg(){
        if(IS_POST){
            if(!I('post.id')){
                import('ORG.Net.UploadFile');
                $upload = new UploadFile();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath =  './Public/Uploads/';// 设置附件上传目录
                if(!$upload->upload()) {// 上传错误提示错误信息
                    $this->error($upload->getErrorMsg());
                }else{// 上传成功 获取上传文件信息
                    $info =  $upload->getUploadFileInfo();
                    $imgsrc = $info[0]['savename'];
                }
                $data['img_name'] = I('post.img_name');
                $data['jump_link'] = I('post.jump_link');
                $data['img_src'] = $imgsrc;
                if(M('Slides')->add($data)){
                    $this->success('添加成功！',U('Tpl/index'));
                }else{
                    $this->error('添加失败，请重新添加！');
                }
            }else{
                $data['id'] = I('post.id');
                $data['img_name'] = I('post.img_name');
                $data['jump_link'] = I('post.jump_link');
                $data['img_src'] = I('post.img_src');
                if(M('Slides')->save($data)){
                    $this->success('修改成功！',U('Tpl/index'));
                }else{
                    $this->error('修改失败，请重试！');
                }
            }
        }else{
            $this->display('slide');
        }
    }

    /*此图信息*/
    public function slide(){
        $id = I('get.id');
        $info = M('Slides')->where('id='.$id)->find();
        $this->assign('info',$info);
        $this->display();
    }

    /*删除轮播图*/
    public function delimg(){
        if(M('Slides')->delete(I('get.id'))){
            $this->success('删除成功！',U('Tpl/index'));
        }else{
            $this->error('删除失败，请重试！');
        }
    }

}
?>