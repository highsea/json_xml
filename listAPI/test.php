<?PHP
//require_once('./file/file.php');//文件夹操作
//require_once('./db/db.class.php');//引用的 数据库连接类
require_once('./db/db.my.php');//自定义的 数据库连接类
//require_once('./db/db.get.php');//读取指定数据库
require_once('./res/response.php');//综合接口封装


/*****
*error_reporting http://www.w3school.com.cn/php/func_error_reporting.asp
* E_All 所有的错误和警告，除级别E_STRICT（E_STRICT将是E_ALL的一部分，PHP6.0）
* E_NOTICE 运行时的注意事项。脚本发现的，可能是个错误，但正常运行脚本时也可能发生
* E_STRICT 运行时的注意事项。PHP建议改变你的代码，以帮助该代码的互操作性和兼容性
*/
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);


//http://domain.com/demo.php?page=1&pagesize=12
//定义接口参数

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 6;
$sId = isset($_GET['sid']) ? $_GET['sid']:16;
if (!is_numeric($page)||!is_numeric($pageSize)) {
    Response::show(400, 'Bad Request：请求参数不合法！');
}else{
    //Response::show(200, 'success', $data, '');//format模式
}

$offset = ($page-1)*$pageSize;
$sql = "select * from registration where id = ".$sId." order by name desc limit 0,6";
$offset ."，".$pageSize;
//echo $sql;


//设置缓存
/*$file = new File();

if($file->cacheData('shujuke_cache', $data)){//生成缓存 
//if($file->cacheData('index_mk_cache')){//获取缓存
//if($file->cacheData('index_mk_cache', null)){//删除缓存
    echo "<pre>";
    var_dump($file->cacheData('shujuke_cache'));exit;
    echo "success";
} else{
    echo "error";
}*/

//引用的 数据库连接类
/*$db = new db();
$result = $db->SelectSQL($sql);
var_dump($result);
*/

//自定义的数据库连接类
try{
    $connect = Db::getInstance()->connect();
} catch(Exception $e){
    return Response::show(502, 'Bad Gateway：服务器连接失败！', $names);
}
$result = mysql_query($sql, $connect);
//var_dump($result);

while ($name = mysql_fetch_assoc($result)) {
    $names[] = $name;
}
echo "<pre>";
var_dump($names);

//生成接口数据
/*if ($names) {
    return Response::show(200, 'success', $names);
}else{
    return Response::show(404, 'not found：没找到数据！', $names);
}*/


function action_ActionName(){  
    header('Content-Type: application/x-javascript');  
    // 例如只接收 *.a.com域名的请求  
    header('Access-Control-Allow-Origin:.a.com');  
    $callback = isset( $_GET[ 'callback' ] ) ? $_GET[ 'callback' ] : 'callback';  
    $sId = isset($_GET['sid']) ? $_GET['sid']:16;

    try {  
        $rows = "select * from registration where id = ".$sId." order by name desc limit 0,6";
       
        $dataList = array(  
            'code' => 200,  
            'msg'  => '成功',  
            'data' => $names,  
        );  
    } catch (Exception $e) {  
        $dataList = array(  
            'code'  => 400,  
            'msg'   => '错误的请求',  
        );  
    }  
    echo $callback.'('.json_encode($dataList).')';  
    exit;  
}  

//action_ActionName()

/*$serverArry = {
    '100':'继续',
    '101':'交换协议',
    '200':'正常',
    '201':'创建',
    '202':'接受',
    '203':'非授权信息',
    '204':'没有内容',
    '205':'重置内容',
    '206':'部分内容',
    '300':'多选',
    '301':'永久移动',
    '302':'发现缓存',
    '303':'请参阅其他',
    '304':'未修改',
    '305':'使用代理',
    '306':'未使用',
    '307':'临时重定向',
    '400':'错误的请求',
    '401':'需要认证',
    '402':'需要付款',
    '403':'禁止访问',
    '404':'找不到资源',
    '405':'不允许的方法',
    '406':'不接受',
    '407':'需要代理身份验证',
    '408':'请求超时',
    '409':'冲突',
    '410':'过去的',
    '411':'需要长度',
    '412':'前提条件失败',
    '413':'请求实体太大',
    '414':'请求URI太长',
    '415':'不支持的媒体类型',
    '416':'请求的范围无法满足',
    '417':'预期失败',
    '500':'内部服务器错误',
    '501':'未实现',
    '502':'错误的网络',
    '503':'暂停服务',
    '504':'网络超时',
    '505':'HTTP的版本没有支持'
}*/

?>



