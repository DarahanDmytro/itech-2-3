<?php
   $db_driver = "mysql";
   $host="localhost";
   $database="iteh2lb1var4";
   $dsn="$db_driver:host=$host; dbname=$database";
   
   $username = "root";
   $password="";
   $options=array(PDO::ATTR_PERSISTENT => true,
           PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
   global $dbh;
   try{
     $dbh = new PDO($dsn, $username, $password, $options);
   }
   catch(PDOException $e) {
     echo "ALARM!!! ".$e->getMessage()."<br/>";
     die();
   }

   function prepare_list($col,$bd)
   {
     global $dbh;
     $sql = "SELECT DISTINCT $col FROM $bd";
     $res = "";
     foreach($dbh->query($sql) as $row){
       $res=$res."<option value=".$row[0].">".$row[0]."</option>";
     }
     return $res;
   }
?>