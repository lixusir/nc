<?php
//排行榜控制器
class TopAction extends CommonAction {
    public function index(){
        //获取上个月1号时间
        $firstday = mktime(0,0,0,date('m')-1,1,date('Y'));
        //获取上个月最后一天时间
        $lastday = mktime(23,59,59,date('m')-1,date('t')-1,date('Y'));
        //获取上月份
        $month = date('m')-1;
        
        //每月体验排行榜
        $A = M('Task_log');
        $where['auditstate'] = array('eq',1);
        $where['audittime'] = array(array('GT',$firstday),array('LT',$lastday));
        $tiyan = $A
        ->join(''.C(DB_PREFIX).'user ON '.C(DB_PREFIX).'user.id = '.C(DB_PREFIX).'task_log.uid')
        ->limit(10)
        ->order('sum('.C(DB_PREFIX).'task_log.score)desc')
        ->group('uid')
        ->where($where)
        ->field(array('uid','username','sum('.C(DB_PREFIX).'task_log.score)'=>'score'))
        ->select();

        $tiyans = array();
        foreach ($tiyan as $k => $v) {
            $v['reward'] = sprintf("%.0f",$v['score']/($k+1)/2);
            $v['why'] = ''.$month.'月体验排行榜第'.($k+1).'名奖励';
            $tiyans[] = $v;
        }

        $this->assign('tiyan',$tiyans);

        //每月游戏排行榜
        $B = M('Game_api');
        $where1['time'] = array(array('GT',$firstday),array('LT',$lastday));
        $game = $B
        ->join(''.C(DB_PREFIX).'user ON '.C(DB_PREFIX).'user.id = '.C(DB_PREFIX).'game_api.uid')
        ->limit(10)
        ->group('uid')
        ->where($where1)
        ->field(array('uid','username','sum(points)'=>'points'))
        ->order('sum(points)desc')
        ->select();

        $games = array();
        foreach ($game as $k => $v) {
            $v['reward'] = sprintf("%.0f",$v['points']/($k+1)/2);
            $v['why'] = ''.$month.'月游戏排行榜第'.($k+1).'名奖励';
            $games[] = $v;
        }

        $this->assign('game',$games);

        //每月任务排行榜
        $C = M('Task_api');
        $where2['time'] = array(array('GT',$firstday),array('LT',$lastday));
        $task = $C
        ->join(''.C(DB_PREFIX).'user ON '.C(DB_PREFIX).'user.id = '.C(DB_PREFIX).'task_api.uid')
        ->limit(10)
        ->group('uid')
        ->where($where2)
        ->field(array('uid','username','sum(points)'=>'points'))
        ->order('sum(points)desc')
        ->select();

        $tasks = array();
        foreach ($task as $k => $v) {
            $v['reward'] = sprintf("%.0f",$v['points']/($k+1)/2);
            $v['why'] = ''.$month.'月任务排行榜第'.($k+1).'名奖励';
            $tasks[] = $v;
        }

        $this->assign('task',$tasks);

        //每月打码排行榜
        $D = M('Code_api');
        $where3['time'] = array(array('GT',$firstday),array('LT',$lastday));
        $code = $D
        ->join(''.C(DB_PREFIX).'user ON '.C(DB_PREFIX).'user.id = '.C(DB_PREFIX).'code_api.uid')
        ->limit(10)
        ->group('uid')
        ->where($where3)
        ->field(array('uid','username','sum(jine)'=>'jine'))
        ->order('sum(jine)desc')
        ->select();

        $codes = array();
        foreach ($code as $k => $v) {
            $v['reward'] = sprintf("%.0f",$v['jine']/($k+1)/2);
            $v['why'] = ''.$month.'月打码排行榜第'.($k+1).'名奖励';
            $codes[] = $v;
        }

        $this->assign('code',$codes);

        //每月返利排行榜
        $E = M('Rebate_api');
        $where4['time'] = array(array('GT',$firstday),array('LT',$lastday));
        $rebate = $E
        ->join(''.C(DB_PREFIX).'user ON '.C(DB_PREFIX).'user.id = '.C(DB_PREFIX).'rebate_api.uid')
        ->limit(10)
        ->group('uid')
        ->where($where4)
        ->field(array('uid','username','sum(jine)'=>'jine'))
        ->order('sum(jine)desc')
        ->select();

        $rebates = array();
        foreach ($rebate as $k => $v) {
            $v['reward'] = sprintf("%.0f",$v['jine']/($k+1)/2);
            $v['why'] = ''.$month.'月返利排行榜第'.($k+1).'名奖励';
            $rebates[] = $v;
        }

        $this->assign('rebate',$rebates);

        //每月邀请排行榜
        $F = M('User_log');
        $where5['source'] = array('eq',1);
        $where5['time'] = array(array('GT',$firstday),array('LT',$lastday));
        $invi = $F
        ->limit(10)
        ->group('userid')
        ->where($where5)
        ->field(array('userid','username','sum(score)'=>'score'))
        ->order('sum(score)desc')
        ->select();

        $invis = array();
        foreach ($invi as $k => $v) {
            $v['reward'] = sprintf("%.0f",$v['score']/($k+1)/2);
            $v['why'] = ''.$month.'月邀请排行榜第'.($k+1).'名奖励';
            $invis[] = $v;
        }

        $this->assign('invi',$invis);
        $this->display();
    }
}
?>