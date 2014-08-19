<?php

class ms_new_mysql{
    
   private $dbHost;
   private $dbUser;
   private $dbPassword;
   private $dbTable;
   private $dbConn;
   private $result;
   private $sql;
   private $pre;
   private $coding;
   private $pcon;
   private $queryNum;
   private static $daoImpI;

   public function __construct($dbHost, $dbUser, $dbPassword, $dbTable, $pre, $coding, $pcon, $queryNum){
       $this->dbHost = $dbHost;
       $this->dbUser = $dbUser;
       $this->dbPassword = $dbPassword;
       $this->dbTable = $dbTable;
       $this->pre = $pre;
       $this->coding = $coding;
       $this->pcon = $pcon;
       $this->connect();
       $this->select_db($dbTable);
   }

   public function __clone(){
       return self::$daoImpI;
   }

   public static function getDaoImpl($linkConfig){

       if (empty(self::$daoImpI)) {
           self::$daoImpI = new ms_new_mysql($linkConfig['db']['dbHost'], $linkConfig)
       }
       return self::$daoImpI;
   }

   public function connect(){
       $func  = $this->pcon == 1 ? "mysql_pconnect" : "mysql_connect";

       
   }


}
?>