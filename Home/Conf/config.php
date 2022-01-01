<?php
$config = array(
    // 更改默认的/Public 替换规则
    'TMPL_PARSE_STRING'  =>array(
         '__PUBLIC__' => '/Public/Home',
    ),
    //URL模式
    'URL_MODEL' => 0,
    //开启路由
    'URL_ROUTER_ON'   => true, 
    //定义路由规则
    'URL_ROUTE_RULES' => array( 
    'uid/:uid\d' => 'Reg/index',
),
    //异位或加密KEY值
    'AUTO_LOGIN_KEY' => md5('db54d9ece7078a9250ddcd938cc20fdd'),
    //自动登录有效时间
    'AUTO_LOGIN_LIFETIME' => time() + 3600 * 24 * 7,
    
    //注册验证码进密KEY值
    'CODE_REG_KEY' => md5('db54d9ece7078a9250ddcd938cc20fdd'),
    //注册验证码有效时间
    'CODE_REG_TIME' => time() + 3600 * 24,
    
    /*默认错误跳转模板*/
    'TMPL_ACTION_ERROR' => 'public:jump',
    /*默认成功跳转模板*/
    'TMPL_ACTION_SUCCESS' => 'public:jump',
    
);
return array_merge(include './Conf/config.php', $config);
?>