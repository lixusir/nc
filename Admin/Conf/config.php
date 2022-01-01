<?php
$config = array(
    // 更改默认的/Public 替换规则
    'TMPL_PARSE_STRING'  =>array(
         '__PUBLIC__' => '/Public/Admin',
    ),

    //默认过滤函数
    'DEFAULT_FILTER' => 'htmlspecialchars',
    
    //取消后台伪静态
    'URL_HTML_SUFFIX' => '',
    
    /*默认错误跳转模板*/
    'TMPL_ACTION_ERROR' => 'Common:jump',
    /*默认成功跳转模板*/
    'TMPL_ACTION_SUCCESS' => 'Common:jump',
);
return array_merge(include './Conf/config.php', $config);
?>