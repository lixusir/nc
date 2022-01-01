<?php
//矿场大厅动态 
class DatingAction extends Action {
	
	
	//大厅动态 
    public function index(){
        $db = M('Kuanglist');        
        $field = array('userid','record','tiek','jink','time');
        import('ORG.Util.Page');
        $count = $db->where($where)->count();
        $Page = new Page($count,10);
        $show = $Page->show();

        $task = $db->order('time desc')->select();

        $this->assign('task',$task);
        $this->assign('page',$show);
		
			$this->display();
		
        //$this->display();
    }
	
	
	
	
	
}
?>