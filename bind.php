<?php
   include('bd.php');
   $nurse = $_POST['nurse'];
   $ward = $_POST['ward'];
   $sth = $dbh->prepare("SELECT ID_Nurse FROM nurse 
                      WHERE name=:name");
   $sth->bindParam(':name',$nurse,PDO::PARAM_STR);
   $sth->execute();
   $f_nurse=$sth->fetch()[0];
   $sth = $dbh->prepare("SELECT ID_Ward FROM ward 
                      WHERE name=:ward");
   $sth->bindParam(':ward', $ward, PDO::PARAM_STR);
   $sth->execute();
   $f_ward=$sth->fetch()[0];
   $dbh->query("INSERT INTO nurse_ward VALUES ($f_nurse , $f_ward)");
   header('Location: http://itech2lb3/');
   exit;
?>