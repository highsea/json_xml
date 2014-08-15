<?php

/**
*demo1  使用函数
*/
/*$curl = curl_init('http://www.baidu.com');
curl_exec($curl);
curl_close($curl);*/


/**
*demo2   爬取首页
*/
/*$curl = curl_init();//初始化
curl_setopt($curl, CURLOPT_URL, 'http://highsea90.com');//设置url
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//执行后不直接打印
$output = curl_exec($curl);//存储执行结果
curl_close($curl);//关闭
echo str_replace('首页', 'highsea', $output);*/

/**
*demo3  weather
*/
$data = 'theCityName=杭州';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);//post请求 1
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//post参数 2
curl_setopt($ch, CURLOPT_HTTPHEADER, array('appliction/x-www-form-urlencode;charset=utf-8',
    'Content-length: '.strlen($data)
    ));//post参数 3
$rtn = curl_exec($ch);
if (!curl_errno($ch)) {
    // $info = curl_getinfo($ch);
    //print_r($info);
    echo $rtn;
} else {
    echo 'Curl error: ' . curl_error($ch);
}
curl_close($ch);
?>