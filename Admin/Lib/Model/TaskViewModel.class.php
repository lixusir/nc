<?php
//任务列表视图模型
class TaskViewModel extends ViewModel {
    protected $viewFields = array(
        'Tasklist' => array(
            'id','taskname','taskreward','tasknum','taskstate','tasktime','auditway','taskasnum','taskmain',
            '_type' => 'LEFT'
            ),
        'Taskclass' => array(
            'classname','_on' => 'tasklist.taskclass = taskclass.id'
            )
        );
}
?>