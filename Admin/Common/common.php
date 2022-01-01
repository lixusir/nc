<?php
/*
    作用：格式化输出打印
    使用：P($data);
 */
function p ($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

/*
    作用：生成指定位数的随机字符串
    使用：echo randpw(20);
 */
function randpw($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>


