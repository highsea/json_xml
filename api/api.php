<?php
/**
* @author highsea
*/

$arr = array(
    'title' => 'highsea',
    'from' => '绍兴',
    'description' => 'f2e',
    'address' => 'mining data'
);
//$arr ='s';
function json($arr){
    echo json_encode($arr);
    exit;
}
function xml($arr){
    header("Content-type: text/xml");
    $result = "<?xml version='1.0' encoding='UTF-8'?>\n";
    $result .= "<item>\n";
    $result .= "<title>highsea</title>\n<test id='1'>\n";
    $result .= "<description>f2e</description>\n";
    $result .= "<address>绍兴<address>\n";
    $result .= "</item>\n";
    echo $result;
    exit;

    /*$dom = new DomDocument('1.0', 'utf-8');
    // 创建根节点
    $article = $dom->createElement('item');
    $dom->appendchild();*/

    /*XMLWriter*/
    /*SimpleXML*/
}
if ($_GET['format'] == 'json') {
    json($arr);
} else if($_GET['format'] == 'xml'){
    xml($arr);
} else{
    var_dump($arr);
}

?>
