<?php
/**
* 登录慕课网
*下载个人空间
*/

$data = 'username=wdssgaohai@qq.com&password=654321&remember=1';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.imooc.com/user/login');
curl_setopt($ch, CURLOPT_RETURNTARNSFER, true);//执行后不打印

//cookies 设置，需要在所有会话开始前设置
date_default_timezone_set('PRC');//使用cookies之前需先设置时区
curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);//服务器会话信息
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookiefile');//存储
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookiefile');//读取
curl_setopt($ch, CURLOPT_COOKIE, session_name() . '=' . session_id());//存入的内容
curl_setopt($ch, CURLOPT_HEADER, 0);//不打印头部信息
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);//让curl支持页面连接跳转
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//登录拼接url信息
curl_setopt($ch, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencode;charset=utf-8",
    "Content-length: ".strlen($data)
    ));
curl_exec($ch);//执行登录操作
curl_setopt($ch, CURLOPT_URL, 'http://www.imooc.com/space/index');//打开个人空间
curl_setopt($ch, CURLOPT_POST, 0);//下载某个网页 post 为0
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: text/xml"
    ));
$output = curl_exec($ch);
curl_close($ch);
echo $output;

?>