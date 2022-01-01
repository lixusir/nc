<?php
// 时间戳
date_default_timezone_set("Asia/Shanghai");
/**
 * 创建url
 *
 * @param funAndOperate
 *            请求的功能和操作
 * @return
 */
function createUrl($funAndOperate)
{
    // 时间戳
    date_default_timezone_set("Asia/Shanghai");
    $timestamp = date("YmdHis");

    return "https://api.miaodiyun.com/20150822/" . $funAndOperate;
}

function createSig()
{
    $timestamp = date("YmdHis");
    // 签名
    //$sig = md5("ceff306bcc3745e4ae5926351c62a1ec" . "4f4647c6152b4338a12bdf13aa8ba54f" . $timestamp);
	$sig = md5("eb6e3aabf3d04db6a8a0097899cd6746" . "96017f89c8204ffcbd0f5710546758ac" . $timestamp);
    return $sig;
}

function createBasicAuthData()
{
    $timestamp = date("YmdHis");
    // 签名
    //$sig = md5("ceff306bcc3745e4ae5926351c62a1ec" . "4f4647c6152b4338a12bdf13aa8ba54f" . $timestamp);
	$sig = md5("eb6e3aabf3d04db6a8a0097899cd6746" . "96017f89c8204ffcbd0f5710546758ac" . $timestamp);
    //return array("accountSid" => "ceff306bcc3745e4ae5926351c62a1ec", "timestamp" => $timestamp, "sig" => $sig, "respDataType"=> "JSON");
	return array("accountSid" => "eb6e3aabf3d04db6a8a0097899cd6746", "timestamp" => $timestamp, "sig" => $sig, "respDataType"=> "JSON");
}

/**
 * 创建请求头
 * @param body
 * @return
 */
function createHeaders()
{
    $headers = array('Content-type: ' ."application/x-www-form-urlencoded", 'Accept: ' . "application/json");
    return $headers;
}

/**
 * post请求
 *
 * @param funAndOperate
 *            功能和操作
 * @param body
 *            要post的数据
 * @return
 * @throws IOException
 */
function post($funAndOperate, $body)
{
    // 构造请求数据
    $url = createUrl($funAndOperate);
    $headers = createHeaders();

    // 要求post请求的消息体为&拼接的字符串，所以做下面转换
    $fields_string = "";
    foreach ($body as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    // 提交请求
    $con = curl_init();
    curl_setopt($con, CURLOPT_URL, $url);
    curl_setopt($con, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($con, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($con, CURLOPT_HEADER, 0);
    curl_setopt($con, CURLOPT_POST, 1);
    curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($con, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($con, CURLOPT_POSTFIELDS, $fields_string);
    $result = curl_exec($con);
    curl_close($con);

    return $result;
}
