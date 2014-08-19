<?php
//连接数据库 进行 数据读取
//把数据库查询返回的对象，转换成json格式，在返回给客户端

$inAjax = $_GET['inAjax'];
$do = $_GET['doNow'];
$do = $do ? $do : "default";

if (!$inAjax) {
    return false;
}

//
include_once "db.class.php";



switch ($do) {
    case 'checkMember':
    echo time();
        break;
    
    case 'default':
        die("nothing");
        break;
}

?>