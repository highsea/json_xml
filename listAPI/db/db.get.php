<?php
// 读取数据库


class User
{
    public $username ;
    public $id ;
    public $sex;
    public $email ;
    public $tel ;
    public $address ;
    public $createTime ;
}

include_once("db.class.php");//写入数据库类


$db = new db() ;
$SQL = "SELECT `ID`,`name`,`phone`,`email`,`company`,`createTime`,`sex` FROM `registration` ";

$json ="";
$data =array();

$RsArray = $db->SelectSQL($SQL);
foreach ($RsArray as $i => $row){

    $user = new User();
    $user->id = $row[0];
    $user->username = $row[1];
    $user->tel = $row[2];
    $user->email = $row[3];
    $user->address = $row[4];
    $user->createTime = $row[5];
    $user->sex = $row[6];
    $data[] = $user;
}

?>