<?php
header("Content-type: text/html; charset=utf-8"); 
$arr = array(
    'name'=>'highsea',
    'age'=>'25',
    'position'=>'f2e'
);
$data = 'Ъ§Онjson';

//iconv(in_charset, out_charset, str)
$newData = iconv('UTF-8', 'GBK', $data);
echo $newData;
echo json_encode($newData);

?>