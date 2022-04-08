<?php
include("bd.php");
$nurse=$_POST['nurse'];

$sth = $dbh->prepare("SELECT DISTINCT w.name FROM nurse as n
                          INNER JOIN nurse_ward ON FID_Nurse=ID_Nurse 
                          INNER JOIN ward as w ON FID_Ward=ID_Ward
                      WHERE n.name=:name");
$sth->bindParam(':name',$nurse,PDO::PARAM_STR);
$sth->execute();
$res=$sth->fetchAll(PDO::FETCH_OBJ);
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
echo json_encode($res);
?>