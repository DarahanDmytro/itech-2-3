<?php
   include('bd.php');
   try{
     $nurse_name = $_POST['nurseName'];
     $nurse_id = $dbh->query("SELECT * FROM nurse")->rowCount()+1;;
     $nurse_department = $_POST['nurseDepartment'];
     $nurse_shift = $_POST['shift'];
     $sth = $dbh->prepare("INSERT INTO nurse(ID_Nurse,name,department,shift)
         VALUES (:id,:name,:department,:shift)");
     $sth->bindParam (':id', $nurse_id, PDO::PARAM_INT);
     $sth->bindParam (':name', $nurse_name, PDO::PARAM_STR);
     $sth->bindParam (':department', $nurse_department, PDO::PARAM_INT);
     $sth->bindParam (':shift', $nurse_shift, PDO::PARAM_STR);
     $sth->execute();
   }
   finally{
     header('Location: http://itech2lb3/');
     exit;
   }
?>