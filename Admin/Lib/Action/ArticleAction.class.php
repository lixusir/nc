<?php
// 后台文章控制器
class ArticleAction extends CommonAction {
	//后台文章列表视图
    public function index(){
    	
    	$article = M('article');
        $where['classid'] = array('not in','1');

        import("ORG.Util.Page");

        $count = $article->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        
        $list = $article->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        
        $this->assign('list',$list);
        $this->assign('page',$show);
	    
	    $this->display();
    }

    //后台添加文章视图
    public function addarticle(){
    	
    	$db = M('articleclass');
    	
    	$list = $db->select();

    	$this->assign('list',$list);
        
        $this->display();
    }

    //后台文章添加方法
    public function add(){
    	$data['title'] = I('title');
    	$data['author'] = I('author');
    	$data['browsenum'] = I('browsenum');
    	$data['content'] = I('content');
    	$data['classid'] = I('classid');
    	$data['releasetime'] = time();
    	$data['modifiedtime'] = time();

        if (M('article')->add($data)) { 
    		$this->success('文章发布成功！', U('Article/index'));
    	}else{ 
    		$this->error('文章发布失败，请重新添加', U('Article/addarticle'));
    	}
    }

    //后台文章删除方法
    public function del(){
    	
    	$id = I('id');
        $where['id']  = array('in',$id);
        $article = M("article");

        if($article->where($where)->delete()) { 
        	$this->success('删除成功！', U('Article/index'));
        }else{ 
        	$this->error('删除失败，请重试！', U('Article/index'));
        }
    }
    
    //后台文章修改视图
    public function savearticle(){
    	
    	//获取文章分类
    	$db = M('articleclass');
    	
    	$list = $db->select();

    	$this->assign('list',$list);

    	//获取原文章信息
    	$id = I('id');

        $article = M("article");
    	
    	$wz = $article->where('id='.$id)->find();
    	
    	$this->assign('wz',$wz);

    	$this->display();
    }

    //后台文章修改方法
    public function save(){
    	
    	//更新文章信息
    	$data['id'] = I('id');
    	$data['title'] = I('title');
    	$data['author'] = I('author');
    	$data['browsenum'] = I('browsenum');
    	$data['content'] = I('content');
    	$data['classid'] = I('classid');
    	$data['modifiedtime'] = time();

    	$article = M("article");

    	if($article->save($data)){ 
            $this->success('修改成功！', U('Article/index'));
    	}else{ 
            $this->error('修改失败，请重试！', U('Article/index'));
    	}
    }

    //后台文章分类视图
    public function aclass(){
    	$wzlb = M("articleclass");

    	import("ORG.Util.Page");

        $count = $wzlb->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        
        $list = $wzlb->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        
        $this->assign('list',$list);
        $this->assign('page',$show);
    	
    	$this->display();
    }

    //后台公告管理分类文章列表
    public function notice(){ 
    	$article = M("article");

        import("ORG.Util.Page");

        $count = $article->where('classid=1')->count();
        $Page = new Page($count,10);
        $show = $Page->show();

    	$notice = $article->where('classid=1')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	
    	$this->assign('notice',$notice);
    	$this->assign('page',$show);
    	$this->display();
    }
    
    //添加文章分类视图
    public function jclass(){ 
        $this->display();
    }

    //添加文章分类
    public function addclass(){ 
        $class = M("articleclass");

        $data['classname'] = I('classname');

        if($class->add($data)){ 
        	$this->success('添加成功！', U('Article/aclass'));
        }else{ 
            $this->error('添加失败，请重试！', U('Article/aclass'));
        }
    }

    //修改分类视图
    public function sclass(){
        $id = I('id');
        $class = M('Articleclass')->where('id='.$id)->getField('classname');
        $this->assign('class',$class);
        $this->display();
    }

    //修改分类名称
    public function saveclass(){
        $class = M('Articleclass');
        $class->create();
        if($class->save()){
            $this->success('修改成功！', U('Article/aclass'));
        }else{
            $this->error('修改失败，请重试!');
        }
    }
    
    //删除文章分类
    public function delclass(){ 
        $id = I('id');

        $class = M("articleclass");

        if($class->where('id='.$id)->delete()) { 
        	$this->success('删除成功！', U('Article/aclass'));
        }else{ 
        	$this->error('删除失败，请重试！', U('Article/aclass'));
        }
    }
}
?>