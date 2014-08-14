<?php 
require_once('response.php');
$data = array(
    'id'=>1,
    'name'=>'highsea',
    'type'=>array(4, 5, 6),
    'position'=>array('f2e', 88, 'ued'=>array('ui', 'engineer', 22),),
);
Response::xmlEncode(200, 'success', $data);
?>