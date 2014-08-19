<?php

$array_1 = array();//一维数组
$array_2 = array();//多维数组

$array_1['username'] = "highsea";
$array_1['age'] = 25;

$array_2['member']['gaohai']['username'] = 'gaohai';
$array_2['member']['gaohai']['age'] = 24.5;
$array_2['member']['wdss']['username'] = 'wdss';
$array_2['member']['wdss']['age'] = 24;

//print_r($array_1);
////echo json_encode($array_1);

//print_r($array_2);
////echo json_encode($array_2);

class muke{
	public $name = "public Name";
	protected $ptName = "protected Name";
	private $pName = "private Name";

	public function getName(){
		return $this->name;
	}
}

$mukeObj = new muke();

$obj2Json = json_encode($mukeObj);
//echo ($obj2Json);//{"name":"public Name"}
//对象转换为json数据时，只转换共有变量，私有变量不转换

//print_r($mukeObj);


$jsonStr = '{"k1":"v1","k2":"v2"}';
//echo $jsonStr;

print_r(json_decode($jsonStr,true));//默认是false 是一个对象

?>