<?php
   include('bd.php');
   $ward_number = $_POST['wardNumber'];
   $ward_id = $dbh->query("SELECT * FROM ward")->rowCount()+1;
   $sth = $dbh->prepare("INSERT INTO ward VALUES (:id,:number)");
   $sth->bindParam (':id', $ward_id, PDO::PARAM_INT);
   $sth->bindParam (':number', $ward_number, PDO::PARAM_STR);
   $sth->execute();
   header('Location: http://itech2lb3/');
   exit;
?>