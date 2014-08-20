<?php
//连接数据库 进行 数据读取
//把数据库查询返回的对象，转换成json格式，在返回给客户端

$inAjax = $_GET['inAjax'];
$do = $_GET['doNow'];
$do = $do ? $do : "default";

if (!$inAjax) {
    return false;
}

//尝试自己写 mysql 链接类库
//include_once "db.class.php";

/**
* ezsql mysql 类库
*/
// 包含ezSQL的核心文件
include_once "ezMysql/ez_sql_core.php";
// 包含ezSQL具体的数据库文件，这里以mySQL为例
include_once "ezMysql/ez_sql_mysql.php";
// 初始化数据库对象并建立数据库连接
$db = new ezSQL_mysql('root','','imooc','localhost');


//校验数据库是否连接成功
//print_r($db);
//打印时间
/*$current_time = $db->get_var("SELECT " . $db->sysdate());
print "数据库链接成功 @ $current_time ;";
//打印出最后的查询和结果..debug表
$db->debug();

//从默认数据库中列出它的表
$my_tables = $db->get_results("SHOW TABLES",ARRAY_N);
$db->debug();

//遍历结果中的每一行..
foreach ( $my_tables as $table ){
    // 获取DESC表的结果..
    $db->get_results("DESC $table[0]");
    $db->debug();
}*/


/**
*类中有以下的方法： 
*- $db->get_results – 从数据库中读取数据集 (or 之前缓存的数据集) 
*- $db->get_row — 从数据库中读取一条数据 (or 之前缓存的数据) 
*- $db->get_col – 从数据库中读取一列指定数据集 (or 之前缓存的数据集) 
*- $db->get_var — 从数据库数据集中读取一个值 (or 之前缓存的数据) 
*- $db->query — 执行一条sql语句(如果有数据，就缓存起来) 
*- $db->debug – 打印最后执行的sql语句与返回的结果（如果有结果） 
*- $db->vardump – 打印变量的结构及内容 
*- $db->select — 选择一个新数据库 
*- $db->get_col_info – 获取列的信息 
*- $db->donation – 捐钱给作者用的 
*- $db->escape – 格式化插入数据库的字符串，eg:mysql_escape_string(stripslashes($str)) 
*- $db->flush – 清除缓存 
*- $db->get_cache – 换取缓存 
*- $db->hide_errors – 隐藏错误 
*- $db->register_error – 注册错误 
*- $db->show_errors – 显示错误 
*- $db->store_cache – 存储到缓存 
*- $db->sysdate – 获取系统时间 
*- $db = new db — 建立一个新db对象. 
*/


switch ($do) {
    case 'checkMember':
    //echo time();
    $username = $_GET['username'];
    $sql = "SELECT * FROM check_member WHERE username='$username'";
    $result = $db->get_results($sql);//结果包含 方括号 []
    $result2 = $db->get_row($sql);//结果 只有 花括号 {}

    //print_r($result);
    if ($result2) {
        echo(json_encode($result2));
    } else{
        echo "null";
    }

    echo '<br>';

    echo(!empty($result)) ? json_encode($result) : "null";
    break;
    
    case 'default':
        die("nothing");
        break;
}

?>