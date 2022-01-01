<?php
class PayAction extends CommonAction {
	//后台用户提现列表视图
    public function index(){
    	$pay = M('trade');
        $where['zt'] = '未支付';

        import("ORG.Util.Page");

        $count = $pay->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        
        $list = $pay->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);

    	$this->display();
    }
	
	public function kami_cfg()
    {
        $no = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        //检测是否存在
        $db = M('kami');
		$info2=$db->where()->count();
		$info3=$db->where('zt=0')->select();
		$info4=$db->where('zt=1')->select();
        $info = $db->where(array('code'=>$no))->find();
		if($_GET['act']==1){
        if(empty($info)){
			$data['code']=$no;
			$data['money']=I('money');
			$data['add_time']=date('y-m-d h:i:s');
			$data['zt']=0;
			$data['user_time']=date('y-m-d h:i:s');
			if($db->add($data)){
				$this->success("生成成功$count",$_SERVER['HTTP_REFERER']);
			}else{$this->success('生成失败',$_SERVER['HTTP_REFERER']);}
		}
		}
		if($_GET['act']==2){//删除一条
            $where2['id']=$_GET['id'];			
			if($db->where($where2)->delete()){
				$this->success("删除成功",$_SERVER['HTTP_REFERER']);
			}else{$this->success('删除失败');}
		
		}
		if($_GET['act']==3){//删除所有            			
			if($db->where('id>0')->delete()){
				$this->success("删除所有卡密成功",$_SERVER['HTTP_REFERER']);
			}else{$this->success('删除所有卡密失败',$_SERVER['HTTP_REFERER']);}
		
		}
			
         $this->assign('info3',$info3); 
		 $this->assign('info4',$info4); 
         $this->display();		 
    }

    //后台确定支付操作方法
    public function yespay(){ 
    	$id = I('id');
        
        $map['id']  = array('in',$id);
        
        $pay = M('tixian');

        if($pay-> where($map)->setField('zt','1')){ 
            $this->success('支付成功！', U('Pay/index'));
    	}else{ 
            $this->error('支付失败，请重试！', U('Pay/index'));
    	}
    }

    //后台用户提现已支付列表视图
    public function wei(){
    	$pay = M('trade');
        $where['zt'] = 0;

        import("ORG.Util.Page");

        $count = $pay->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        
        $list = $pay->where($where)->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);

    	$this->display();
    }
	public function jyz(){
    	$pay = M('trade');
        $where['zt'] = 1;

        import("ORG.Util.Page");

        $count = $pay->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        
        $list = $pay->where($where)->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);

    	$this->display();
    }
	public function jy(){
    	$pay = M('trade');
        $where['zt'] = 2;

        import("ORG.Util.Page");

        $count = $pay->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        
        $list = $pay->where($where)->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);

    	$this->display();
    }
    
    //后台支付统计视图
    public function count(){
    	//获取当前时间
    	$time = time();
        $this->assign('time',$time);
        
        //实例化
        $pay = M("tixian");

        //统计已支付提现数量
        $payScore = $pay->where('zt=1')->Count('id');
        $this->assign('payScore',$payScore);

        //统计已支付金额
        $paymoney = $pay->where('zt=1')->Sum("money");
        $this->assign('paymoney',$paymoney);

        //统计未支付提现数量
        $nopay = $pay->where('zt=0')->Count('id');
        $this->assign('nopay',$nopay);

        //统计未支付金额
        $nomoney = $pay->where('zt=0')->Sum("money");
        $this->assign('nomoney',$nomoney);


    	$this->display();
    }


    //退回提现申请
    public function refund(){
        $id = I('post.id');
        $userid = I('post.userid');
        $money = I('post.money');
        $note = I('post.note');

        if(empty($id) || empty($userid) || empty($money) || empty($note)){
            $this->error('缺少参数！');
            exit();
        }

        $db = M('tixian');
        $data['id'] = $id;
        $data['zt'] = 2;
        $data['note'] = $note;
        if($back = $db->save($data)){
            M('User')->where('id='.$userid)->setInc('score',$money*C('EXC_RATIO'));
            $this->success('已退回提现申请！',U('Pay/index'));
        }else{
            $this->error('退回提现失败，请重试！');
        }
    }

    //退回列表视图
    public function settle(){
            $pay = M('tixian');
            $where['zt'] = 2;

            import("ORG.Util.Page");

            $count = $pay->where($where)->count();
            $Page = new Page($count,10);
            $show = $Page->show();
            
            $list = $pay->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

            $this->assign('list',$list);
            $this->assign('page',$show);

            $this->display();
    }

}
?>