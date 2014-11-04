<?php

include_once("db.php");

//数据库连接类
class db{
    private $conn;
    public function __construct(){
        global $dbhost,$dbuser,$dbpass,$dbname,$dbcharset,$dbprefix;
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass; 
        $this->dbname = $dbname;
        $this->dbprefix = $dbprefix;
        $this->Coding = $dbcharset;
    }
    function conn(){
        $conn = mysql_connect ($this->dbhost,$this->dbuser,$this->dbpass);
        mysql_query("set names " . $this->Coding);  
        return $conn;
    }
    function SelectSQL($SQL,$ResultType=2){
        switch ($ResultType){
            case 0:$ResultType=MYSQL_NUM;break; 
            case 1:$ResultType=MYSQL_ASSOC;break; 
            default:$ResultType=MYSQL_BOTH;break; 
        }
        $conn = $this->conn();
        mysql_select_db($this->dbname,$conn);
        $result = mysql_query($SQL);    
        while($row = mysql_fetch_array($result,$ResultType)){$array[] = $row;}
        mysql_free_result($result);     
        mysql_close($conn); 
        if(!is_array(@$array)){$array=array();}     
        return $array;
    }
    function ExecuteSQL($SQL,$ResultType=0){
        $conn = $this->conn();
        mysql_select_db($this->dbname,$conn);
        @$result = mysql_query($SQL);
        if($ResultType==1) $result = mysql_insert_id();
        mysql_close($conn);     
        return $result;
    }
}
?>