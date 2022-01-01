<?php
// 后台首页控制器
class IndexAction extends CommonAction {
	public function index(){
        //会员数量统计
        $user = M('User')->Count('id');
        $this->assign('user',$user);
		$where['id']=1;
		$info = M('config')->where(1==1)->select();        
		$versign=$user['versign'];
		
		//if($this->check_versign(1)){
			//$new=1;
		//}else{
			//$new=0;
		//}
		
		
        
        //今日注册统计
        $time = mktime(0,0,0,date('m'),date('d'),date('Y'));//获取今日开始时间戳
        $where['regtime'] = array('GT',$time);//注册时间大于今天开始时间
        $reg = M('User')->Count('id');
        $this->assign('reg',$reg);		
        
        $gold = M('Userlist')->sum(gold);//金币总数
        $this->assign('gold',$gold);
		
		$money = M('recharge')->sum(money);//充值总数
		if($money==null){$money=0;}
        $this->assign('money',$money);
        //资讯数量统计
        $article = M('Article')->Count('id');
        $this->assign('article',$article);
        
        //体验任务统计
        $task = M('Tasklist')->Count('id');
        $this->assign('task',$task);
        
        //待支付款项
        $nomoney = M("tixian")->where('zt="未支付"')->Sum("money");
        $this->assign('nomoney',$nomoney);
        
        //已支付款项
        $yesmoney = M("tixian")->where('zt="已支付"')->Sum("money");
        $this->assign('yesmoney',$yesmoney);
        
        //未提现款项
        $notmoney = M('tixian')->sum('score')/C('EXC_RATIO');
        $notmoney = sprintf("%.0f",$notmoney);
        $this->assign('notmoney',$notmoney);
		//echo $versign;exit;
		
        $this->assign('versign',$versign);
		$this->assign('new',$new);
        $this->display();
	}


    public function check_versign(){
		$where['id']=1;
		$info = M('config')->where(1==1)->select(); 
		$versign=$info['versign'];
		if($_GET['zt']==1){
			return 1;			
		}else{
			$url='http://sq.yk676.com/index.php?m=ajax&a=cx_versign&sq_domain='.$_SERVER['HTTP_HOST'].'&versign='.$versign;
	        header('Location:' .$url);exit;			
		}
	}
	

	
}
?>
    