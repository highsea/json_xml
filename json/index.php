<?php
header("Content-type:text/html;charset=gbk-8");
function createHtmlTag($tag = ""){
    echo "<h1>$tag</h1><br />";
}
//注意 单引号 和 双引号 区别

//createHtmlTag("hello");
createHtmlTag("JSON 和 serialize 对比");
$member = array(
    "username"=>"highsea",
    "age"=>"25",
    "something"
    );
//关联数组

var_dump($member);

$jsonObj = json_encode($member);
$serializeObj = serialize($member);

createHtmlTag($jsonObj);
createHtmlTag($serializeObj);


?>